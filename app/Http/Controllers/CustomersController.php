<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Repositories\CustomersRepository;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    protected $customersRepository;

    public function __construct(CustomersRepository $customersRepository)
    {
        $this->customersRepository = $customersRepository;
    }

    public function index()
    {
        $customers = $this->customersRepository->getAllOrderedByLastNameAscending();
        return view('customers.overview', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Customer $customer)
    {
        $customer->update(request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'emailAddress' => 'required',
        ]));

        return redirect(route('customers'));
    }

    public function store()
    {
        Customer::create(request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'emailAddress' => 'required',
        ]));

        return redirect(route('customers'));
    }

}
