<?php

namespace App\Http\Controllers\Dashboard;

use App\Brand;
use App\BrandCategory;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
         $brands = Brand::get();
        return view('dashboard.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('dashboard.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->saveData(new Brand());
        return redirect()->route('brands.index');
    }

    public function edit(Brand $brand)
    {
        $categories_id = BrandCategory::whereBrandId($brand->id)->select('category_id')->get()->toArray();
        $brand_categories = [];
        foreach ($categories_id as $brand_category){
            $brand_categories[] += $brand_category['category_id'];
        }
        return view('dashboard.brand.edit', compact('brand','brand_categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Brand $brand)
    {
       $this->saveData($brand);
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'name' => 'required',
            'categories_id' => 'required'
        ]);
    }
    private function saveData($brand)
    {
        $this->validation();
        $brand->name = request()->name;
        $brand->save();
        if ($brand->categories){
            $brand->categories()->detach();
        }
        $brand->categories()->attach(\request()->categories_id);
    }

}
