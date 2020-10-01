<?php


namespace App\Traits\SaveData;


trait SliderSaveData
{

    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'title' => 'min:5|max:191',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000'
        ]);
    }

    /**
     * @param $slider
     */
    private function saveData($slider)
    {
        $this->validation();
        $slider->title = request()->title;
        $slider->save();
        if ($slider->image){
            if (request()->image){
                $slider->image()->update(['url' => request()->image->store('sliders','public')]);
            }
        }else{
            $slider->image()->create(['url' => request()->image->store('sliders','public')]);
        }
        $slider->save();
    }

}
