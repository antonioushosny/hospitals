<?php

namespace App\Http\Controllers;
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

        $query = HospitalsTreatment::active()->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $hospitals_treatments = $searchQuery->paginate(env('PerPage'));
        $diseases = Disease::get()->pluck('diseases_title','diseases_id') ;
        $doctors = Doctor::get()->pluck('doctors_name','doctors_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        $mainPageTitle = 'hospitals_treatments' ;
        return view('front.hospitals_treatments.index', compact('hospitals_treatments','diseases','doctors','hospitals','mainPageTitle'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $hospitals_treatment
     * @return \Illuminate\Http\Response
     */
    public function show(HospitalsTreatment $hospitals_treatment)
    {
        $mainPageTitle = 'hospitals_treatments' ;
        return view('front.hospitals_treatments.show', compact('hospitals_treatment','mainPageTitle'));
    }

    
}
