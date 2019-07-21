<?php

namespace App\Http\Controllers\Admin;

use App\Availability;
use App\Http\Controllers\Controller;
use App\Repositories\AvailabilitiesRepository;
use Carbon\Carbon;

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
        return view('admin.availabilities.overview', compact('availabilities'));
    }

    public function create()
    {
        return view('admin.availabilities.create');
    }

    public function edit(Availability $availability)
    {
        return view('admin.availabilities.edit', compact('availability'));
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
        $validated = request()->validate([
            'dateTime' => 'required',
            'hours' => 'required|numeric',
        ]);

        for ($i = 0; $i < $validated['hours']; $i++) {
            Availability::create([
                'dateTime' => (new Carbon($validated['dateTime']->format('Y-m-d H:i:s')))->addHours($i),
            ]);
        }

        return redirect(route('availabilities'));
    }

}
