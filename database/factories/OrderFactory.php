<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Order::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'city_id' => factory(\App\City::class),
        'address' => $faker->sentence,
        'email' => $faker->email,
        'payment_status' => $faker->randomElement(['debt', 'paid']),
        'status' => $faker->randomElement(['pending', 'prepared', 'delivered','completed'])

    ];
});
