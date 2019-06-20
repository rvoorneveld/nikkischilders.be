<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Customer;
use App\Http\Requests\BookFormRequest;
use App\Treatment;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('layouts.default', [
            'treatments' => Treatment::all(),
            'availabilities' => Availability::all(),
        ]);
    }

    public function store(BookFormRequest $request)
    {
        $customer = Customer::create([
            $key = 'firstName' => $request[$key],
            $key = 'lastName' => $request[$key],
            $key = 'emailAddress' => $request[$key],
            $key = 'phoneNumber' => $request[$key],
        ]);

        $customer->appointments()->create([
            'availability_id' => $request['availability'],
            'treatment_id' => $request['treatment'],
            'dateTimeStart' => ($availability = Availability::find($request['availability']))->getDateTime(),
            'dateTimeEnd' => $availability->getDateTime()->addMinutes(Availability::DURATION_MINUTES),
        ]);

        $availability->delete();
    }

}
