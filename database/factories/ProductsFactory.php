<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Product::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'link' => $faker->url,
        'slug' => $faker->slug(),
        'type' => 'affiliate',
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'main_image' => $faker->imageUrl(),
        'brands_id' => \App\Brand::all()->random()->id
    ];
});
