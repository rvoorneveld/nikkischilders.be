<?php

use Faker\Generator as Faker;

$factory->define(App\Availability::class, function (Faker $faker) {
    return [
        'dateTimeStart' => $faker->dateTime,
        'dateTimeEnd' => $faker->dateTime,
    ];
});
