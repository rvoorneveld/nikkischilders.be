<?php

namespace Tests\Unit\Repositories;

use App\Availability;
use App\Repositories\AvailabilitiesRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AvailabilitiesRepositoryTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testGetAllOrderedByTitleAscending(): void
    {
        factory($availabilityClass = Availability::class)->create([
            $dateTimeKey = 'dateTime' => $this->faker->dateTimeBetween('-2years', '-1year'),
        ]);

        factory($availabilityClass)->create([
            $dateTimeKey => $expected = $this->faker->dateTimeThisMonth(),
        ]);

        $availabilities = (new AvailabilitiesRepository())->getAllOrderedByDateTimeDescending();

        $this->assertSame($expected->format('Y-m-d H:i:s'), $availabilities->first()->getDateTime()->toDateTimeString());
    }

}
