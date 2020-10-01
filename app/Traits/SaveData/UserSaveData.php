<?php


namespace App\Traits\SaveData;


use Illuminate\Support\Facades\Hash;

trait UserSaveData
{
    protected function validation($user)
    {
        $toValidate = [
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'phone' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'password' => 'nullable|min:8|max:255|confirmed',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000'
        ];
        $toValidate['email'] = 'required|email|unique:users,id,'. $user->id;

        return request()->validate($toValidate);
    }
    protected function saveData($user)
    {
        $this->validation($user);
        $user->first_name            = request()->first_name;
        $user->last_name             = request()->last_name;
        $user->email                 = request()->email;
        $user->phone                 = request()->phone;
        $user->city_id               = request()->city_id??null;
        $user->address               = request()->address;
        if (request()->role){
            $user->role = request()->role;
        }
        if (request()->password){
            $user->password  =  Hash::make(request()->password);
        }
        $user->save();
        if ($user->image){
            isset(request()->image)?$user->image()->update(['url' => request()->image->store('users','public')]):null;
        }else{
            isset(request()->image)?$user->image()->create(['url' => request()->image->store('users','public')]):null;
        }
        $user->save();
    }

}
