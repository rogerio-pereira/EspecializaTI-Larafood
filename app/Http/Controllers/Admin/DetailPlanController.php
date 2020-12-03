<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\DetailPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DetailPlanStoreUpdate;

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

    public function create($urlPlan)
    {
        $plan = $this->planRepository->where('url', $urlPlan)->first();
        
        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(DetailPlanStoreUpdate $request, $urlPlan)
    {
        $plan = $this->planRepository->where('url', $urlPlan)->first();
        
        if(!$plan)
            return redirect()->back();

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;
        // $this->repository->create($data);

        $plan->details()->create($request->all());

        return redirect()->route('admin.plan.details.index', $plan->url);
    }  

    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->planRepository->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        
        if(!$plan || !$detail)
            return redirect()->back();

        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    public function update(DetailPlanStoreUpdate $request, $urlPlan, $idDetail)
    {
        $plan = $this->planRepository->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        
        if(!$plan || !$detail)
            return redirect()->back();

        $detail->update($request->all());

        return redirect()->route('admin.plan.details.index', $plan->url);
    }

    public function show($urlPlan, $idDetail)
    {
        $plan = $this->planRepository->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        
        if(!$plan || !$detail)
            return redirect()->back();

        return view('admin.pages.plans.details.show', compact('plan', 'detail'));
    }

    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->planRepository->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);
        
        if(!$plan || !$detail)
            return redirect()->back();

        $detail->delete();

        return redirect()
                    ->route('admin.plan.details.index', $plan->url)
                    ->with('message', 'Registro deletado com sucesso');
    }
}
