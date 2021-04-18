<?php

namespace App\Http\Controllers\Cuisine;

use App\Models\Cuisines;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MeatForSale;
use Illuminate\Support\Facades\Session;

class CuisineController extends Controller
{
    public function detail($slug, Request $request)
    {
        $exp = explode('-', $slug);
        $id = end($exp);
        $cuisine = Cuisines::where('id', $id)->first();
        $products = MeatForSale::select('meat_for_sale.*')
        ->where('meat_cuisines.cuisine_id', $id)
        ->join('meat_cuisines', 'meat_cuisines.meat_for_sale_id', '=', 'meat_for_sale.id')->get();

        return view('cuisine.'.__FUNCTION__,[
            'cuisine' => $cuisine,
            'products' => $products
        ]);
    }
}
