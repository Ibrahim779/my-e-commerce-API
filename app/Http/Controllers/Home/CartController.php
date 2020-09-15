<?php

namespace App\Http\Controllers\Home;

use App\Cart;
use App\Coupon;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        //Todo:: remove static user and add auth user
        $cartItems = Cart::getUserCart(1)->whereOrderId(null)->get();
        $cart_total = Cart::getTotal();
        return view('site.cart.index', compact('cartItems', 'cart_total'));
    }
    public function store($product)
    {
        if (!Cart::whereProductId($product)->whereOrderId(null)->first()) {
            $cart = new Cart();
            $cart->product_id = $product;
            $cart->user_id = 1; //Todo::make it auth()->id
            $cart->save();
        }
        return back();
    }
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back();
    }
    public function applyCoupon()
    {
        \request()->validate([
            'code' => 'required'
        ]);
        $coupon = Coupon::whereCode(\request()->code)->first();
        if ($coupon){
           $discount = Cart::getTotal()['total'] * ($coupon->discount/100);
           session()->put('discount', $discount);
        }
        return back();
    }
}
