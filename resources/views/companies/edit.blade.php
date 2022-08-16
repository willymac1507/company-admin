<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header">Edit Company</div>
    <div class="card-body">
        <form action="/companies/{{ $company->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="required__text">* required</div>
            <x-form.input name="name" label="name" valid="required" :value="old('name', $company->name)"/>
            <x-form.input name="logo" type="file" :value="$company->logo" :required="false"/>
            <x-form.input name="email" label="email" valid="required" type="email" :value="old('email',
            $company->email)"/>
            <x-form.input name="website" label="website" valid="required" type="url" :value="old('website',
            $company->website)"/>
            <div class="mt-4">
                <x-form.submitButton>Update</x-form.submitButton>
            </div>
        </form>

    </div>
</x-card>
<x-footer/>
