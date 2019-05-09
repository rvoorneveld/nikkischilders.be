<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Repositories\AvailabilitiesRepository;
use Illuminate\Http\Request;

class AvailabilitiesController extends Controller
{

    protected $availabilitiesRepository;

    public function __construct(AvailabilitiesRepository $availabilitiesRepository)
    {
        $this->availabilitiesRepository = $availabilitiesRepository;
    }

    public function index()
    {
        $availabilities = $this->availabilitiesRepository->getAllOrderedByDateTimeDescending();
        return view('availabilities.overview', compact('availabilities'));
    }

    public function create()
    {
        return view('availabilities.create');
    }

    public function edit(Availability $availability)
    {
        return view('availabilities.edit', compact('availability'));
    }

    public function update(Availability $availability)
    {
        $availability->update(request()->validate([
            'dateTime' => 'required',
        ]));

        return redirect(route('availabilities'));
    }

    public function store()
    {
        Availability::create(request()->validate([
            'dateTime' => 'required',
        ]));

        return redirect(route('availabilities'));
    }

}
