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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
         $this->validation($request);
         $category = new Category();
         $this->saveData($request, $category);
        return redirect()->route('categories.index');
    }
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,Category $category)
    {
        $this->validation($request);
        $this->saveData($request, $category);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category
     * @return void
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:3|max:150',
            'image' => 'required',
        ]);
    }

    /**
     * @param Request $request
     * @param $category
     */
    private function saveData(Request $request, $category)
    {
        $category->name = $request->name;
        $category->save();
        if (!$category->image){
            $category->image()->create(['url' => $request->image->store('categories','public')]);
        }
        $category->image()->update(['url' => $request->image->store('categories','public')]);
        $category->save();
    }
}
