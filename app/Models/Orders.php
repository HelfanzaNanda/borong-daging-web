<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
            'ureturn' => 'http://128.199.147.203/f7-soccer-field/public/member/dashboard',
            'unotify' => 'http://128.199.147.203/f7-soccer-field/public/api/ipaymu_callback',
            'ucancel' => 'http://128.199.147.203/f7-soccer-field/public/cancel',
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
        $product = MeatForSale::find($params['food_id']);

        if(!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unknown Product!'
            ]);
        }

        if ($params['quantity'] < 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Isikan Quantity!'
            ]);
        }

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

        $insert = self::create($params);

        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
    }
}
