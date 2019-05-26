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
        $appointmentOne = factory(Appointment::class)->create();
        $appointmentTwo = factory(Appointment::class)->create();

        $response = $this->get('/appointments');
        $response->assertStatus(200);
        $response->assertSee($appointmentOne->id);
        $response->assertSee($appointmentOne->getDateTimeStart());
        $response->assertSee($appointmentTwo->id);
        $response->assertSee($appointmentTwo->getDateTimeStart());
    }

    public function testAppointmentCanBeCreated(): void
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $this->get(route('appointments.create'))->assertStatus(200);

        $this->post(route($route = 'appointments'), [
            'customer_id' => $id = $this->faker->numberBetween(),
            'treatment_id' => $id,
            'dateTimeStart' => $dateTime = $this->faker->dateTime,
            'dateTimeEnd' => $dateTime,
        ])->assertRedirect(route($route));
    }

    public function testAppointmentDetailsCanBeViewed(): void
    {
        $this->signIn();
        $appointment = factory(Appointment::class)->create();

        $this->get($appointment->getPath())
             ->assertStatus(200)
             ->assertSee("#{$appointment->id}");
    }

    public function testAppointmentDetailsCanBeEdited(): void
    {
        $this->signIn();
        $appointment = factory(Appointment::class)->create();

        $this->put($appointment->getPath(), array_only($appointment->getAttributes(), [
            'customer_id',
            'treatment_id',
            'dateTimeStart',
            'dateTimeEnd',
        ]))->assertRedirect($appointmentsRoute = route('appointments'));

        $this->get($appointmentsRoute)
             ->assertStatus(200)
             ->assertSee($appointment->id)
             ->assertSee($appointment->getDateTimeStart());
    }

}
