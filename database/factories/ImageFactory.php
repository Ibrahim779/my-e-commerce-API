<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\image::class, function (Faker $faker) {
    $type = $faker->randomElement(
        [
            \App\Product::class,
            \App\Category::class,
            \App\Slider::class
        ]);
    return [
        'imageable_type' => $type,
        'imageable_id' => factory($type),
        'url' => $faker->randomElement(
            [
                asset('assets/site/images/product-1.jpg'),
                asset('assets/site/images/product-2.jpg'),
                asset('assets/site/images/product-3.jpg'),
                asset('assets/site/images/bg-1.jpg'),
                asset('assets/site/images/bg-2.jpg'),
                asset('assets/site/images/bg-3.jpg'),
             ])
    ];
});
