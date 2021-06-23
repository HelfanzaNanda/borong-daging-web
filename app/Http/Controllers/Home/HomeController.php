<?php

namespace App\Http\Controllers\Home;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Categories, Coupons, Cuisines, Media, Foods, MeatForSale, Slides};

class HomeController extends Controller
{
    public function index()
    {
        $name_model_slide = 'App\Models\Slide';
        $name_model_coupon = 'App\Models\Coupon';
		$coupon = Coupons::where('coupon_for', 'new_member_promo')->latest()->first();
		$media = Media::select(['id', 'file_name'])
		->where('model_type', $name_model_coupon)
		->where('model_id', $coupon->id)->first();
		$coupon['image_id'] = $media->id;
		$coupon['filename'] = $media->file_name;

		$coupons = Coupons::where('coupon_for', 'image_promo')->get();
		$result_coupons = [];
		foreach ($coupons as $value) {
			$media = Media::select(['id', 'file_name'])->where('model_type', $name_model_coupon)->where('model_id', $value->id)->first();
			if ($media) {
				$item = [
					'image_id' => $media->id,
					'filename' => $media->file_name
				];
				array_push($result_coupons, $item);
			}
		}

		//dd($result_coupons);
	
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
        compact('categories', 'featured_products', 
		'cuisines', 'slides', 'coupon', 'result_coupons'));
    }
}
