<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\ClientRequest;
use Modules\Admin\Models\Client;
use Modules\Admin\Models\Language;

class ClientsController extends Controller
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
            'clients_name' => [request('name'), 'like'], 
            'clients_phone' => [request('phone'), '='], 
            'email' => [request('email'), '='], 
            'clients_civil_no' => [request('civil_no'), '='], 
            'clients_status' => [request('status'), '='],
            
        ];
        request()->flash();

        $query = Client::sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $clients = $searchQuery->paginate(env('PerPage'));
        return view('admin::admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        Client::create($request->all());
        return redirect()->route('admin.clients.index')->with('status', __('admin::lang.clientCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin::admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin::admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Client\Http\Requests\ClientRequest  $request
     * @param  \Modules\Admin\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('admin.clients.index')->with('status', __('admin::lang.clientUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('status', __('admin::lang.clientDeleted'));
    }
}
