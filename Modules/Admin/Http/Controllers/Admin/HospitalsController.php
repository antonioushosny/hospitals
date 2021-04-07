<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\HospitalRequest;
use Modules\Admin\Models\Hospital;
use Modules\Admin\Models\Country;
use Modules\Admin\Models\Language;

class HospitalsController extends Controller
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
            'hospital_translations.hospitals_title' => [request('name'), 'like'], 
            'hospital_translations.hospitals_address' => [request('address'), 'like'], 
            'hospitals.hospitals_phone' => [request('phone'), '='], 
            'hospitals.countries_id' => [request('countries_id'), '='], 
            'hospitals.hospitals_status' => [request('status'), '='],
            
        ];
        request()->flash();

        $query = Hospital::join('hospital_translations', 'hospitals.hospitals_id', 'hospital_translations.hospitals_id')
        ->groupBy('hospitals.hospitals_id')->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $hospitals = $searchQuery->paginate(env('PerPage'));
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        return view('admin::admin.hospitals.index', compact('hospitals','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        return view('admin::admin.hospitals.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\HospitalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalRequest $request)
    {
        Hospital::create($request->all());
        return redirect()->route('admin.hospitals.index')->with('status', __('admin::lang.hospitalCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        return view('admin::admin.hospitals.show', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        return view('admin::admin.hospitals.edit', compact('hospital','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Hospital\Http\Requests\HospitalRequest  $request
     * @param  \Modules\Admin\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(HospitalRequest $request, Hospital $hospital)
    {
        $hospital->update($request->all());
        return redirect()->route('admin.hospitals.index')->with('status', __('admin::lang.hospitalUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return back()->with('status', __('admin::lang.hospitalDeleted'));
    }
}
