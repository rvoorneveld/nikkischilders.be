<?php

namespace Tests\Unit;

use App\Availability;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AvailabilityTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected $stub;

    protected function setUp()
    {
        parent::setUp();

        $this->stub = new Availability();
    }

    public function testPathCanBeRetrievedByMethod(): void
    {
        $this->assertSame("/availabilities/{$this->stub->id}", $this->stub->getPath());
    }

}
