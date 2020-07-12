<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(10),
        'description' => $faker->text,
        'category_id' => function(){
           return factory(\App\Category::class)->create();
        },
        'brand_id' => function(){
            return factory(\App\Brand::class)->create();
        },
        'subcategory_id' => function(){
             return factory(\App\SubCategory::class)->create();
        },
        'status' => 0,
        'is_offer' => 1
    ];
});
