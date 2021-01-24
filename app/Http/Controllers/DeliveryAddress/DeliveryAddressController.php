<?php

namespace App\Http\Controllers\DeliveryAddress;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAddresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class DeliveryAddressController extends Controller
{
    public function insertData(Request $request)
    {
        $params = $request->all();

        return DeliveryAddresses::createOrUpdate($params, $request->method(), $request);
    }
}
