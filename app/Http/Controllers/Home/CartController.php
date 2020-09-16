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
        $cartItems = Cart::getUserCart(auth()->id())->whereOrderId(null)->get();
        $cart_total = Cart::getTotal();
        return view('site.cart.index', compact('cartItems', 'cart_total'));
    }
    public function store($product)
    {
        if (!Cart::whereUserId(auth()->id())->whereProductId($product)->whereOrderId(null)->first()) {
            $this->saveData(new Cart(), $product);
        }
        return back();
    }
    public function update(Cart $cart)
    {
        $this->saveData($cart);
        return back();
    }
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back();
    }
    private function saveData(Cart $cart,$product = null)
    {
        $cart->product_id = $product??$cart->product_id;
        $cart->user_id    = $cart->user_id??auth()->id();
        $cart->count      = request()->count??1;
        $cart->save();
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
