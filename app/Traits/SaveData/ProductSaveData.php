<?php


namespace App\Traits\SaveData;


trait ProductSaveData
{
    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'name' => 'required|min:3|max:191',
            'bar_code' => 'min:3|max:191',
            'price' => 'required|numeric|min:0|not_in:0',
            'quantity'=> 'required|min:3|max:191',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000'
        ]);
    }

    /**
     * @param $product
     * @param null $category
     */
    private function saveData($product, $category = null)
    {
        $this->validation();
        $product->name            = request()->name;
        $product->price           = request()->price;
        $product->discount        = request()->discount;
        $product->description     = request()->description;
        $product->quantity        = request()->quantity;
        $product->subcategory_id  = request()->subcategory_id;
        $product->brand_id        = request()->brand_id;
        $product->bar_code        = request()->bar_code;
        $product->is_published    = request()->is_published;
        $product->count           = request()->count;
        if ($category) {
            $product->category_id     = $category;
        }
        $product->save();
        if ($product->image){
            if (request()->image){
                $product->image()->update(['url' => request()->image->store('products','public')]);
            }
        }else{
            $product->image()->create(['url' => request()->image->store('products','public')]);
        }
        $product->save();
    }
}
