<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
    protected $with = ['user'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeGetUserCart($query, $user)
    {
        return $query->whereUserId($user)->with('product');
    }
    public static function getTotal()
    {
        $cart = Cart::getUserCart(auth()->id())->whereOrderId(null)->get();
        $sub_total = 0;
        foreach ($cart as $cartItem){
            $sub_total += @$cartItem->count * @$cartItem->product->discount_price;
        }
        $delivery = auth()->user()->city->shipping;
        $discount = session()->get('discount') ?? 0;
        $total = $sub_total + $delivery - $discount;

        return [
            'sub_total' => $sub_total,
            'delivery' => $delivery,
            'discount' => $discount,
            'total' => $total
        ];
    }
}
