<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Treatment;
use App\Repositories\TreatmentsRepository;

class TreatmentsController extends Controller
{

    protected $treatmentsRepository;

    public function __construct(TreatmentsRepository $treatmentsRepository)
    {
        $this->treatmentsRepository = $treatmentsRepository;
    }

    public function index()
    {
        $treatments = $this->treatmentsRepository->getAllOrderedByTitleAscending();
        return view('admin.treatments.overview', compact('treatments'));
    }

    public function create()
    {
        return view('admin.treatments.create');
    }

    public function edit(Treatment $treatment)
    {
        return view('admin.treatments.edit', compact('treatment'));
    }

    public function update(Treatment $treatment)
    {
        $treatment->update(request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]));

        return redirect(route('treatments'));
    }

    public function store()
    {
        Treatment::create(request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]));

        return redirect(route('treatments'));
    }

}
