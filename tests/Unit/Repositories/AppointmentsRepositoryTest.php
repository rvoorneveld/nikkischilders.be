<?php

namespace Tests\Unit\Repositories;

use App\Appointment;
use App\Repositories\AppointmentsRepository;
use Faker\Provider\DateTime;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentsRepositoryTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testGetAllOrderedByTitleAscending(): void
    {
        factory(Appointment::class, $expected = 2)->create();
        $this->assertCount($expected, (new AppointmentsRepository())->getAllOrderedByDateTimeStartDescending());
    }

}
