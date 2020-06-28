<?php

namespace App\Http\Controllers\Dashboard\API;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $category
     * @return void
     */
    public function index($category)
    {
        return SubCategory::whereCategoryId($category)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $category
     * @return void
     */
    public function store(Request $request , $category)
    {
        $this->validation($request);
        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $category;
        $subcategory->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $subcategory
     * @return void
     */
    public function update(Request $request,SubCategory $subcategory)
    {
         $data = $this->validation($request);
         $subcategory->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $subcategory
     * @return void
     * @throws \Exception
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
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
