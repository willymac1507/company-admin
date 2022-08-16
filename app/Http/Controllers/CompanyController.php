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
            'companies' => Company::orderBy('name')
                ->filter(request(['search', 'name']))
                ->paginate(10)
                ->withQueryString()
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
        return redirect('/companies/' . $company->id)->with('success', 'The company has been updated.');
    }

    protected function validateCompany(Company $company = null): array
    {
        $company  = null ? new Company() : $company;
        return request()->validate([
            'name' => ['required', 'string', 'min:2', 'unique:companies,name,'.$company->id],
            'logo' => ['image', 'dimensions:max_width=100,max_height=100'],
            'email' => ['required', 'regex:/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i', 'unique:companies,email,'
                .$company->id],
            'website' => ['required', 'unique:companies,name,'.$company->id],
        ]);
    }

    public function store()
    {
        $attributes = $this->validateCompany();

        $attributes['logo'] = request()->file('logo')->store('logos');

        Company::create($attributes);

        return redirect('/companies')->with('success', 'The company has been added.');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('companies.create');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/companies')->with('success', 'The company has been removed.');
    }
}
