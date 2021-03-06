<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'shipping' => $faker->numberBetween(5, 30)
    ];
});
