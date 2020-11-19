<?php

namespace Modules\Employees\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Employees\Entities\Employee;
use App\Models\Plugin;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $plugins = Plugin::all();
        $employees = Employee::all();
        return view('employees::index', ['employees' => $employees, 'plugins' => $plugins]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $plugins = Plugin::all();
        return view('employees::create', ['plugins' => $plugins]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('employees::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $plugins = Plugin::all();
        $employee = Employee::findOrFail($id);
        return view('employees::edit', ['plugins' => $plugins, 'employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employeeTemp = $request->all();

        $employee->name = $employeeTemp['name'];
        $employee->lastname = $employeeTemp['lastname'];
        $employee->email = $employeeTemp['email'];
        $employee->phone = $employeeTemp['phone'];
        $employee->birthday = $employeeTemp['birthday'];
        $employee->address = $employeeTemp['address'];

        $employee->save();

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
