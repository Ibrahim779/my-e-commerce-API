<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $categories_section1 = Category::latest()->take(2)->get();
        $categories_section2 = Category::oldest()->take(2)->get();
        $products = Product::inRandomOrder()->get();
        $products_hasDiscount = Product::hasDiscount()->inRandomOrder()->get();
        return view('site.index',compact('sliders','categories_section1','categories_section2','products','products_hasDiscount'));
    }
}
