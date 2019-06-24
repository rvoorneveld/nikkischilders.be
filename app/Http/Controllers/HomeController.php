<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Http\Requests\BookFormRequest;
use App\Repositories\CustomersRepository;
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

    public function store(BookFormRequest $request, CustomersRepository $customersRepository)
    {
        $customer = $customersRepository->createOrUpdate($request);

        $customer->appointments()->create([
            'availability_id' => $request['availability'],
            'treatment_id' => $request['treatment'],
            'dateTimeStart' => ($availability = Availability::find($request['availability']))->getDateTime(),
            'dateTimeEnd' => $availability->getDateTime()->addMinutes(Availability::DURATION_MINUTES),
        ]);

        $availability->delete();

        $request->session()->flash('success.reservation');
        return redirect('/');
    }

}
