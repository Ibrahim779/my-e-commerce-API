<?php

namespace App\Http\Controllers\Home;

use App\Brand;
use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::published()->get();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $_category = null;
        $brands = Brand::all();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands','_category'));
    }
    public function search()
    {
        $products = Product::published()->search(request()->search)->get();
        $categories = Category::all();
        $_category = null;
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands', '_category'));
    }
    public function getCategoryProducts($category)
    {
        $products = Product::whereCategoryId($category)->published()->get();
        $categories = Category::all();
        $_category = Category::find($category);
        $subcategories = SubCategory::whereCategoryId($category)->get();
        $brands = Brand::categoriesById($category)->get();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands','_category'));
    }
    public function getSubcategoryProducts($category, $subcategory)
    {
        $products = Product::whereSubcategoryId($subcategory)->published()->get();
        $categories = Category::all();
        $_category = null;
        $subcategories = SubCategory::whereCategoryId($category)->get();
        $brands = Brand::categoriesById($category)->get();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands', '_category'));
    }
    public function getBrandProducts($brand)
    {
        $products = Product::whereBrandId($brand)->published()->get();
        $categories = Category::all();
        $_category = null;
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands', '_category'));
    }
    public function getCategoryBrandProducts($category, $brand)
    {
        $products = Product::whereCategoryId($category)->whereBrandId($brand)->published()->get();
        $categories = Category::all();
        $_category = Category::find($category);
        $subcategories = SubCategory::whereCategoryId($category)->get();
        $brands = Brand::categoriesById($category)->get();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands','_category'));
    }
    public function show(Product $product)
    {
        $category = $product->category_id;
        $related_products = Product::whereCategoryId($category)->inRandomOrder()->get();
        return view('site.product.show', compact('product', 'related_products'));
    }
}
