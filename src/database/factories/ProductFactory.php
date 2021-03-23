<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'description' =>$faker->sentence(),
        'category_id'=> random_int(1, 10)
    ];
});

