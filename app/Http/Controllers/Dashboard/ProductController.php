<?php

namespace App\Http\Controllers\Dashboard;

use App\Brand;
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
        $page_title = __('site.products');
        return view('dashboard.product.index',compact('products','page_title','category'));
    }
    public function getUnPublished($category)
    {
        $products =  Product::whereCategoryId($category)->unPublished()->get();
        $page_title = __('dashboard.products_unpublished');
        return view('dashboard.product.index', compact('products', 'page_title','category'));
    }
    public function getHasDiscount($category)
    {
        $products = Product::whereCategoryId($category)->hasDiscount()->get();
        $page_title = __('site.discount_products');
        return view('dashboard.product.index', compact('products', 'page_title','category'));
    }
    public function create($category)
    {
        $subcategories = SubCategory::whereCategoryId($category)->get();
        $brands        = Brand::categoriesById($category)->get();
        return view('dashboard.product.create', compact( 'category', 'subcategories','brands'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($category)
    {
        $this->saveData(new Product(),$category);
        return redirect()->route('products.categories.index', $category);
    }
    public function edit($category, Product $product)
    {
        $subcategories = SubCategory::whereCategoryId($category)->get();
        $brands        = Brand::categoriesById($category)->get();
        return view('dashboard.product.edit', compact( 'product','category', 'subcategories','brands'));
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
     * @param Product $product
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($category, Product $product)
    {
        $this->saveData($product);
        return redirect()->route('products.categories.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
    public function published(Product $product)
    {
        if ($product->is_published){
            $product->is_published = null;
        }else{
            $product->is_published = 'on';
        }
        $product->save();
        return redirect()->back();
    }
    public function removeDiscount(Product $product)
    {
            $product->discount = null;
            $product->save();
            return redirect()->back();
    }
    public function updateCount(Product $product)
    {
        $product->count = request()->count;
        $product->save();
        return back();
    }
    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000'
        ]);
    }

    /**
     * @param $product
     * @param null $category
     */
    private function saveData($product, $category = null)
    {
        $this->validation();
        $product->name            = request()->name;
        $product->price           = request()->price;
        $product->discount        = request()->discount;
        $product->description     = request()->description;
        $product->quantity        = request()->quantity;
        $product->subcategory_id  = request()->subcategory_id;
        $product->brand_id        = request()->brand_id;
        $product->bar_code        = request()->bar_code;
        $product->is_published    = request()->is_published;
        $product->count           = request()->count;
        if ($category) {
            $product->category_id     = $category;
        }
        $product->save();
        if ($product->image){
            if (request()->image){
                $product->image()->update(['url' => request()->image->store('products','public')]);
            }
        }else{
            $product->image()->create(['url' => request()->image->store('products','public')]);
        }
        $product->save();
    }
}
