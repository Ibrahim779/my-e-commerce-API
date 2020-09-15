<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BrandCategory;
use Faker\Generator as Faker;

$factory->define(BrandCategory::class, function (Faker $faker) {
    return [
        'brand_id' => factory(\App\Brand::class),
        'category_id' => factory(\App\Category::class)
    ];
});
