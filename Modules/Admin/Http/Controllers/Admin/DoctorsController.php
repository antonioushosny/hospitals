<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\DoctorRequest;
use Modules\Admin\Models\Doctor;
use Modules\Admin\Models\Country;
use Modules\Admin\Models\Specialty;
use Modules\Admin\Models\Department;
use Modules\Admin\Models\Hospital;
use Modules\Admin\Models\Language;

class DoctorsController extends Controller
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
            'doctors_name' => [request('name'), 'like'], 
            'doctors_phone' => [request('phone'), '='], 
            'doctors_email' => [request('email'), '='], 
            'doctors_civil_no' => [request('civil_no'), '='], 
            'countries_id' => [request('countries_id'), '='], 
            'specialties_id' => [request('specialties_id'), '='], 
            'departments_id' => [request('departments_id'), '='], 
            'hospitals_id' => [request('hospitals_id'), '='], 
            'doctors_status' => [request('status'), '='],
            
        ];
        request()->flash();

        $query = Doctor::sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $doctors = $searchQuery->paginate(env('PerPage'));
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        return view('admin::admin.doctors.index', compact('doctors','countries','specialties','departments','hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        return view('admin::admin.doctors.create',compact('countries','specialties','departments','hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\DoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        Doctor::create($request->all());
        return redirect()->route('admin.doctors.index')->with('status', __('admin::lang.doctorCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('admin::admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        return view('admin::admin.doctors.edit', compact('doctor','countries','specialties','departments','hospitals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Doctor\Http\Requests\DoctorRequest  $request
     * @param  \Modules\Admin\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        return redirect()->route('admin.doctors.index')->with('status', __('admin::lang.doctorUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return back()->with('status', __('admin::lang.doctorDeleted'));
    }
}
