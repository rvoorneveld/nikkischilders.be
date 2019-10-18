<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Http\Requests\BookFormRequest;
use App\Mail\ReservationComplete;
use App\Repositories\CustomersRepository;
use App\Treatment;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
        return view('layouts.default');
    }

//    public function store(BookFormRequest $request, CustomersRepository $customersRepository)
//    {
//        $customer = $customersRepository->createOrUpdate($request);
//
//        $appointment = $customer->appointments()->create([
//            'availability_id' => $request['availability'],
//            'treatment_id' => $request['treatment'],
//            'dateTimeStart' => ($availability = Availability::find($request['availability']))->getDateTime(),
//            'dateTimeEnd' => $availability->getDateTime()->addMinutes(Availability::DURATION_MINUTES),
//        ]);
//
//        $availability->delete();
//
//        Mail::to($customer->getEmailAddress())->send(
//            new ReservationComplete($appointment)
//        );
//
//        $request->session()->flash('success.reservation');
//        return redirect('/');
//    }

}
