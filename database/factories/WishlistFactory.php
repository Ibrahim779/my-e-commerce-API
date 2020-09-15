<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Wishlist::class, function (Faker $faker) {
    return [
        'product_id' => factory(\App\Product::class),
        'user_id' => factory(\App\User::class)
    ];
});
