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
        if (Cart::getUserCart(auth()->id())->whereOrderId(null)->publishedProduct()->count()){
            $this->saveData(new Order());
            return back();
        }
        else{
            return back()->withErrors([__('site.empty_cart_error')]);
        }
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
        $order->user_id = auth()->id();
        $order->name    = request()->name;
        $order->city_id = request()->city_id;
        $order->address = request()->address;
        $order->phone   = request()->phone;
        $order->email   = request()->email;
        if (request()->city_id == auth()->user()->city_id){
            $order->total_price = Cart::getTotal()['total'];
        }else{
            $city = City::find(request()->city_id);
            $order->total_price =  Cart::getTotal()['sub_total'] + $city->shipping - Cart::getTotal()['discount'];
        }
        $order->payment_status = request()->payment_status;
        $order->save();
        foreach (Cart::getUserCart(auth()->id())->whereOrderId(null)->publishedProduct()->get() as $cart){
            $cart->order_id = $order->id;
            $cart->product->count -= $cart->count;
            $cart->product->save();
            $cart->save();
        }
        session()->forget('discount');
    }
}
