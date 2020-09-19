<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {

    return [

                'title' => $faker->sentence(2) ,
                'slug' => $faker->slug ,
                'description' => $faker->sentence(4) ,
                'user_id' => 2 ,


    ];
});
