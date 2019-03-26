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
        $appointments = $this->appointmentsRepository->getAllOrderedByDateTimeStartAscending();
        return view('appointments.overview', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function edit(Appointment $treatment)
    {
        return view('appointments.edit', compact('treatment'));
    }

    public function update(Appointment $treatment)
    {
        $treatment->update(request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]));

        return redirect(route('appointments'));
    }

    public function store()
    {
        Appointment::create(request()->validate([
            'customerId' => 'required|numeric',
            'treatmentId' => 'required|numeric',
            'dateTimeStart' => 'required',
            'dateTimeEnd' => 'required',
        ]));

        return redirect(route('appointments'));
    }

}
