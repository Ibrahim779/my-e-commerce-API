<?php


namespace App\Traits\SaveData;


trait CouponSaveData
{
    /**
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'code' => 'required|min:3|max:191',
            'discount' => 'required|numeric|min:0'
        ]);
    }
    private function saveData($coupon)
    {
        $this->validation();
        $coupon->code = request()->code;
        $coupon->discount = request()->discount;
        $coupon->save();
    }

}
