<?php

namespace App\Repositories;

use App\Appointment;

class AppointmentsRepository
{

    public function getAllOrderedByDateTimeStartDescending()
    {
        return Appointment::orderByDesc('dateTimeStart')->get();
    }

}
