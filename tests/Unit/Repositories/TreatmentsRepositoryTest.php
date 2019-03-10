<?php

namespace Tests\Unit\Repositories;

use App\Treatment;
use App\Repositories\TreatmentsRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TreatmentsRepositoryTest extends TestCase
{

    use RefreshDatabase;

    public function testGetAllOrderedByTitleAscending(): void
    {
        factory($treatmentClass = Treatment::class)->create([
            'title' => 'foo',
        ]);

        factory($treatmentClass)->create([
            'title' => 'bar',
        ]);

        $treatments = (new TreatmentsRepository())->getAllOrderedByTitleAscending();

        $this->assertSame('bar', $treatments->first()->getTitle());
    }

}
