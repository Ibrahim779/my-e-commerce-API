<?php

namespace App\Http\Controllers\Home;

use App\Cart;
use App\City;
use App\Order;
use App\Traits\SaveData\OrderSaveData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    use OrderSaveData;
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
}
