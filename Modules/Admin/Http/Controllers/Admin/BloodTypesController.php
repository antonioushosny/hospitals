<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\BloodTypeRequest;
use Modules\Admin\Models\BloodType;
use Modules\Admin\Models\Language;

class BloodTypesController extends Controller
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
            'blood_types.blood_types_type' => [request('type'), 'like'], 
            'blood_types.blood_types_amount' => [request('amount'), '='], 
        ];
        request()->flash();

        $query = BloodType::orderBy('blood_types.blood_types_id');
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $blood_types = $searchQuery->paginate(env('PerPage'));

        return view('admin::admin.blood_types.index', compact('blood_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::admin.blood_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\BloodTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BloodTypeRequest $request)
    {
        BloodType::create($request->all());
        return redirect()->route('admin.blood_types.index')->with('status', __('admin::lang.blood_typeCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $blood_type
     * @return \Illuminate\Http\Response
     */
    public function show(BloodType $blood_type)
    {
        return view('admin::admin.blood_types.show', compact('blood_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\BloodType  $blood_type
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodType $blood_type)
    {
        return view('admin::admin.blood_types.edit', compact('blood_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\BloodType\Http\Requests\BloodTypeRequest  $request
     * @param  \Modules\Admin\Models\BloodType  $blood_type
     * @return \Illuminate\Http\Response
     */
    public function update(BloodTypeRequest $request, BloodType $blood_type)
    {
        $blood_type->update($request->all());
        return redirect()->route('admin.blood_types.index')->with('status', __('admin::lang.blood_typeUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\BloodType  $blood_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodType $blood_type)
    {
        $blood_type->delete();
        return back()->with('status', __('admin::lang.blood_typeDeleted'));
    }
}
