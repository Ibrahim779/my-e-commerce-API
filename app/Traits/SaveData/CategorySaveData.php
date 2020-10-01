<?php


namespace App\Traits\SaveData;


trait CategorySaveData
{

    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'name' => 'required|min:3|max:191',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000',
        ]);
    }

    /**
     * @param $category
     */
    private function saveData($category)
    {
        $this->validation();
        $category->name = request()->name;
        $category->save();
        if ($category->image){
            if (request()->image){
                $category->image()->update(['url' => request()->image->store('categories','public')]);
            }
        }else{
            $category->image()->create(['url' => request()->image->store('categories','public')]);
        }
        $category->save();
    }
}
