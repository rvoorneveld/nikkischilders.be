<?php

namespace App\Http\Controllers;

use App\Availability;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{

    public function index(): Collection
    {
        $slots = collect();

        $monday = Carbon::now()->startOfWeek();
        $sunday = Carbon::now()->endOfWeek();

        $availabilities = [];
        foreach (Availability::with('appointment')->where('start', '>=', $monday)->where('end', '<=', $sunday)->get() as $availability) {
            $availabilities[$availability->start->day][] = $availability;
        }

        for ($i = Carbon::now()->startOfWeek()->timestamp; $i <= Carbon::now()->endOfWeek()->timestamp; $i += Availability::ONE_DAY_IN_SECONDS) {
            $slots->push([
                'day' => $day = ($date = Carbon::createFromTimestamp($i))->day,
                'month' => $date->month,
                'year' => $date->year,
                'availabilities' => $availabilities[$day] ?? [],
            ]);
        }

        return $slots;
    }

}
