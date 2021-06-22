<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Coupons;
use App\Models\DeliveryAddresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\DefaultDeliveryFee;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
        // $coupons = [];
        // if ($request->coupon_code) {
        //     $coupon_arr = explode(',', $request->coupon_code);
        //     foreach ($coupon_arr as $coupon_code) {
        //         $coupon = Coupons::select(['code', 'discount', 'discount_type'])->where('code', $coupon_code)->first();
        //         array_push($coupons, $coupon);
        //     }
        // }
    	$carts = Carts::where('user_id', Session::get('_id'))->get();
        $weight = 0;
        foreach ($carts as $key => $value) {
            $weight += $value->quantity; 
        }
    	// $delivery_address = DeliveryAddresses::where('user_id', Session::get('_id'))
        // ->where('description', 'Home')->first();
    	$delivery_addresses = DeliveryAddresses::where('user_id', Session::get('_id'))->get();

        return view('checkout.index', [
            'carts' => $carts,
            'delivery_addresses' => $delivery_addresses,
            'coupons_used_by_user' => $coupons,
            'weight' => $weight
        ]);
    }

    public function getPrice(Request $request){
        $request->validate([
            'address' => 'required',
            'weight' => 'required'
        ]);

        $deliveryFee = DefaultDeliveryFee::all();
        if($deliveryFee->count() ==0){
            return response()->json([
                'status' => 'error',
                'message' => 'Pengiriman anda diluar range kami, harap hubungi admin',
                'price' => 0
            ]);
        }
        $index = -1;
        foreach ($deliveryFee as $key => $value) {
            if(strpos(strtolower($request->address), strtolower($value->city)) !== false){
                $index = $key;
            }
        }

        if($index == -1){
            return response()->json([
                'status' => 'error',
                'message' => 'Pengiriman anda diluar range kami, harap hubungi admin',
                'price' => 0
            ]);
        }
        
        $fee = $deliveryFee[$index];
        if($request->weight < $fee->min_weight){
            return response()->json([
                'status' => 'error',
                'message' => 'Berat Pemesanan Tidak Cukup',
                'price' => 0
            ]);
        }

        $priceTmp = 0;
        if($request->weight / $fee->multiple > intval($request->weight / $fee->multiple)){
            $priceTmp = intval($request->weight / $fee->multiple)+1;
        }else{
            $priceTmp = $request->weight / $fee->multiple;
        }
        $price = $priceTmp * $fee->price;

        return response()->json([
            'status' => 'success',
            'message' => 'Pengiriman Tersedia',
            'price' => $price
        ]);
    }
}
