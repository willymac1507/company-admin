<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header">Create New Employee</div>
    <div class="card-body">
        <form action="{{ route('createEmployee') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="required__text">* required</div>
            <x-form.input name="first_name" label="First Name" valid="required"/>
            <x-form.input name="last_name" label="Last Name" valid="required"/>
            <x-form.input name="email" label="Email" valid="required" type="email"/>
            <x-form.input name="phone_number" label="Telephone" valid="required"/>
            <x-form.select name="company_id" label="Employer" valid="required">
                <option value="" selected>Employer</option>
                @foreach(\App\Models\Company::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE) as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </x-form.select>
            <div class="mt-4">
                <x-form.cancelButton location="employees">Cancel</x-form.cancelButton>
                <x-form.submitButton>Create</x-form.submitButton>
            </div>
        </form>
    </div>
</x-card>
<x-footer/>
