<?php

namespace Tests\Unit;

use App\Treatment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TreatmentTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testTreatmentHasAttributes(): void
    {
        $this->assertClassHasAttribute('title', $treatmentClass = Treatment::class);
        $this->assertClassHasAttribute('description', $treatmentClass);
        $this->assertClassHasAttribute('price', $treatmentClass);
    }

    public function testTreatmentCanBeSetViaConstructor(): void
    {
        $treatment = factory(Treatment::class)->create([
            'title' => $title = $this->faker->sentence,
            'description' => $description = $this->faker->paragraph,
            'price' => $price = $this->faker->randomFloat(2),
        ]);

        $this->assertSame($title, $treatment->getTitle());
        $this->assertSame($description, $treatment->getDescription());
        $this->assertSame($price, $treatment->getPrice());
    }

    public function testTreatmentPathCanBeRetrievedByMethod(): void
    {
        $treatment = factory(Treatment::class)->create();

        $this->assertSame("/treatments/{$treatment->id}", $treatment->getPath());
    }

}
