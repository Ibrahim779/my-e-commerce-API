<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($category)
    {
        $products = Product::whereCategoryId($category)->published()->get();
        $page_title = 'Products';
        return view('dashboard.product.index',compact('products','page_title','category'));
    }
    public function getUnPublished($category)
    {
        $products =  Product::whereCategoryId($category)->unPublished()->get();
        $page_title = 'Products Not Allow';
        return view('dashboard.product.index', compact('products', 'page_title'));
    }
    public function getHasDiscount($category)
    {
        $products = Product::whereCategoryId($category)->hasDiscount()->get();
        $page_title = 'Products Has Discount';
        return view('dashboard.product.index', compact('products', 'page_title'));
    }
    public function isOffer()
    {
        $products = Product::offer()->get();
        $page_title = 'Offers';
        return view('dashboard.product.index', compact('products', 'page_title'));
    }
    public function create($category)
    {
        $subcategories = SubCategory::whereCategoryId($category)->get();
        return view('dashboard.product.create', compact( 'category', 'subcategories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $category
     * @return void
     */
    public function store(Request $request, $category)
    {
        $this->validation($request);
        $product = new Product();
        $this->saveData($request,$product,$category);
    }
    public function edit($category, Product $product)
    {
        return view('dashboard.product.edit', compact('product', 'category'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Product
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return void
     */
    public function update(Request $request,Product $product)
    {
        $this->validation($request);
        $this->saveData($request,$product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return void
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
    }

    /**
     * @param Request $request
     * @param $product
     * @param null $category
     */
    private function saveData(Request $request, $product, $category = null)
    {
        $product->name            = $request->name;
        $product->price           = $request->price;
        $product->discount        = $request->discount;
        $product->description     = $request->description;
        $product->quantity        = $request->quantity;
        $product->subcategory_id  = $request->subcategory_id;
        $product->status          = $request->status;
        if ($category != null || false || '') {
            $product->category_id     = $category;
        }
        $product->save();
    }
}
