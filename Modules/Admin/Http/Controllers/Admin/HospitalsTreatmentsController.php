<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\HospitalsTreatmentRequest;
use Modules\Admin\Models\HospitalsTreatment;
use Modules\Admin\Models\Country;
use Modules\Admin\Models\Disease;
use Modules\Admin\Models\Doctor;
use Modules\Admin\Models\Hospital;
use Modules\Admin\Models\Language;

class HospitalsTreatmentsController extends Controller
{
        use StorageHandle;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchArray = [
            'doctors_id' => [request('doctors_id'), '='], 
            'diseases_id' => [request('diseases_id'), '='], 
            'hospitals_id' => [request('hospitals_id'), '='], 
            'hospitals_treatments_status' => [request('status'), '='],
            
        ];


        request()->flash();

        $query = HospitalsTreatment::sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $hospitals_treatments = $searchQuery->paginate(env('PerPage'));
        $diseases = Disease::get()->pluck('diseases_title','diseases_id') ;
        $doctors = Doctor::get()->pluck('doctors_name','doctors_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        return view('admin::admin.hospitals_treatments.index', compact('hospitals_treatments','diseases','doctors','hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diseases = Disease::get()->pluck('diseases_title','diseases_id') ;
        $doctors = Doctor::get()->pluck('doctors_name','doctors_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        return view('admin::admin.hospitals_treatments.create',compact('diseases','doctors','hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\HospitalsTreatmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalsTreatmentRequest $request)
    {
        HospitalsTreatment::create($request->all());
        return redirect()->route('admin.hospitals_treatments.index')->with('status', __('admin::lang.hospitals_treatmentCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $hospitals_treatment
     * @return \Illuminate\Http\Response
     */
    public function show(HospitalsTreatment $hospitals_treatment)
    {
        return view('admin::admin.hospitals_treatments.show', compact('hospitals_treatment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\HospitalsTreatment  $hospitals_treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(HospitalsTreatment $hospitals_treatment)
    {
        $diseases = Disease::get()->pluck('diseases_title','diseases_id') ;
        $doctors = Doctor::get()->pluck('doctors_name','doctors_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        return view('admin::admin.hospitals_treatments.edit', compact('hospitals_treatment','diseases','doctors','hospitals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\HospitalsTreatment\Http\Requests\HospitalsTreatmentRequest  $request
     * @param  \Modules\Admin\Models\HospitalsTreatment  $hospitals_treatment
     * @return \Illuminate\Http\Response
     */
    public function update(HospitalsTreatmentRequest $request, HospitalsTreatment $hospitals_treatment)
    {
        $hospitals_treatment->update($request->all());
        return redirect()->route('admin.hospitals_treatments.index')->with('status', __('admin::lang.hospitals_treatmentUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\HospitalsTreatment  $hospitals_treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(HospitalsTreatment $hospitals_treatment)
    {
        $hospitals_treatment->delete();
        return back()->with('status', __('admin::lang.hospitals_treatmentDeleted'));
    }
}
