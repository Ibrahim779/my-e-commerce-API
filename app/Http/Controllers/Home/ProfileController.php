<?php

namespace App\Http\Controllers\Home;

use App\Cart;
use App\City;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $cities = City::all();
        return view('site.profile.edit', compact('cities') );
    }
    public function orders()
    {
        $orders = Order::whereUserId(auth()->id())->latest()->get();
        return view('site.profile.orders.index', compact('orders'));
    }
    public function orderShow(Order $order)
    {
        $cartItems = Cart::getUserCart(auth()->id())->whereOrderId($order->id)->get();
        return view('site.profile.orders.show', compact('cartItems'));
    }
    public function update()
    {
        $this->saveData(auth()->user());
        return back();
    }
    private function validation()
    {
        $toValidate = [
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'phone' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'password' => 'nullable|min:8|max:255|confirmed',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:10000'
        ];
        $toValidate['email'] = 'required|email|unique:users,id,'. auth()->user()->id;

        return request()->validate($toValidate);
    }
    private function saveData($user)
    {
        $this->validation();
        $user->first_name            = request()->first_name;
        $user->last_name             = request()->last_name;
        $user->email                 = request()->email;
        $user->phone                 = request()->phone;
        $user->city_id               = request()->city_id??null;
        $user->address                = request()->address;
        $user->save();
        if ($user->image){
            isset(request()->image)?$user->image()->update(['url' => request()->image->store('users','public')]):null;
        }else{
            isset(request()->image)?$user->image()->create(['url' => request()->image->store('users','public')]):null;
        }
        $user->save();
    }
}
