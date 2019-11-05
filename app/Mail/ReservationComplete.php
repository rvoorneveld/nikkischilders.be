<?php

namespace App\Mail;

use App\Appointment;
use Eluceo\iCal\Component\Calendar;
use Eluceo\iCal\Component\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationComplete extends Mailable
{
    use Queueable, SerializesModels;

    protected $appointment;

    /**
     * Create a new message instance.
     * @param Appointment $appointment
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->subject('Reservering ontvangen')
            ->attachData($this->calendarEvent(), 'event.ics')
            ->markdown('emails.reservation-complete')->with([
                'treatment' => $this->appointment->treatment->getTitle(),
                'dateTime' => $this->appointment->getDateTimeStart(),
            ]);
    }

    protected function calendarEvent(): string
    {
        $treatmentName = ($treatment = $this->appointment->treatment)->getTitle();

        $firstName = ($customer = $this->appointment->customer)->getFirstName();
        $lastName = $customer->getLastName();

        $event = (new Event)
            ->setDtStart($this->appointment->start)
            ->setDtEnd($this->appointment->end)
            ->setSummary("{$treatmentName} - {$lastName}, {$firstName}")
            ->setDescription("
Naam: {$lastName}, {$firstName} (#{$customer->id})
Emailadres: {$customer->getEmailAddress()}
Telefoon: {$customer->getPhoneNumber()}
Behandeling: {$treatmentName}
Bedrag: € {$treatment->getPrice()}
            ");

        $calendar = new Calendar('nikkischilders.be');
        $calendar->addComponent($event);
        return $calendar->render();
    }

}
