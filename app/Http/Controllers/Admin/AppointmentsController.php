<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Repositories\AppointmentsRepository;

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
        return view('admin.appointments.overview', compact('appointments'));
    }

    public function create()
    {
        return view('admin.appointments.create');
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', compact('appointment'));
    }

    public function update(Appointment $appointment)
    {
        $appointment->update(request()->validate([
            'availability_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'treatment_id' => 'required|numeric',
            'dateTimeStart' => 'required',
            'dateTimeEnd' => 'required',
        ]));

        return redirect(route('appointments'));
    }

    public function store()
    {
        Appointment::create(request()->validate([
            'availability_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'treatment_id' => 'required|numeric',
            'dateTimeStart' => 'required',
            'dateTimeEnd' => 'required',
        ]));

        return redirect(route('appointments'));
    }

}
