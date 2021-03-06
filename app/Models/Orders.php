<?php

namespace App\Models;

use App\Models\Carts;
use App\Models\DeliveryAddresses;
use App\Models\Drivers;
use App\Models\FoodOrders;
use App\Models\Foods;
use App\Models\Payments;
use App\Models\Restaurants;
use App\Models\Users;
use App\User;
use DB;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Database\Eloquent\Model;
use Session;
use iPaymu\iPaymu;

/**
 * @property int        $user_id
 * @property int        $order_status_id
 * @property float      $tax
 * @property float      $delivery_fee
 * @property string     $hint
 * @property boolean    $active
 * @property int        $driver_id
 * @property int        $delivery_address_id
 * @property int        $payment_id
 * @property int        $created_at
 * @property int        $updated_at
 */
class Orders extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'order_status_id', 'tax', 'delivery_fee', 'hint', 'active', 'driver_id', 'delivery_address_id', 'payment_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int', 'order_status_id' => 'int', 'tax' => 'double', 'delivery_fee' => 'double', 'hint' => 'string', 'active' => 'boolean', 'driver_id' => 'int', 'delivery_address_id' => 'int', 'payment_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...

    public static function payVa($params)
    {
        $apiKey = 'E6D0A4F7-ACEB-42DF-91AA-0DA4712444E8';
        $va = '1179002138685501';
        $production = false;

        $ipaymu = new iPaymu($apiKey, $va, $production);

        $ipaymu->setURL([
            'ureturn' => 'http://128.199.147.203/borong-daging/public/member/dashboard',
            'unotify' => 'http://128.199.147.203/borong-daging/public/api/ipaymu_callback',
            'ucancel' => 'http://128.199.147.203/borong-daging/public/cancel',
        ]);

        $ipaymu->setBuyer([
            'name' => $params['name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
        ]);

        $ipaymu->addCart([
            'product' => $params['field_name'],
            'quantity' => 1,
            'price' => $params['total'],
            'description' => $params['description'],
            'weight' => 1,
        ]);

        $ipaymu->setCOD([
            'pickupArea' => "76111",
            'pickupAddress' => "Denpasar",
            'deliveryArea' => "76111",
            'deliveryAddress' => "Denpasar",
        ]);

        $pay = $ipaymu->redirectPayment();

        return $pay;
    }

    public static function createOrUpdate($params, $method, $request)
    {
        if (!Session::get('_id')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Silahkan Login Terlebih Dahulu!'
            ]);
        }

        $params['user_id'] = Session::get('_id');

        DB::beginTransaction();
        $filename = null;

        if (isset($params['_token']) && $params['_token']) {
            unset($params['_token']);
        }

        if (isset($params['id']) && $params['id']) {
            $id = $params['id'];
            unset($params['id']);

            $update = self::where('id', $id)->update($params);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Diubah!'
            ]);
        }
        $total_price = 0;
        $total_delivery_price = 10000;

        $carts = Carts::where('user_id', $params['user_id'])->get();

        foreach($carts as $cart) {
            $total_price = $total_price + $cart['meat_for_sale']['discount_price'] * ($cart['quantity']/100);
        }

        $insert_payment = Payments::create([
            'price' => $total_price + $total_delivery_price,
            'description' => 'Pemesanan Daging',
            'user_id' => Session::get('_id'),
            'status' => 'Awaiting Payment',
            'method' => $params['payment_method'],
        ]);

        $insert_order = self::create([
            'user_id' => Session::get('_id'),
            'order_status_id' => 1,
            'tax' => 0,
            'delivery_fee' => $params['delivery_fee'],
            'hint' => 'Dikirim Tanggal '.$params['hint'].' Jam '.$params['deliver_time'],
            'active' => 1,
            'driver_id' => Drivers::where('available', 1)->first()->value('user_id'),
            // 'delivery_address_id' => DeliveryAddresses::where('user_id', Session::get('_id'))->first()->value('id'),
            //'delivery_address_id' => 16,
            'delivery_address_id' => $params['delivery_address_id'],
            'payment_id' => $insert_payment->id,
        ]);

        $res = [];
        if (isset($params['coupon_codes'])) {
            foreach ($params['coupon_codes'] as $code) {
                array_push($res, $code);
                CouponHistories::create([
                    'coupon_code' => $code,
                    'user_id' => Session::get('_id'),
                    'order_id' => $insert_order->id,
                    'date' => now()
                ]);
            }
        }

        $get_restaurant = Restaurants::get()->random(1)->all()[0]->id;
        
        $fs = [];
        foreach($carts as $cart_for_stock) {
            $foods = Foods::where('name', MeatForSale::where('id', $cart_for_stock['food_id'])
            ->pluck('name')->first())->first();
            // $foods = Foods::where('name', MeatForSale::where('id', $cart_for_stock['food_id'])
            // ->pluck('name')->first())
            // ->where('restaurant_id', $get_restaurant)->first();
            $decrease_stock = Foods::where('name', MeatForSale::where('id', $cart_for_stock['food_id'])->value('name'))->where('restaurant_id', $get_restaurant)->decrement('weight', $cart_for_stock['quantity']);
            FoodOrders::create([
                'price' => $cart_for_stock['meat_for_sale']['discount_price'],
                'quantity' => $cart_for_stock['quantity'] / 100 ,
                'food_id' => $foods['id'],
                'order_id' => $insert_order->id
            ]);
        }

        $user = Users::where('id', Session::get('_id'))->first();

        $pay['name'] = $user['name'];
        $pay['phone'] = '082138685500';
        $pay['email'] = $user['email'];
        $pay['field_name'] = 'Daging';
        $pay['total'] = $total_price + $total_delivery_price;
        $pay['description'] = 'Penjualan Daging';

        $send_payment = self::payVa($pay);

        if (isset($send_payment['Data']['Url'])) {
            Carts::where('user_id', Session::get('_user_id'))->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'url' => $send_payment['Data']['Url'],
                'message' => 'Anda akan di arahkan ke halaman pembayaran'
            ]);
        }

        DB::rollback();
        return response()->json([
            'status' => 'error',
            'message' => 'Booking Gagal'
        ]);
    }


    public static function myOrders()
    {
        $userId = Session::get('_id');
        if (!$userId) {
            return response()->json([
                'status' => 'error',
                'message' => 'Silahkan Login Terlebih Dahulu!'
            ]);
        }

        $orders = Orders::where('user_id', $userId)->get();
        $result = [];
        foreach ($orders as $order) {
            switch ($order->order_status->status){
                case 'Ready':
                    $order_status = 1;
                break;
                case 'Preparing':
                    $order_status = 2;
                break;
                case 'On the Way':
                    $order_status = 3;
                break;
                case 'Delivered':
                    $order_status = 4;
                break;
                case 'Order Received':
                    $order_status = 5;
                break;
            }
            if ($order->delivery_address) {
                if ($order->user->phone) {
                    $address_desc = $order->delivery_address->description.'( '. $order->user->phone .' )';
                }else {
                    $address_desc = $order->delivery_address->description.'( - )';
                }
            }else {
                $address_desc = '-';
            }
            $item = [
                'id' => "#".$order->id,
                'address_desc' => $address_desc,
                'phone' => $order->user->phone ?? '-',
                'address' => $order->delivery_address ? $order->delivery_address->address : '-',
                'count_items' => $order->food_orders->count(),
                //'food_items' => $order->food_orders()->get()->implode('food.name', ', '),
                'hint' => $order->hint ?? '-',
                'food_items' => $order->food_orders()->with('food')->get(),
                'sub_total' => $order->payment->price,
                'delivery_fee' => $order->delivery_fee,
                'total' => $order->payment->price + $order->delivery_fee,
                'order_status' => $order_status
                //'order_status' => $order->order_status->status
            ];
            array_push($result, $item);
        };

        return $result;
    }

    public function delivery_address()
    {
        return $this->belongsTo(DeliveryAddresses::class);
    }

    public function food_orders()
    {
        return $this->hasMany(FoodOrders::class, 'order_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payments::class);
    }

    public function order_status()
    {
        return $this->belongsTo(OrderStatuses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
