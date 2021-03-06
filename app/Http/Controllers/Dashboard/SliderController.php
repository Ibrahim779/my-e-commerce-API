<?php

namespace App\Http\Controllers\Dashboard;

use App\Slider;
use App\Traits\SaveData\SliderSaveData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    use SliderSaveData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
         $sliders = Slider::get();
        return view('dashboard.slider.index', compact('sliders'));
    }
     public function create()
     {
         return view('dashboard.slider.create');
     }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->saveData(new Slider());
        return redirect()->route('sliders.index');
    }
    public function edit(Slider $slider)
    {
        return view('dashboard.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     * @param Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Slider $slider)
    {
        $this->saveData($slider);
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back();
    }
}
