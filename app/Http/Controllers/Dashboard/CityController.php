<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use App\Traits\SaveData\CitySaveData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    use CitySaveData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cities = City::get();
        return view('dashboard.city.index', compact('cities'));
    }
    public function create()
    {
        return view('dashboard.city.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->saveData(new City());
        return redirect()->route('cities.index');
    }

    public function edit(City $city)
    {
        return view('dashboard.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(City $city)
    {
        $this->saveData($city);
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
