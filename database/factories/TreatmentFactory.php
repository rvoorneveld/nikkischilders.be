<?php

use Faker\Generator as Faker;

$factory->define(App\Treatment::class, static function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 99, 299),
    ];
});
