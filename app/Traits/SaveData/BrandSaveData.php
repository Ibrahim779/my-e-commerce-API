<?php


namespace App\Traits\SaveData;


trait BrandSaveData
{
    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'name' => 'required|min:3|max:191',
            'categories_id' => 'required'
        ]);
    }
    private function saveData($brand)
    {
        $this->validation();
        $brand->name = request()->name;
        $brand->save();
        if ($brand->categories){
            $brand->categories()->detach();
        }
        $brand->categories()->attach(\request()->categories_id);
    }

}
