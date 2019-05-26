<?php

namespace App\Repositories;

use App\Availability;

class AvailabilitiesRepository
{

    public function getAllOrderedByDateTimeDescending()
    {
        return Availability::orderByDesc('dateTime')->get();
    }

}
