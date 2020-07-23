<?php

namespace App\Http\Controllers\Home;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::whereUserId(1)->with('product')->get();
        return view('site.wishlist.index', compact('wishlist'));
    }
    public function store($product)
    {
        $wishlist = new Wishlist();
        $wishlist->product_id = $product;
        $wishlist->user_id = 1; //Todo::make it auth()->id
        $wishlist->save();
        return redirect()->back();
    }
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->back();
    }
}
