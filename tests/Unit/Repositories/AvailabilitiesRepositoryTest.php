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
        factory(Availability::class)->create([
            'dateTimeStart' => $orderedSecond = $this->faker->dateTimeBetween('-3 hour', '-2 hour'),
        ]);

        factory(Availability::class)->create([
            'dateTimeStart' => $orderedFirst = $this->faker->dateTimeBetween('-1 hour'),
        ]);

        $availabilities = (new AvailabilitiesRepository())->getAllOrderedByDateTimeStartDescending();

        $this->assertSame($orderedFirst->format($dateFormat = 'y-m-d H:i:s'), $availabilities->first()->getDateTimeStart()->format($dateFormat));
        $this->assertSame($orderedSecond->format($dateFormat), $availabilities->last()->getDateTimeStart()->format($dateFormat));
    }

}
