<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header">Edit Company</div>
    <div class="card-body">
        <form action="/companies/{{ $company->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name', $company->name)"/>
            <x-form.input name="logo" type="file" :value="$company->logo" :required="false"/>
            <x-form.input name="email" type="email" :value="old('email', $company->email)"/>
            <x-form.input name="website" type="url" :value="old('website', $company->website)"/>
            <div class="mt-4">
                <x-form.button>Update</x-form.button>
            </div>
        </form>

    </div>
</x-card>
<x-footer/>
