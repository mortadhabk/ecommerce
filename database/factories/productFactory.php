<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use App\Price;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(2) ,
        'slug' => $faker->slug ,
        'subtitle' => $faker->sentence(4) ,
        'description' => $faker->text ,


        'shop_id' => 1,
    ];
});
