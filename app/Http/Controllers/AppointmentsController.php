<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Repositories\AppointmentsRepository;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{

    protected $appointmentsRepository;

    public function __construct(AppointmentsRepository $appointmentsRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
    }

    public function index()
    {
        $appointments = $this->appointmentsRepository->getAllOrderedByDateTimeStartDescending();
        return view('appointments.overview', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Appointment $appointment)
    {
        $appointment->update(request()->validate([
            'availability_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'treatment_id' => 'required|numeric',
        ]));

        return redirect(route('appointments'));
    }

    public function store()
    {
        Appointment::create(request()->validate([
            'customer_id' => 'required|numeric',
            'treatment_id' => 'required|numeric',
            'dateTimeStart' => 'required',
            'dateTimeEnd' => 'required',
        ]));

        return redirect(route('appointments'));
    }

}
