<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Message::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'message' => $faker->sentence
    ];
});
