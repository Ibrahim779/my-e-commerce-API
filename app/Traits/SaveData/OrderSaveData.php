<?php


namespace App\Traits\SaveData;


use App\Cart;
use App\City;

trait OrderSaveData
{
    private function validation()
    {
        return \request()->validate([
            'name' => 'required|min:3|max:191',
            'city_id' => 'required',
            'address' => 'required:min:10|max:191',
            'phone' => 'required|numeric|digits:11',
            'email' => 'required|email|max:191',
            'payment_status' => 'required|min:3|max:191'
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
