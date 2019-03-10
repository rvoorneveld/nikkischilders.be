<?php

namespace App\Repositories;

use App\Treatment;

class TreatmentsRepository
{

    public function getAllOrderedByTitleAscending()
    {
        return Treatment::orderBy('title')->get();
    }

}
