<?php

use Faker\Generator as Faker;

$factory->define(App\Treatment::class, static function (Faker $faker) {
    return [
        'category_id' => factory(\App\Category::class)->create(),
        'title' => $faker->sentence,
        'minutes' => $faker->randomElement([30, 60, 90,]),
        'price' => $faker->randomFloat(2, 99, 299),
    ];
});
