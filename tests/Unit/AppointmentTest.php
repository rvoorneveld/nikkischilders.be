<?php

namespace Tests\Unit;

use App\Appointment;
use App\Availability;
use App\Customer;
use App\Treatment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected $stub;

    protected function setUp()
    {
        parent::setUp();

        $this->stub = new Appointment();
    }

    public function testHasRelationToAvailability(): void
    {
        $appointment = factory(Appointment::class)->create([
            'customer_id' => $customerId = factory(Customer::class)->create()->id,
            'treatment_id' => $treatmentId = factory(Treatment::class)->create()->id,
            'dateTimeStart' => $dateTimeStart = $this->faker->dateTime,
            'dateTimeEnd' => $dateTimeEnd = $this->faker->dateTime,
        ]);

        $this->assertSame($customerId, $appointment->customer()->first()->id);
        $this->assertSame($treatmentId, $appointment->treatment()->first()->id);
        $this->assertSame($dateTimeStart->format($dateFormat = 'Y-m-d H:i:s'), $appointment->getDateTimeStart()->toDateTimeString());
        $this->assertSame($dateTimeEnd->format($dateFormat), $appointment->getDateTimeEnd()->toDateTimeString());
    }

    public function testHasRelationToCustomer(): void
    {
        $relation = $this->stub->customer();
        $this->assertInstanceOf(Customer::class, $relation->getRelated());
        $this->assertSame('appointments.customer_id', $relation->getQualifiedForeignKey());
        $this->assertSame('customers.id', $relation->getQualifiedOwnerKeyName());
    }

    public function testHasRelationToTreatment(): void
    {
        $relation = $this->stub->treatment();
        $this->assertInstanceOf(Treatment::class, $relation->getRelated());
        $this->assertSame('appointments.treatment_id', $relation->getQualifiedForeignKey());
        $this->assertSame('treatments.id', $relation->getQualifiedOwnerKeyName());
    }

    public function testAppointmentPathCanBeRetrievedByMethod(): void
    {
        $this->assertSame("/appointments/{$this->stub->id}", $this->stub->getPath());
    }

}
