<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, static function (Faker $faker) {
    return [
        'availability_id' => factory(\App\Availability::class)->create(),
        'user_id' => factory(\App\User::class)->create(),
        'treatment_id' => factory(\App\Treatment::class)->create(),
        'dateTimeStart' => $faker->dateTime,
        'dateTimeEnd' => $faker->dateTime,
    ];
});
