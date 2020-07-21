<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::published()->get();
        $categories = Category::all();
        return view('site.product.index', compact('products', 'categories'));
    }
    public function getCategoryProducts($category)
    {
        $products = Product::whereCategoryId($category)->published()->get();
        $categories = Category::all();
        return view('site.product.index', compact('products', 'categories'));
    }
    public function show(Product $product)
    {
        $category = $product->category_id;
        $related_products = Product::whereCategoryId($category)->inRandomOrder()->get();
        return view('site.product.show', compact('product', 'related_products'));
    }
}
