<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Cuisines;
use App\Models\Foods;
use App\Models\MeatForSale;
use App\Models\Media;
use App\Models\Slides;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $name_model_slide = 'App\Models\Slide';
        $slides = Slides::get();
        $result = [];
        foreach ($slides as $key => $slide) {
            $media = Media::select(['id', 'file_name'])->where('model_type', $name_model_slide)->where('model_id', $slide->id)->first();
            $slide['image'] = $media;
            array_push($result, $slide);
        }
        $slides = collect($result);
    	$categories = Categories::get();
        $featured_products = MeatForSale::getAll();
    	$cuisines = Cuisines::get();


        return view('home.'.__FUNCTION__, 
        compact('categories', 'featured_products', 'cuisines', 'slides'));
    }
}
