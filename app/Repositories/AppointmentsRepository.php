<?php

namespace App\Repositories;

use App\Appointment;

class AppointmentsRepository
{

    public function getAllOrderedByDateTimeStartDescending()
    {
    	return Appointment::all();
//        return Appointment::withAvailability()->orderByDesc('dateTimeStart')->get();
    }

}
