<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
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
        return view('companies.index', [
            'companies' => Company::orderBy('name')->paginate(10)
        ]);
    }

    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company
        ]);
    }
}
