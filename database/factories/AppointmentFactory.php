<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, static function (Faker $faker) {
    return [
        'availability_id' => factory(\App\Availability::class)->create(),
        'customer_id' => factory(\App\Customer::class)->create(),
        'treatment_id' => factory(\App\Treatment::class)->create(),
    ];
});
