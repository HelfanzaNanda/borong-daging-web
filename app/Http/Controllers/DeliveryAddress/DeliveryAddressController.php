<?php

namespace App\Http\Controllers\DeliveryAddress;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAddresses;
use Illuminate\Http\Request;
use Session;

class DeliveryAddressController extends Controller
{
    public function insertData(Request $request)
    {
        $params = $request->all();

        return DeliveryAddresses::createOrUpdate($params, $request->method(), $request);
    }

    public function change(Request $request)
    {
        $delivery_address =  DeliveryAddresses::select('id', 'address')->where('user_id', Session::get('_id'))
        ->where('description', $request->description)->first();
        return [
            'data' => $delivery_address ?? null
        ];
    }
}
