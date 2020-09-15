<?php

namespace App\Http\Controllers\Home;

use App\Cart;
use App\City;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart_total = Cart::getTotal();
        $cities = City::get();
        return view('site.checkout.index', compact('cart_total', 'cities'));
    }
    public function store()
    {
        $this->saveData(new Order());

        return back();
    }
    private function validation()
    {
        return \request()->validate([
            'name' => 'required|min:3',
            'city_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'payment_status' => 'required'
        ]);
    }
    private function saveData($order)
    {
        $this->validation();
        $order->user_id = 1; //Todo
        $order->name = \request()->name;
        $order->city_id = \request()->city_id;
        $order->address = \request()->address;
        $order->phone = \request()->phone;
        $order->email = \request()->email;
        $order->total_price = Cart::getTotal()['total'];
        $order->payment_status = \request()->payment_status;
        $order->save();
        foreach (Cart::getUserCart(1)->whereOrderId(null)->get() as $cart){ //Todo
            $cart->order_id = $order->id;
            $cart->save();
        }
        session()->forget('discount');
    }
}
