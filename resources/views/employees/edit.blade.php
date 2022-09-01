<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header">Edit Employee</div>
    <div class="card-body">
        <form action="/employees/{{ $employee->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="required__text">* required</div>
            <x-form.input name="first_name" label="First Name" valid="required" :value="old('first_name',
            $employee->first_name)"/>
            <x-form.input name="last_name" label="Last Name" valid="required" :value="old('last_name',
            $employee->last_name)"/>
            <x-form.input name="email" label="email" valid="required" type="email" :value="old('email', $employee->email)"/>
            <x-form.input name="phone_number" label="Telephone" valid="required" :value="old('phone_number',
            $employee->phone_number)"/>
            <x-form.select name="company_id" label="Employer" valid="required">
                @foreach(\App\Models\Company::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE) as $company)
                    <option
                        value="{{ $company->id }}"
                        {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}
                    >{{ $company->name }}</option>
                @endforeach
            </x-form.select>
            <div class="mt-4">
                <x-form.submitButton>Update</x-form.submitButton>
            </div>
        </form>
    </div>
</x-card>
<x-footer/>
