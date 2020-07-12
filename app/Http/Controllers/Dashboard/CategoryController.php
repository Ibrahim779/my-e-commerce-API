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
      Category::get();
      return view('dashboard.category.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
         $this->validation($request);
         $category = new Category();
         $this->saveData($request, $category);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $category
     */
    public function update(Request $request,Category $category)
    {
        $this->validation($request);
        $this->saveData($request, $category);
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
            'name' => 'required'
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
        $category->image()->create(['url' => $request->image]);
        $category->save();
    }
}
