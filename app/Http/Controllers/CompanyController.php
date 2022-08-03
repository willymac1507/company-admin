<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::orderBy('name')->paginate(10)
        ]);
    }

    /**
     * @param Company $company
     * @return Application|Factory|View
     */
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('companies.create');
    }

    public function store()
    {
        $attributes = $this->validateCompany();

        $attributes['logo'] = request()->file('logo')->store('logos');

        Company::create($attributes);

        return redirect('/companies')->with('success', 'Your post has been created!');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    public function update(Company $company)
    {
        $attributes = $this->validateCompany($company);

        if (isset($attributes['logo'])) {
            $attributes['logo'] = request()->file('logo')->store('logos');
        }

        $company->update($attributes);
        return redirect('/companies')->with('success', 'Company updated!');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/companies')->with('success', 'Company deleted!');
    }

    protected function validateCompany(?Company $company = null): array
    {
        $company ??= new Company();
        return request()->validate([
            'name' => 'required',
            'logo' => $company->exists ? ['image'] : ['required', 'image'],
            'email' => ['required', Rule::unique('companies', 'email')->ignore($company)],
            'website' => 'required',
        ]);
    }
}
