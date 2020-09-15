<?php

namespace App\Http\Controllers\Home;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::whereUserId(1)->with('product')->get();//Todo
        return view('site.wishlist.index', compact('wishlist'));
    }
    public function store($product)
    {
        if (!Wishlist::whereProductId($product)->first()){
            $wishlist = new Wishlist();
            $wishlist->product_id = $product;
            $wishlist->user_id = 1; //Todo::make it auth()->id
            $wishlist->save();
        }
        return back();
    }
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return back();
    }
}
