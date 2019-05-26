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

        $this->get('/appointments')
             ->assertStatus(200)
             ->assertSee($appointmentOne->customer->getName())
             ->assertSee($appointmentOne->treatment->getTitle())
             ->assertSee($appointmentTwo->customer->getName())
             ->assertSee($appointmentTwo->treatment->getTitle());
    }

    public function testAppointmentCanBeCreated(): void
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $response = $this->get(route('appointments.create'));
        $response->assertStatus(200);

        $response = $this->post(route('appointments'), [
            'availability_id' => $this->faker->numberBetween(),
            'treatment_id' => $this->faker->numberBetween(),
            'customer_id' => $this->faker->numberBetween(),
        ]);
        $response->assertRedirect(route('appointments'));
    }

    public function testAppointmentDetailsCanBeViewed(): void
    {
        $this->signIn();
        $appointment = factory(Appointment::class)->create();

        $this->get($appointment->getPath())
             ->assertStatus(200)
             ->assertSee($appointment->availability->getDateTimeStart())
             ->assertSee($appointment->customer->getName())
             ->assertSee($appointment->treatment->getTitle());
    }

    public function testAppointmentDetailsCanBeEdited(): void
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $appointment = factory(Appointment::class)->create();

        $response = $this->put($appointment->getPath(), array_only($appointment->getAttributes(), [
            'availability_id',
            'customer_id',
            'treatment_id',
        ]));

        $response->assertRedirect($appointmentsRoute = route('appointments'));

        $response = $this->get($appointmentsRoute);
        $response->assertStatus(200);
//        $response->assertSee($appointment->availability->getDateTimeStart());
        $response->assertSee($appointment->customer->getName());
        $response->assertSee($appointment->treatment->getTitle());
    }

}
