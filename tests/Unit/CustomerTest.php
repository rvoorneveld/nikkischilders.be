<?php

namespace Tests\Unit;

use App\Appointment;
use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->stub = new Customer();
    }

    public function testCustomerHasAttributes(): void
    {
        $this->assertClassHasAttribute('firstName', $customerClass = Customer::class);
        $this->assertClassHasAttribute('lastName', $customerClass);
        $this->assertClassHasAttribute('phoneNumber', $customerClass);
        $this->assertClassHasAttribute('emailAddress', $customerClass);
    }

    public function testCustomerCanBeSetViaConstructor(): void
    {
        $customer = factory(Customer::class)->create([
            'firstName' => $firstName = $this->faker->firstName(),
            'lastName' => $lastName = $this->faker->lastName(),
            'phoneNumber' => $phoneNumber = $this->faker->phoneNumber(),
            'emailAddress' => $emailAddress = $this->faker->email(),
        ]);

        $this->assertSame($firstName, $customer->getFirstName());
        $this->assertSame($lastName, $customer->getLastName());
        $this->assertSame($phoneNumber, $customer->getPhoneNumber());
        $this->assertSame($emailAddress, $customer->getEmailAddress());
    }

    public function testHasRelationToAppointment(): void
    {
        $this->assertInstanceOf(Appointment::class, ($relation = $this->stub->appointments())->getRelated());
        $this->assertSame('appointments.customer_id', $relation->getQualifiedForeignKeyName());
        $this->assertSame('customers.id', $relation->getQualifiedParentKeyName());
    }

    public function testCustomerFullNameCanBeRetrievedByMethod(): void
    {
        $customer = factory(Customer::class)->create([
            'firstName' => $firstName = $this->faker->firstName(),
            'lastName' => $lastName = $this->faker->lastName(),
        ]);

        $this->assertSame("{$lastName}, {$firstName}", $customer->getName());
    }

    public function testCustomerPathCanBeRetrievedByMethod(): void
    {
        $customer = factory(Customer::class)->create();

        $this->assertSame("/customers/{$customer->id}", $customer->getPath());
    }

}
