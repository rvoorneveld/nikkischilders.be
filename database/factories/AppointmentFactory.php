<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        'customer_id' => factory(\App\Customer::class)->create(),
        'treatment_id' => factory(\App\Treatment::class)->create(),
        'dateTimeStart' => $faker->dateTime,
        'dateTimeEnd' => $faker->dateTime,
    ];
});
