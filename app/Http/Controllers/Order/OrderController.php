<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\MeatForSale;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    public function insertData(Request $request)
    {
        $params = $request->all();

        return Orders::createOrUpdate($params, $request->method(), $request);
    }
}
