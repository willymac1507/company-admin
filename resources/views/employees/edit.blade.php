<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header">Edit Employee</div>
    <div class="card-body">
        <form action="/employees/{{ $employee->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="firstName" label="First Name" :value="old('firstName', $employee->firstName)"/>
            <x-form.input name="lastName" label="Last Name" :value="old('lastName', $employee->lastName)"/>
            <x-form.input name="email" type="email" :value="old('email', $employee->email)"/>
            <x-form.input name="phoneNumber" label="Telephone" :value="old('phoneNumber', $employee->phoneNumber)"/>
            <x-form.select name="company_id" label="Employer">
                @foreach(\App\Models\Company::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE) as $company)
                    <option
                        value="{{ $company->id }}"
                        {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}
                    >{{ $company->name }}</option>
                @endforeach
            </x-form.select>
            <div class="mt-4">
                <x-form.button>Update</x-form.button>
            </div>
        </form>
    </div>
</x-card>
<x-footer/>
