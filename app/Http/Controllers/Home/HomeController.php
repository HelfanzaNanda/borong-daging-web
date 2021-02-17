<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Cuisines;
use App\Models\Foods;
use App\Models\MeatForSale;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function index()
    {
    	$categories = Categories::get();
        $featured_products = MeatForSale::getAll();
    	$cuisines = Cuisines::get();


        return view('home.'.__FUNCTION__, compact('categories', 'featured_products', 'cuisines'));
    }
}
