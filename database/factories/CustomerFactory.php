<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, static function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'phoneNumber' => $faker->phoneNumber,
        'emailAddress' => $faker->email,
    ];
});

