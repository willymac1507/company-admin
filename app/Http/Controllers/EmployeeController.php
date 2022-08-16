<?php

namespace App\Http\Controllers;

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
            'employees' => Employee::orderBy('lastName')->filter(request(['search', 'lastName']))->paginate
            (10)->withQueryString()
        ]);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => $employee
        ]);

    }

    public function store()
    {
        $attributes = $this->validateEmployee();

        Employee::create($attributes);

        return redirect('/employees')->with('success', 'The employee has been added.');
    }

    protected function validateEmployee(?Employee $employee = null): array
    {
        $employee = null ? new Employee() : $employee;
        return request()->validate([
            'firstName' => ['required', 'string', 'min:2'],
            'lastName' => ['required', 'string', 'min:2'],
            'email' => [
                'required',
                'regex:/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i',
                Rule::unique('employees', 'email')->ignore($employee)
            ],
            'phoneNumber' => [
                'required',
                'regex:/^\s*(?:\+?(\d{1,3}))?[ ]?([(]?(\d{4,5})[)]?)?[ ]?((\d{6,7}))\s*$/'
            ],
            'company_id' => 'required'
        ]);
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

    public function update(Employee $employee)
    {
        $attributes = $this->validateEmployee($employee);

        $employee->update($attributes);
        return redirect('/employees')->with('success', 'The employee has been updated.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees')->with('success', 'The employee has been removed.');
    }
}
