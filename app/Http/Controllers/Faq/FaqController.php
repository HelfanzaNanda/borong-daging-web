<?php

namespace App\Http\Controllers\Faq;

use App\Http\Controllers\Controller;
use App\Models\FaqCategories;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // $faqs = FaqCategories::with('faqs')->get();
        // return json_encode($faqs);
        return view('faq.faq', [
            'faqCategories' => FaqCategories::with('faqs')->get()
        ]);
    }
}
