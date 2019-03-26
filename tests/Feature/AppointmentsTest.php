<?php

namespace Tests\Feature;

use App\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppointmentsTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testUnauthorizedUsersAreUnableToManageAppointments(): void
    {
        $response = $this->get('/appointments');
        $response->assertStatus(302)->assertRedirect('login');
    }

    public function testAuthorizedUsersAreAbleToManageAppointments(): void
    {
        $this->signIn();
        $response = $this->get('/appointments');
        $response->assertStatus(200);
    }

    public function testAppointmentsOverviewShowsFeedbackWhenNoAppointmentsPresent(): void
    {
        $this->signIn();
        $response = $this->get('/appointments');
        $response->assertSee('No appointments to display');
    }

    public function testAppointmentsOverviewShowsAll(): void
    {
        $this->signIn();
        $appointmentOne = factory(Appointment::class)->create([
            'title' => 'Foo',
        ]);

        $appointmentTwo = factory(Appointment::class)->create([
            'title' => 'Bar',
        ]);

        $response = $this->get('/appointments');
        $response->assertStatus(200);
        $response->assertSee($appointmentOne->getTitle());
        $response->assertSee($appointmentTwo->getTitle());
    }

    public function testAppointmentCanBeCreated(): void
    {
        $this->signIn();
        $response = $this->get(route('appointments.create'));
        $response->assertStatus(200);

        $response = $this->post(route('appointments'), [
            'title' => $firstName = $this->faker->sentence,
            'description' => $lastName = $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2),
        ]);
        $response->assertRedirect(route('appointments'));
    }

    public function testAppointmentDetailsCanBeViewed(): void
    {
        $this->signIn();
        $appointment = factory(Appointment::class)->create();

        $response = $this->get($appointment->getPath());
        $response->assertStatus(200);
        $response->assertSee($appointment->getTitle());
    }

    public function testAppointmentDetailsCanBeEdited(): void
    {
        $this->signIn();
        $appointment = factory(Appointment::class)->create();

        $response = $this->put($appointment->getPath(), array_only($appointment->getAttributes(), [
            'title',
            'description',
            'price',
        ]));

        $response->assertRedirect($appointmentsRoute = route('appointments'));

        $response = $this->get($appointmentsRoute);
        $response->assertStatus(200);
        $response->assertSee($appointment->getTitle());
    }

}
