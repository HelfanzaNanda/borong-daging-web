<?php

namespace App\Http\Controllers\DeliveryAddress;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAddresses;
use Illuminate\Http\Request;
use Session;

class DeliveryAddressController extends Controller
{
    public function index()
    {
        return view('delivery_address.index', [
            'addresses' => DeliveryAddresses::where('user_id', Session::get('_id'))->paginate(7),
        ]);
    }

    public function create()
    {
        return view('delivery_address.create');
    }

    public function edit($id)
    {
        return view('delivery_address.edit', [
            'address' => DeliveryAddresses::whereId($id)->first(),
        ]);
    }

    public function pinPoint($id)
    {
        return view('delivery_address.pin_point', [
            'address' => DeliveryAddresses::whereId($id)->first(),
        ]);
    }

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

    public function delete($id)
    {
        DeliveryAddresses::destroy($id);

        return response()->json([
            'url' => env("APP_URL"). '/delivery-address',
            'status' => 'success',
            'message' => 'Data Berhasil di Hapus!'
        ]);
    }
}
