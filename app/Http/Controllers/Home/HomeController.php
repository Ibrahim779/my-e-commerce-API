<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Object_;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $categories_section1 = Category::inRandomOrder()->take(2)->get();
        $categories_section2 = Category::inRandomOrder()->take(2)->get();
        $products = Product::inRandomOrder()->take(self::pagination)->get();
        $products_hasDiscount = Product::hasDiscount()->inRandomOrder()->take(self::pagination)->get()->sortByDesc('discount');
        return view('site.index',compact('sliders','categories_section1','categories_section2','products','products_hasDiscount'));
    }
}
