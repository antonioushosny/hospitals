<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\AreaRequest;
use Modules\Admin\Models\Area;
use Modules\Admin\Models\City;
use Modules\Admin\Models\Language;

class AreasController extends Controller
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
            'area_translations.areas_title' => [request('name'), 'like'], 
            'areas.areas_status' => [request('status'), '=']
        ];
        request()->flash();

        $query = Area::join('area_translations', 'areas.areas_id', 'area_translations.areas_id')
        ->groupBy('areas.areas_id')
        ->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $areas = $searchQuery->paginate(env('PerPage'));
        $cities = City::get()->pluck('cities_title','cities_id') ;
        // dd($areas[0]->cities_id) ;
        return view('admin::admin.areas.index', compact('areas','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get()->pluck('cities_title','cities_id') ;
        return view('admin::admin.areas.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\AreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        Area::create($request->all());
        return redirect()->route('admin.areas.index')->with('status', __('admin::lang.areaCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return view('admin::admin.areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $cities = City::get()->pluck('cities_title','cities_id') ;
        return view('admin::admin.areas.edit', compact('area','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Area\Http\Requests\AreaRequest  $request
     * @param  \Modules\Admin\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Area $area)
    {
        $area->update($request->all());
        return redirect()->route('admin.areas.index')->with('status', __('admin::lang.areaUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return back()->with('status', __('admin::lang.areaDeleted'));
    }
}
