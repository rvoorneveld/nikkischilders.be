<?php

namespace App\Repositories;

use App\Customer;
use Illuminate\Http\Request;

class CustomersRepository
{

    public function getAllOrderedByLastNameAscending()
    {
        return Customer::orderBy('lastName')->get();
    }

    public function createOrUpdate(Request $request): Customer
    {
        if (null === $customer = Customer::where('emailAddress', $request['emailAddress'])->first()) {
            $customer = new Customer();
        }

        $customer->setAttribute($key = 'firstName', $request[$key]);
        $customer->setAttribute($key = 'lastName', $request[$key]);
        $customer->setAttribute($key = 'emailAddress', $request[$key]);
        $customer->setAttribute($key = 'phoneNumber', $request[$key]);
        $customer->save();

        return $customer;
    }

}
