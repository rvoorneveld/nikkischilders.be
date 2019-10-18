<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, static function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'image' => $faker->image(),
    ];
});
