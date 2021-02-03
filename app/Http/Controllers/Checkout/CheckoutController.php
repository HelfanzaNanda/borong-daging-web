<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\DeliveryAddresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
    	$carts = Carts::where('user_id', Session::get('_id'))->get();
    	$delivery_address = DeliveryAddresses::where('user_id', Session::get('_id'))->first();

        return view('checkout.'.__FUNCTION__, compact('carts', 'delivery_address'));
    }
}
