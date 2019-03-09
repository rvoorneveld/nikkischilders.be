<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'phoneNumber' => $faker->phoneNumber,
        'emailAddress' => $faker->email,
    ];
});

