<?php

namespace App\Http\Controllers\Home;

use App\Cart;
use App\City;
use App\Order;
use App\Http\Controllers\Controller;
use App\Traits\SaveData\UserSaveData;

class ProfileController extends Controller
{
    use UserSaveData;
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
}
