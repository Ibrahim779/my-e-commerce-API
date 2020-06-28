<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => function(){
            return factory(\App\Category::class)->create();
        }
    ];
});
