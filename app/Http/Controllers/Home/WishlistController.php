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
        $wishlist = Wishlist::whereUserId(auth()->id())->with('product')->get();
        return view('site.wishlist.index', compact('wishlist'));
    }
    public function store($product)
    {
        if (!Wishlist::whereUserId(auth()->id())->whereProductId($product)->first()){
            $this->saveData(new Wishlist(), $product);
        }
        return back();
    }
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return back();
    }
    private function saveData($wishlist, $product)
    {
        $wishlist->product_id = $product;
        $wishlist->user_id = auth()->id();
        $wishlist->save();
    }
}
