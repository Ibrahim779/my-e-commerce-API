<?php

namespace App\Http\Controllers\Dashboard;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
         Slider::get();
        return view('dashboard.slider.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $slider = new Slider();
        $this->saveData($request, $slider);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Slider $slider
     */
    public function update(Request $request,Slider $slider)
    {
        $this->validation($request);
        $this->saveData($request, $slider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider
     * @return void
     * @throws \Exception
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function validation(Request $request)
    {
        return $request->validate([
            'title' => 'min:10'
        ]);
    }

    /**
     * @param Request $request
     * @param $slider
     */
    private function saveData(Request $request, $slider)
    {
        $slider->title = $request->title;
        $slider->save();
        $slider->image()->create(['url' => $request->image]);
        $slider->save();
    }
}
