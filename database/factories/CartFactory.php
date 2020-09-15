<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Cart::class, function (Faker $faker) {
    return [
        'product_id' => factory(\App\Product::class),
        'user_id' => factory(\App\User::class),
        'order_id' => $faker->randomElement([factory(\App\Order::class), null]),
        'count' => $faker->numberBetween(1,20)
    ];
});
