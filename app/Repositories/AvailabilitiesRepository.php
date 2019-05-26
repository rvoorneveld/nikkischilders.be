<?php

namespace App\Repositories;

use App\Availability;

class AvailabilitiesRepository
{

    public function getAllOrderedByDateTimeStartDescending()
    {
        return Availability::orderByDesc('dateTimeStart')->get();
    }

}
