<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Livewire\WithPagination;

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
}
