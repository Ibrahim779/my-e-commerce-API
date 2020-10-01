<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Traits\SaveData\CategorySaveData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\CollectionAdd;
use phpDocumentor\Reflection\Types\Collection;

class CategoryController extends Controller
{
    use CategorySaveData;
    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {
        $categories =Category::all();
        return view('dashboard.category.index',compact('categories'));
    }
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
         $this->saveData(new Category());
        return redirect()->route('categories.index');
    }
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Category $category)
    {
        $this->saveData($category);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
