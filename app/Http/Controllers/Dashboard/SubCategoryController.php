<?php

namespace App\Http\Controllers\Dashboard;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($category)
    {
         $subcategories = SubCategory::whereCategoryId($category)->get();
        return view('dashboard.subcategory.index', compact('subcategories','category'));
    }
    public function create($category)
    {
        return view('dashboard.subcategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request , $category)
    {
        $this->validation($request);
        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $category;
        $subcategory->save();
        return redirect()->route('subcategories.categories.index', $category);
    }
    public function edit($category, SubCategory $subcategory)
    {
        return view('dashboard.subcategory.edit', compact('subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param SubCategory $subcategory
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,  $category, SubCategory $subcategory)
    {
         $data = $this->validation($request);
         $subcategory->update($data);
        return redirect()->route('subcategories.categories.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubCategory $subcategory
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->back();
    }
    /**
     * @param Request $request
     * @return mixed
     */
    private function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required'
        ]);
    }
}
