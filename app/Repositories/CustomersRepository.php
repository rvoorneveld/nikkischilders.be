<?php

namespace App\Repositories;

use App\Customer;

class CustomersRepository
{

    public function getAllOrderedByLastNameAscending()
    {
        return Customer::orderBy('lastName')->get();
    }

}
