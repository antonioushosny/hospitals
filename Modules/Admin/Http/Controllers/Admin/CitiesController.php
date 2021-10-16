<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\CityRequest;
use Modules\Admin\Models\City;
use Modules\Admin\Models\Language;

class CitiesController extends Controller
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
            'city_translations.cities_title' => [request('name'), 'like'], 
            'cities.cities_status' => [request('status'), '=']
        ];
        request()->flash();

        $query = City::join('city_translations', 'cities.cities_id', 'city_translations.cities_id')
        ->groupBy('cities.cities_id')
        ->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $cities = $searchQuery->paginate(env('PerPage'));

        return view('admin::admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        City::create($request->all());
        return redirect()->route('admin.cities.index')->with('status', __('admin::lang.cityCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('admin::admin.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin::admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\City\Http\Requests\CityRequest  $request
     * @param  \Modules\Admin\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        $city->update($request->all());
        return redirect()->route('admin.cities.index')->with('status', __('admin::lang.cityUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return back()->with('status', __('admin::lang.cityDeleted'));
    }
}
