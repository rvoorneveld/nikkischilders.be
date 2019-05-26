<?php

namespace Tests\Feature;

use App\Availability;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AvailabilitiesTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testUnauthorizedUsersAreUnableToManageAvailability(): void
    {
        $response = $this->get('/availabilities');
        $response->assertStatus(302)->assertRedirect('login');
    }

    public function testAuthorizedUsersAreAbleToManageAvailability(): void
    {
        $this->signIn();
        $response = $this->get('/availabilities');
        $response->assertStatus(200);
    }

    public function testAvailabilitiesOverviewShowsFeedbackWhenNoAvailabilityPresent(): void
    {
        $this->signIn();
        $response = $this->get('/availabilities');
        $response->assertSee('No availabilities to display');
    }

    public function testAvailabilitiesOverviewShowsAll(): void
    {
        $this->signIn();
        $availabilityOne = factory(Availability::class)->create();
        $availabilityTwo = factory(Availability::class)->create();

        $this->get('/availabilities')
             ->assertStatus(200)
             ->assertSee($availabilityOne->id)
             ->assertSee($availabilityOne->getDateTime())
             ->assertSee($availabilityTwo->id)
             ->assertSee($availabilityTwo->getDateTime());
    }

    public function testAvailabilityCanBeCreated(): void
    {
        $this->signIn();

        $this->get(route('availabilities.create'))->assertStatus(200);

        $this->post(route($route = 'availabilities'), [
            'dateTime' => $this->faker->dateTime,
        ])->assertRedirect(route($route));
    }

    public function testAvailabilityDetailsCanBeViewed(): void
    {
        $this->signIn();
        $availability = factory(Availability::class)->create();

        $this->get($availability->getPath())
             ->assertStatus(200)
             ->assertSee("#{$availability->id}");
    }

    public function testAppointmentDetailsCanBeEdited(): void
    {
        $this->signIn();
        $availability = factory(Availability::class)->create();

        $this->put($availability->getPath(), array_only($availability->getAttributes(), [
            'dateTime',
        ]))->assertRedirect($route = route('availabilities'));

        $this->get($route)
             ->assertStatus(200)
             ->assertSee($availability->id)
             ->assertSee($availability->getDateTime());
    }

}
