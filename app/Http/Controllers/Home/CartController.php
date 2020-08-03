<?php

namespace App\Http\Controllers\Home;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::whereUserId(1)->with('product')->get();
        return view('site.cart.index', compact('cartItems'));
    }
    public function store($product)
    {
        if (!Cart::whereProductId($product)->first()) {
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
}
