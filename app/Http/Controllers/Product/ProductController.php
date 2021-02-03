<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\MeatForSale;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    public function detail($slug, Request $request)
    {
    	$featured_products = MeatForSale::where('featured', 1)->get();
        $exp = explode('-', $slug);
        $id = end($exp);

        $product = MeatForSale::select('meat_for_sale.*', 'categories.name as category_name')->where('meat_for_sale.id', $id)->join('categories', 'categories.id', '=', 'meat_for_sale.category_id')->first();
        
        return view('product.'.__FUNCTION__, compact('product', 'id', 'featured_products'));
    }
}
