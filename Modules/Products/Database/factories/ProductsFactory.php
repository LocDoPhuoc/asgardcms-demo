<?php

use Faker\Generator as Faker;
use Modules\Products\Entities\Products;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text(64),
        'description' => '<p>' . $faker->sentence(20) . '</p>',
        'price' => $faker->randomNumber(3),
        'image' => '/uploads/images/default_product_image.jpg',
    ];
});
