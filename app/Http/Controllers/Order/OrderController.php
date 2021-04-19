<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\MeatForSale;
use App\Models\Orders;
use App\Models\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    public function insertData(Request $request)
    {
        $params = $request->all();
        //return json_encode($params);
        return Orders::createOrUpdate($params, $request->method(), $request);
    }

    public function myOrders()
    {
        $userId = Session::get('_id');
        //return json_encode(Orders::myOrders());
        return view('order.my_order',[
            'user' => User::where('id', $userId)->first(),
            'orders' => Orders::myOrders(),
            'traks' => ['Ready', 'Preparing', 'On the Way', 'Delivered', 'Order Received'],
        ]);
    }
}
