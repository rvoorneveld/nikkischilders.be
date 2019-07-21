<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomersTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testUnauthorizedUsersAreUnableToManageCustomers(): void
    {
        $response = $this->get('/customers');
        $response->assertStatus(302)->assertRedirect('login');
    }

    public function testAuthorizedUsersAreAbleToManageCustomers(): void
    {
        $this->signIn();
        $response = $this->get('/customers');
        $response->assertStatus(200);
    }

    public function testCustomersOverviewShowsFeedbackWhenNoCustomersPresent(): void
    {
        $this->signIn();
        $response = $this->get('/customers');
        $response->assertSee('No customers to display');
    }

    public function testCustomersOverviewShowsAll(): void
    {
        $this->signIn();
        $customerOne = factory(Customer::class)->create([
            'firstName' => 'Foo',
            'lastName' => 'Bar',
        ]);

        $customerTwo = factory(Customer::class)->create([
            'firstName' => 'Baz',
            'lastName' => 'Qux',
        ]);

        $response = $this->get('/customers');
        $response->assertStatus(200);
        $response->assertSee($customerOne->getName());
        $response->assertSee($customerTwo->getName());
    }

    public function testCustomerCanBeCreated(): void
    {
        $this->signIn();
        $response = $this->get(route('customers.create'));
        $response->assertStatus(200);

        $response = $this->post(route('customers'), [
            'firstName' => $firstName = $this->faker->firstName,
            'lastName' => $lastName = $this->faker->lastName,
            'phoneNumber' => $this->faker->phoneNumber,
            'emailAddress' => $this->faker->email,
        ]);
        $response->assertRedirect(route('customers'));
    }

    public function testCustomerDetailsCanBeViewed(): void
    {
        $this->signIn();
        $customer = factory(Customer::class)->create();

        $response = $this->get($customer->getPath());
        $response->assertStatus(200);
        $response->assertSee($customer->getName());
    }

    public function testCustomerDetailsCanBeEdited(): void
    {
        $this->signIn();
        $customer = factory(Customer::class)->create();

        $response = $this->put($customer->getPath(), array_only($customer->getAttributes(), [
            'firstName',
            'lastName',
            'phoneNumber',
            'emailAddress',
        ]));

        $response->assertRedirect($customersRoute = route('customers'));

        $response = $this->get($customersRoute);
        $response->assertStatus(200);
        $response->assertSee(htmlentities($customer->getName()));
    }

}
