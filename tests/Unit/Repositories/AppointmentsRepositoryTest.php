<?php

namespace Tests\Unit\Repositories;

use App\Appointment;
use App\Repositories\AppointmentsRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentsRepositoryTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testGetAllOrderedByTitleAscending(): void
    {
        factory($appointmentClass = Appointment::class)->create([
            'dateTimeStart' => $test = $this->faker->dateTimeBetween('-2years', '-1year'),
        ]);

        factory($appointmentClass)->create([
            'dateTimeStart' => $expected = $this->faker->dateTimeThisMonth(),
        ]);

        $appointments = (new AppointmentsRepository)->getAllOrderedByDateTimeStartDescending();
        $this->assertSame($expected->format('d-m-Y H:i'), $appointments->first()->getDateTimeStart());
    }

}
