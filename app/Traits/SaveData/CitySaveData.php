<?php


namespace App\Traits\SaveData;


trait CitySaveData
{
    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'name' => 'required|min:3|max:191',
            'shipping' => 'required|numeric|min:0'
        ]);
    }
    private function saveData($city)
    {
        $this->validation();
        $city->name = request()->name;
        $city->shipping = request()->shipping;
        $city->save();
    }
}
