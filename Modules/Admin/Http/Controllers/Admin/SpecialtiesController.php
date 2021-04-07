<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\SpecialtyRequest;
use Modules\Admin\Models\Specialty;
use Modules\Admin\Models\Language;

class SpecialtiesController extends Controller
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
            'specialty_translations.specialties_title' => [request('name'), 'like'], 
            'specialties.specialties_status' => [request('status'), '=']
        ];
        request()->flash();

        $query = Specialty::join('specialty_translations', 'specialties.specialties_id', 'specialty_translations.specialties_id')
        ->groupBy('specialties.specialties_id')->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $specialties = $searchQuery->paginate(env('PerPage'));

        return view('admin::admin.specialties.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::admin.specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\SpecialtyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyRequest $request)
    {
        Specialty::create($request->all());
        return redirect()->route('admin.specialties.index')->with('status', __('admin::lang.specialtyCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        return view('admin::admin.specialties.show', compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        return view('admin::admin.specialties.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Specialty\Http\Requests\SpecialtyRequest  $request
     * @param  \Modules\Admin\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtyRequest $request, Specialty $specialty)
    {
        $specialty->update($request->all());
        return redirect()->route('admin.specialties.index')->with('status', __('admin::lang.specialtyUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return back()->with('status', __('admin::lang.specialtyDeleted'));
    }
}
