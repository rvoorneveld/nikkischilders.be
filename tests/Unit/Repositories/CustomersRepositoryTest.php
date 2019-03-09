<?php

namespace Tests\Unit\Repositories;

use App\Customer;
use App\Repositories\CustomersRepository;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomersRepositoryTest extends TestCase
{

    use RefreshDatabase;

    public function testGetAllOrderedByLastNameAscending(): void
    {
        factory(Customer::class)->create([
            'lastName' => 'foo',
        ]);

        factory(Customer::class)->create([
            'lastName' => 'bar',
        ]);

        $customers = (new CustomersRepository())->getAllOrderedByLastNameAscending();

        $this->assertSame('bar', $customers->first()->getLastName());
    }

}
