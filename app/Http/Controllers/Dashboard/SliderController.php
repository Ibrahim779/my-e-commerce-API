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
         $sliders = Slider::get();
        return view('dashboard.slider.index', compact('sliders'));
    }
     public function create()
     {
         return view('dashboard.slider.create');
     }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $slider = new Slider();
        $this->saveData($request, $slider);
        return redirect()->route('sliders.index');
    }
    public function edit(Slider $slider)
    {
        return view('dashboard.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,Slider $slider)
    {
        $this->validation($request);
        $this->saveData($request, $slider);
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
        if ($slider->image){
            $slider->image()->update(['url' => request()->image->store('sliders','public')]);
        }else{
            $slider->image()->create(['url' => request()->image->store('sliders','public')]);
        }
        $slider->save();
    }
}
