<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\OrderRequest;
use Modules\Admin\Models\Client;
use Modules\Admin\Models\Order;
use Modules\Admin\Models\Doctor;
use Modules\Admin\Models\Country;
use Modules\Admin\Models\Specialty;
use Modules\Admin\Models\Department;
use Modules\Admin\Models\Hospital;
use Modules\Admin\Models\Disease;
use Modules\Admin\Models\Language;

class OrdersController extends Controller
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
            'clients_id' => [request('clients_id'), '='], 
            'countries_id' => [request('countries_id'), '='], 
            'orders_doctor_following' => [request('doctor_following'), '='], 
            'doctors_id' => [request('doctors_id'), '='], 
            'diseases_id' => [request('diseases_id'), '='], 
            'hospitals_id' => [request('hospitals_id'), '='], 
            'orders_status' => [request('status'), '='],
        ];
        request()->flash();

        $query = Order::sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $orders = $searchQuery->paginate(env('PerPage'));
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        $clients = Client::get()->pluck('clients_name','clients_id') ;
        $doctors = Doctor::get()->pluck('doctors_name','doctors_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        $diseases = Disease::get()->pluck('diseases_title','diseases_id') ;
        return view('admin::admin.orders.index', compact('orders','countries','clients','doctors','hospitals','diseases'));
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
        $diseases = Disease::get()->pluck('diseases_title','diseases_id') ;
        $doctors = Doctor::get()->pluck('doctors_name','doctors_id') ;
        $clients = Client::get()->pluck('clients_name','clients_id') ;
        return view('admin::admin.orders.create',compact('countries','specialties','departments','hospitals','doctors','diseases','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        Order::create($request->all());
        return redirect()->route('admin.orders.index')->with('status', __('admin::lang.orderCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin::admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $countries = Country::get()->pluck('countries_title','countries_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $hospitals = Hospital::get()->pluck('hospitals_title','hospitals_id') ;
        $diseases = Disease::get()->pluck('diseases_title','diseases_id') ;
        $doctors = Doctor::get()->pluck('doctors_name','doctors_id') ;
        $clients = Client::get()->pluck('clients_name','clients_id') ;
        return view('admin::admin.orders.edit', compact('order','countries','specialties','departments','hospitals','doctors','diseases','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Order\Http\Requests\OrderRequest  $request
     * @param  \Modules\Admin\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('admin.orders.index')->with('status', __('admin::lang.orderUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('status', __('admin::lang.orderDeleted'));
    }
}
