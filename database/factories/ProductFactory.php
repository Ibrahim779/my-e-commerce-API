<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(10),
        'description' => $faker->text,
        'discount' => $faker->randomElement([$faker->numberBetween(5, 90), null]),
        'quantity' => $faker->randomElement(['1K', '1p', '1 علبة']),
        'bar_code' => Str::random(10),
        'category_id' => factory(\App\Category::class),
        'brand_id' => factory(\App\Brand::class),
        'subcategory_id' => factory(\App\SubCategory::class),
        'is_published' => $faker->randomElement(['on', null]),
        'is_offer' => $faker->randomElement(['on', null])
    ];
});
