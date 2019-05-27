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
        $this->assertInstanceOf(Availability::class, ($relation = $this->stub->availability())->getRelated());
        $this->assertSame('appointments.availability_id', $relation->getQualifiedForeignKey());
        $this->assertSame('availabilities.id', $relation->getQualifiedOwnerKeyName());
    }

    public function testHasRelationToCustomer(): void
    {
        $this->assertInstanceOf(Customer::class, ($relation = $this->stub->customer())->getRelated());
        $this->assertSame('appointments.customer_id', $relation->getQualifiedForeignKey());
        $this->assertSame('customers.id', $relation->getQualifiedOwnerKeyName());
    }

    public function testHasRelationToTreatment(): void
    {
        $this->assertInstanceOf(Treatment::class, ($relation = $this->stub->treatment())->getRelated());
        $this->assertSame('appointments.treatment_id', $relation->getQualifiedForeignKey());
        $this->assertSame('treatments.id', $relation->getQualifiedOwnerKeyName());
    }

    public function testAppointmentPathCanBeRetrievedByMethod(): void
    {
        $this->assertSame("/appointments/{$this->stub->id}", $this->stub->getPath());
    }

}
