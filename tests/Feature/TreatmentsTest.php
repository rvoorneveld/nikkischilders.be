<?php

namespace Tests\Feature;

use App\Treatment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TreatmentsTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testUnauthorizedUsersAreUnableToManageTreatments(): void
    {
        $response = $this->get('/treatments');
        $response->assertStatus(302)->assertRedirect('login');
    }

    public function testAuthorizedUsersAreAbleToManageTreatments(): void
    {
        $this->signIn();
        $response = $this->get('/treatments');
        $response->assertStatus(200);
    }

    public function testTreatmentsOverviewShowsFeedbackWhenNoTreatmentsPresent(): void
    {
        $this->signIn();
        $response = $this->get('/treatments');
        $response->assertSee('No treatments to display');
    }

    public function testTreatmentsOverviewShowsAll(): void
    {
        $this->signIn();
        $treatmentOne = factory(Treatment::class)->create([
            'title' => 'Foo',
        ]);

        $treatmentTwo = factory(Treatment::class)->create([
            'title' => 'Bar',
        ]);

        $response = $this->get('/treatments');
        $response->assertStatus(200);
        $response->assertSee($treatmentOne->getTitle());
        $response->assertSee($treatmentOne->getPrice());
        $response->assertSee($treatmentTwo->getTitle());
        $response->assertSee($treatmentTwo->getPrice());
    }

    public function testTreatmentCanBeCreated(): void
    {
        $this->signIn();
        $response = $this->get(route('treatments.create'));
        $response->assertStatus(200);

        $response = $this->post(route('treatments'), [
            'title' => $firstName = $this->faker->sentence,
            'description' => $lastName = $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2),
        ]);
        $response->assertRedirect(route('treatments'));
    }

    public function testTreatmentDetailsCanBeViewed(): void
    {
        $this->signIn();
        $treatment = factory(Treatment::class)->create();

        $response = $this->get($treatment->getPath());
        $response->assertStatus(200);
        $response->assertSee($treatment->getTitle());
        $response->assertSee($treatment->getPrice());
    }

    public function testTreatmentDetailsCanBeEdited(): void
    {
        $this->signIn();
        $treatment = factory(Treatment::class)->create();

        $response = $this->put($treatment->getPath(), array_only($treatment->getAttributes(), [
            'title',
            'description',
            'price',
        ]));

        $response->assertRedirect($treatmentsRoute = route('treatments'));

        $response = $this->get($treatmentsRoute);
        $response->assertStatus(200);
        $response->assertSee($treatment->getTitle());
    }

}
