<?php

namespace Tests\Unit\Repositories;

use App\Customer;
use App\Repositories\CustomersRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomersRepositoryTest extends TestCase
{

    use RefreshDatabase;

    public function testGetAllOrderedByLastNameAscending(): void
    {
        factory($customerClass = Customer::class)->create([
            'lastName' => 'foo',
        ]);

        factory($customerClass)->create([
            'lastName' => 'bar',
        ]);

        $customers = (new CustomersRepository())->getAllOrderedByLastNameAscending();

        $this->assertSame('bar', $customers->first()->getLastName());
    }

}
