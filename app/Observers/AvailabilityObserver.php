<?php

namespace App\Observers;

use App\Availability;

class AvailabilityObserver
{

    /**
     * Handle the availability "created" event.
     *
     * @param Availability $availability
     * @return void
     */
    public function creating(Availability $availability): void
    {
        $availability->end = $availability->start->addMinutes(Availability::HALF_AN_HOUR_IN_MINUTES);
    }

}
