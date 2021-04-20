<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Coupons;
use App\Models\DeliveryAddresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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
    	// $delivery_address = DeliveryAddresses::where('user_id', Session::get('_id'))
        // ->where('description', 'Home')->first();
    	$delivery_addresses = DeliveryAddresses::where('user_id', Session::get('_id'))->get();

        return view('checkout.index', [
            'carts' => $carts,
            'delivery_addresses' => $delivery_addresses,
        ]);
    }
}
