<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Repositories\AvailabilitiesRepository;
use Illuminate\Http\Request;

class AvailabilitiesController extends Controller
{

    public const TOTAL_HOURS_PER_DAY = 8;

    protected $availabilitiesRepository;

    public function __construct(AvailabilitiesRepository $availabilitiesRepository)
    {
        $this->availabilitiesRepository = $availabilitiesRepository;
    }

    public function index()
    {
        $availabilities = $this->availabilitiesRepository->getAllOrderedByDateTimeStartDescending();
        return view('availabilities.overview', compact('availabilities'));
    }

    public function create()
    {
        return view('availabilities.create', [
            'totalHoursPerDay' => static::TOTAL_HOURS_PER_DAY,
        ]);
    }

    public function edit(Availability $availability)
    {
        return view('availabilities.edit', [
            'availability' => $availability,
            'totalHoursPerDay' => static::TOTAL_HOURS_PER_DAY,
        ]);
    }

    public function update(Availability $availability)
    {
        $availability->update(request()->validate([
            'dateTimeStart' => 'required',
            'dateTimeEnd' => 'required',
        ]));

        return redirect(route('availabilities'));
    }

    public function store()
    {
        Availability::create(request()->validate([
            'dateTimeStart' => 'required',
            'dateTimeEnd' => 'required',
        ]));

        return redirect(route('availabilities'));
    }

}
