<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Categories;
use App\Models\MeatForSale;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    public function productsByCategory($slug)
    {
        $id = preg_replace('/\D/', '', $slug);
        
        $products = MeatForSale::byCategory($id);
        return view('product.products_by_category', [
            'category' => Categories::where('id', $id)->first(),
            'products' => $products,
        ]);
    }
    public function detail($slug, Request $request)
    {
    	$featured_products = MeatForSale::where('featured', 1)->get();
        $exp = explode('-', $slug);
        $id = end($exp);

        $userId = Session::get('_id');
        $cart = Carts::where('user_id', $userId)->where('food_id', $id)->first();
        $isAddCart = $cart ? true : false;
        $product = MeatForSale::select('meat_for_sale.*', 'categories.name as category_name')->where('meat_for_sale.id', $id)->join('categories', 'categories.id', '=', 'meat_for_sale.category_id')->first();

        return view('product.'.__FUNCTION__, compact('product', 'id', 'featured_products', 'isAddCart'));
    }

    public function search($name)
    {
        //return json_encode($request->all());
        //$search = $request->search;
        $products = MeatForSale::where('name', 'like', '%' . $name . '%')->get();
        return view('product.product_search', [
            'search' => $name,
            'products' => $products
        ]);
        //return json_encode($products);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        if ($query) {
            $products = MeatForSale::where('name', 'like', '%' . $query . '%')->get('name');
        }else {
            $products = [];
        }
        return json_encode($products);
    }
}
