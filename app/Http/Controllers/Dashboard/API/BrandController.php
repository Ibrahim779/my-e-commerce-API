<?php

namespace App\Http\Controllers\Dashboard\API;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Brand::get();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = $this->validation($request);
        Brand::create($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Brand $brand
     */
    public function update(Request $request, Brand $brand)
    {
       $data = $this->validation($request);
        $brand->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return void
     * @throws \Exception
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
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
