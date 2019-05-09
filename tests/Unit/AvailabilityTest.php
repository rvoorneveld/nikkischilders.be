<?php

namespace Tests\Unit;

use App\Availability;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AvailabilityTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testAvailabilityHasAttributes(): void
    {
        $this->assertClassHasAttribute('dateTime', Availability::class);
    }

    public function testAvailabilityCanBeSetViaConstructor(): void
    {
        $availability = factory(Availability::class)->create([
            'dateTime' => $dateTimeEnd = $this->faker->dateTime,
        ]);

        $this->assertSame($dateTimeEnd->format($dateFormat = 'Y-m-d H:i:s'), $availability->getDateTime()->toDateTimeString());
    }

    public function testAvailabilityPathCanBeRetrievedByMethod(): void
    {
        $availability = factory(Availability::class)->create();

        $this->assertSame("/availabilities/{$availability->id}", $availability->getPath());
    }

}
