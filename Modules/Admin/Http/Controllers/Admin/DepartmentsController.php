<?php

namespace Modules\Admin\Http\Controllers\Admin;
use App\Models\StorageHandle;

use App\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\DepartmentRequest;
use Modules\Admin\Models\Department;
use Modules\Admin\Models\Language;

class DepartmentsController extends Controller
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
            'department_translations.departments_title' => [request('name'), 'like'], 
            'departments.departments_status' => [request('status'), '=']
        ];
        request()->flash();

        $query = Department::join('department_translations', 'departments.departments_id', 'department_translations.departments_id')
        ->groupBy('departments.departments_id')->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $departments = $searchQuery->paginate(env('PerPage'));

        return view('admin::admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Modules\Admin\Http\Requests\DepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        Department::create($request->all());
        return redirect()->route('admin.departments.index')->with('status', __('admin::lang.departmentCreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Admin\Models\Admin  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('admin::admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Admin\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin::admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Modules\Department\Http\Requests\DepartmentRequest  $request
     * @param  \Modules\Admin\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->all());
        return redirect()->route('admin.departments.index')->with('status', __('admin::lang.departmentUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Admin\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('status', __('admin::lang.departmentDeleted'));
    }
}
