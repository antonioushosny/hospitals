<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\CountryRequest;
use Modules\Admin\Models\Country;
use Modules\Admin\Models\Language;

class CountriesController extends Controller
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
            'country_translations.countries_title' => [request('name'), 'like'], 
            'countries.countries_status' => [request('status'), '=']
        ];
        request()->flash();

        $query = Country::join('country_translations', 'countries.countries_id', 'country_translations.countries_id')
        ->groupBy('countries.countries_id')
        ->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $countries = $searchQuery->paginate(env('PerPage'));

        return view('admin::admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\CountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        Country::create($request->all());
        return redirect()->route('admin.countries.index')->with('status', __('admin::lang.countryCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('admin::admin.countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin::admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Country\Http\Requests\CountryRequest  $request
     * @param  \Modules\Admin\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->all());
        return redirect()->route('admin.countries.index')->with('status', __('admin::lang.countryUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return back()->with('status', __('admin::lang.countryDeleted'));
    }
}
