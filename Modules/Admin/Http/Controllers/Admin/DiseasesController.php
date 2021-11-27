<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\DiseaseRequest;
use Modules\Admin\Models\Disease;
use Modules\Admin\Models\Specialty;
use Modules\Admin\Models\Language;

class DiseasesController extends Controller
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
            'disease_translations.diseases_title' => [request('name'), 'like'], 
            'diseases.diseases_status' => [request('status'), '='],
            'diseases.specialties_id' => [request('specialty'), '='],
            
        ];
        request()->flash();

        $query = Disease::join('disease_translations', 'diseases.diseases_id', 'disease_translations.diseases_id')
        ->groupBy('diseases.diseases_id')->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $diseases = $searchQuery->paginate(env('PerPage'));
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;

        return view('admin::admin.diseases.index', compact('diseases','specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;
        return view('admin::admin.diseases.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\DiseaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiseaseRequest $request)
    {
        Disease::create($request->all());
        return redirect()->route('admin.diseases.index')->with('status', __('admin::lang.diseaseCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        return view('admin::admin.diseases.show', compact('disease'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;
        return view('admin::admin.diseases.edit', compact('disease','specialties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Disease\Http\Requests\DiseaseRequest  $request
     * @param  \Modules\Admin\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(DiseaseRequest $request, Disease $disease)
    {
        $disease->update($request->all());
        return redirect()->route('admin.diseases.index')->with('status', __('admin::lang.diseaseUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        $disease->delete();
        return back()->with('status', __('admin::lang.diseaseDeleted'));
    }
}
