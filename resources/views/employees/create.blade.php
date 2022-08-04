<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header">Create New Employee</div>
    <div class="card-body">
        <form action="{{ route('createEmployee') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.input name="firstName" label="First Name"/>
            <x-form.input name="lastName" label="Last Name"/>
            <x-form.input name="email" type="email"/>
            <x-form.input name="phoneNumber" label="Telephone"/>
            <x-form.select name="company_id" label="Employer">
                <option selected>Employer</option>
                @foreach(\App\Models\Company::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE) as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </x-form.select>
            <div class="mt-4">
                <x-form.button>Create</x-form.button>
            </div>
        </form>
    </div>
</x-card>
<x-footer/>
