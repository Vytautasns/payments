<?php

/** @var Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomFloat(),
        'image_url' => 'https://i.picsum.photos/id/'.$faker->numberBetween(0,100).'/200/100.jpg'
    ];
});
