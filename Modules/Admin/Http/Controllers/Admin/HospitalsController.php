<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\HospitalRequest;
use Modules\Admin\Models\Hospital;
use Modules\Admin\Models\Country;
use Modules\Admin\Models\City;
use Modules\Admin\Models\Area;
use Modules\Admin\Models\Department;
use Modules\Admin\Models\Specialty;
use Modules\Admin\Models\Language;
use Modules\Admin\Models\HospitalImage;
use Illuminate\Http\Request;

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
        $cities = City::get()->pluck('cities_title','cities_id') ;
        $areas = Area::get()->pluck('areas_title','areas_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;

        return view('admin::admin.hospitals.index', compact('hospitals','countries','cities','departments','specialties','areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        $cities = City::get()->pluck('cities_title','cities_id') ;
        $areas = Area::get()->pluck('areas_title','areas_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;
        return view('admin::admin.hospitals.create',compact('countries','cities','areas','departments','specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\HospitalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalRequest $request)
    {
        $hospital = Hospital::create($request->all());
        $hospital->areas()->sync($request->areas_ids);
        $hospital->departments()->sync($request->departments_ids);
        $hospital->specialties()->sync($request->specialties_ids);

          // Store Hospital Images
          $this->storeHospitalImages($hospital->hospitals_id, $request->hospital_images);

        return redirect()->route('admin.hospitals.index')->with('status', __('admin::lang.hospitalCreated'));
    }
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Modules\Admin\Http\Requests\HospitalReques  $request
     * @return \Illuminate\Http\Response
     */
    public function storeHospitalImages($hospitalID, $images)
    {
        
        foreach ($images as $image) {   
            HospitalImage::create([
                'hospitals_id'             =>  $hospitalID,
                'hospital_images_name'     =>  $image
            ]);
        }
        return true;
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
        $cities = City::get()->pluck('cities_title','cities_id') ;
        $areas = Area::get()->pluck('areas_title','areas_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;
        return view('admin::admin.hospitals.edit', compact('hospital','countries','cities','areas','departments','specialties'));
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

        $newImagesCount = is_array($request->hospital_images) ? count($request->hospital_images) : 0;
        $oldImagesCount = count($hospital->images);
        $imagesCount = $newImagesCount + $oldImagesCount;

        $hospital->update($request->all());
        $hospital->areas()->sync($request->areas_ids);
        $hospital->departments()->sync($request->departments_ids);
        $hospital->specialties()->sync($request->specialties_ids);

        // If New images uploaded, store it
        if ($request->hospital_images) {
            $this->storeHospitalImages($hospital->hospitals_id, $request->hospital_images);
        }

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

        /**
     * Delete Specified image
     */
    public function deleteHospitalImage(Request $request)
    {
        $image = HospitalImage::findOrFail($request->hospital_images_id)->delete();
        
        if ($image) {
            // Success
            return response()->json(['msg'=> 1 ]);
        } else {
            // Errors
            return response()->json(['msg'=> 0 ]);
        }
    }
}
