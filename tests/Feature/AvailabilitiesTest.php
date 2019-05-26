<?php

namespace Tests\Feature;

use App\Availability;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AvailabilitiesTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected $uri = '/availabilities';

    public function testUnauthorizedUsersAreUnableToManageAvailabilities(): void
    {
        $this->get($this->uri)
             ->assertStatus(302)
             ->assertRedirect('login');
    }

    public function testAuthorizedUsersAreAbleToManageAvailabilities(): void
    {
        $this->signIn();
        $this->get($this->uri)
             ->assertStatus(200);
    }

    public function testOverviewShowsFeedbackWhenNoAvailabilitiesPresent(): void
    {
        $this->signIn();
        $this->get($this->uri)
             ->assertSee('No availabilities to display');
    }

    public function testOverviewShowsAll(): void
    {
        $this->signIn();
        $availabilityOne = factory($class = Availability::class)->create();
        $availabilityTwo = factory($class)->create();

        $this->get($this->uri)
             ->assertStatus(200)
             ->assertSee($availabilityOne->getDateTimeStart())
             ->assertSee($availabilityOne->getDateTimeEnd())
             ->assertSee($availabilityTwo->getDateTimeStart())
             ->assertSee($availabilityTwo->getDateTimeEnd());
    }

    public function testItCanBeCreated(): void
    {
        $this->signIn();
        $this->get(route('availabilities.create'))->assertStatus(200);

        $this->post(route($route = 'availabilities'), [
            'dateTimeStart' => $this->faker->dateTime,
            'dateTimeEnd' => $this->faker->dateTime,
        ])->assertRedirect(route($route));
    }

    public function testDetailsCanBeViewed(): void
    {
        $this->signIn();
        $availability = factory(Availability::class)->create();

        $this->get($availability->getPath())
             ->assertStatus(200);
    }

    public function testDetailsCanBeEdited(): void
    {
        $this->signIn();
        $availability = factory(Availability::class)->create();

        $this->put($availability->getPath(), array_only($availability->getAttributes(), [
            'dateTimeStart',
            'dateTimeEnd',
        ]))->assertRedirect($appointmentsRoute = route('availabilities'));

        $this->get($appointmentsRoute)
             ->assertStatus(200);
    }

}
