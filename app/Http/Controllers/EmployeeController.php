<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Livewire\WithPagination;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    use WithPagination;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::orderBy('last_name')->orderBy('first_name') ->filter(request(['search', 'lastName']))->paginate
            (10)->withQueryString()
        ]);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => $employee
        ]);

    }

    public function store(StoreEmployeeRequest $request)
    {
        $attributes = $request->validated();

        Employee::create($attributes);

        return redirect('/employees')->with('success', 'The employee has been added.');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('employees.create');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }

    public function update(Employee $employee, StoreEmployeeRequest $request)
    {
        $attributes = $request->validated();

        $employee->update($attributes);
        return redirect('/employees')->with('success', 'The employee has been updated.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees')->with('success', 'The employee has been removed.');
    }
}
