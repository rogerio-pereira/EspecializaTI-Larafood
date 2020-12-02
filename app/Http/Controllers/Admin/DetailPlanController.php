<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\DetailPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailPlanController extends Controller
{
    private $repository;
    private $planRepository;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->planRepository = $plan;
    }

    public function index($urlPlan)
    {
        $plan = $this->planRepository->where('url', $urlPlan)->first();
        
        if(!$plan)
            return redirect()->back();

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }
}
