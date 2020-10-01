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
        $products = Product::published()->paginate(self::pagination);
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $_category = null;
        $brands = Brand::get();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands','_category'));
    }
    public function search()
    {
        $products = Product::published()->search(request()->search)->paginate(self::pagination);
        $categories = Category::get();
        $_category = null;
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands', '_category'));
    }
    public function getCategoryProducts($category)
    {
        $products = Product::whereCategoryId($category)->published()->paginate(self::pagination);
        $categories = Category::get();
        $_category = Category::find($category);
        $subcategories = SubCategory::whereCategoryId($category)->get();
        $brands = Brand::categoriesById($category)->get();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands','_category'));
    }
    public function getSubcategoryProducts($subcategory)
    {
        $products = Product::whereSubcategoryId($subcategory)->published()->paginate(self::pagination);
        $categories = Category::get();
        $_category = null;
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands', '_category'));
    }
    public function getSubcategoryProductsByCategory($category,$subcategory)
    {
        $products = Product::whereCategoryId($category)->whereSubcategoryId($subcategory)->published()->paginate(self::pagination);
        $categories = Category::get();
        $_category = Category::find($category);
        $subcategories = SubCategory::whereCategoryId($category)->get();
        $brands = Brand::categoriesById($category)->get();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands', '_category'));
    }
    public function getBrandProducts($brand)
    {
        $products = Product::whereBrandId($brand)->published()->paginate(self::pagination);
        $categories = Category::get();
        $_category = null;
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands', '_category'));
    }
    public function getCategoryBrandProducts($category, $brand)
    {
        $products = Product::whereCategoryId($category)->whereBrandId($brand)->published()->paginate(self::pagination);
        $categories = Category::get();
        $_category = Category::find($category);
        $subcategories = SubCategory::whereCategoryId($category)->get();
        $brands = Brand::categoriesById($category)->get();
        return view('site.product.index',
            compact('products', 'categories','subcategories','brands','_category'));
    }
    public function show(Product $product)
    {
        $category = $product->category_id;
        $related_products = Product::whereCategoryId($category)->inRandomOrder()->paginate(self::pagination);
        return view('site.product.show', compact('product', 'related_products'));
    }
}
