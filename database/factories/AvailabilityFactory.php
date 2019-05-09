<?php

use Faker\Generator as Faker;

$factory->define(App\Availability::class, static function (Faker $faker) {
    return [
        'dateTime' => $faker->dateTime,
    ];
});
