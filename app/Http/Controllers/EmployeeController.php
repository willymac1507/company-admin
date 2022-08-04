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
            'employees' => Employee::orderBy('lastName')->paginate(10)
        ]);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => $employee
        ]);

    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('employees.create');
    }

    public function store()
    {
        $attributes = $this->validateEmployee();

        Employee::create($attributes);

        return redirect('/employees')->with('success', 'The employee has been created');
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
        return redirect('/employees')->with('success', 'Employee updated');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee deleted');
    }

    protected function validateEmployee(?Employee $employee = null): array
    {
        $employee ??= new Employee();
        return request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => ['required', Rule::unique('employees', 'email')->ignore($employee)],
            'phoneNumber' => 'required',
            'company_id' => 'required'
        ]);
    }
}
