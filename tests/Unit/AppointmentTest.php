<?php

namespace Tests\Unit;

use App\Appointment;
use App\Customer;
use App\Treatment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testAppointmentHasAttributes(): void
    {
        $this->assertClassHasAttribute('dateTimeStart', $appointmentClass = Appointment::class);
        $this->assertClassHasAttribute('dateTimeEnd', $appointmentClass);
    }

    public function testAppointmentCanBeSetViaConstructor(): void
    {
        $appointment = factory(Appointment::class)->create([
            'customer_id' => $customerId = factory(Customer::class)->create()->id,
            'treatment_id' => $treatmentId = factory(Treatment::class)->create()->id,
            'dateTimeStart' => $dateTimeStart = $this->faker->dateTime,
            'dateTimeEnd' => $dateTimeEnd = $this->faker->dateTime,
        ]);

        $this->assertSame($customerId, $appointment->customer()->first()->id);
        $this->assertSame($treatmentId, $appointment->treatment()->first()->id);
        $this->assertSame($dateTimeStart, $appointment->getDateTimeStart());
        $this->assertSame($dateTimeEnd, $appointment->getDateTimeEnd());
    }

    public function testAppointmentPathCanBeRetrievedByMethod(): void
    {
        $appointment = factory(Appointment::class)->create();

        $this->assertSame("/appointments/{$appointment->id}", $appointment->getPath());
    }

}
