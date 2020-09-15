<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function scopeGetUserCart($query, $user)
    {
        return $query->whereUserId($user)->with('product');
    }
    public static function getTotal()
    {
        //Todo:: remove static user and add auth user
        $cart = Cart::getUserCart(1)->whereOrderId(null)->get();
        $sub_total = 0;
        foreach ($cart as $cartItem){
            $sub_total += @$cartItem->product->discount_price;
        }
        $delivery = 5;
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
