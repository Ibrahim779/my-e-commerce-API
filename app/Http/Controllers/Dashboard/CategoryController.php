<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\CollectionAdd;
use phpDocumentor\Reflection\Types\Collection;

class CategoryController extends Controller
{
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

    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'name' => 'required|min:3|max:150',
            'image' => 'required',
        ]);
    }

    /**
     * @param Request $request
     * @param $category
     */
    private function saveData($category)
    {
        $this->validation();
        $category->name = request()->name;
        $category->save();
        if ($category->image){
            $category->image()->update(['url' => request()->image->store('categories','public')]);
        }else{
            $category->image()->create(['url' => request()->image->store('categories','public')]);
        }
        $category->save();
    }
}
