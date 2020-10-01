<?php


namespace App\Traits\SaveData;


trait SubcategorySaveData
{
    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'name' => 'required|min:3|max:191'
        ]);
    }
    private function saveData($subcategory, $category = null)
    {
        $this->validation();
        $subcategory->name = request()->name;
        if ($category){
            $subcategory->category_id = $category;
        }
        $subcategory->save();
    }

}
