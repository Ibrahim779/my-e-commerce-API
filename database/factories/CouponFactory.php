<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Coupon::class, function (Faker $faker) {
    return [
        'code' => Str::random(10),
        'discount' => $faker->numberBetween(5, 90)
    ];
});
