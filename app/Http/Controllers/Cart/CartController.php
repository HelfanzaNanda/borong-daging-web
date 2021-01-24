<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\MeatForSale;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
    public function insertData(Request $request)
    {
        $params = $request->all();

        return Carts::createOrUpdate($params, $request->method(), $request);
    }

    public function destroy($id, Request $request)
    {
        Carts::where('id', $id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Dihapus'
        ]);
    }

    public function addToCart(Request $request)
    {
        $product = MeatForSale::find($request['food_id']);

        if(!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unknown Product!'
            ]);
        }

        if ($request['quantity'] < 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Isikan Quantity!'
            ]);   
        }

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];

            session()->put('cart', $cart);

            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart successfully!'
            ]);
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully!'
            ]);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];
        
        session()->put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully!'
        ]);
    }
}
