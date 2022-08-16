<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header">Create New Company</div>
    <div class="card-body">
        <form action="{{ route('createCompany') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="required__text">* required</div>
            <x-form.input name="name" label="name" valid="required"/>
            <x-form.input name="logo" type="file" required="false"/>
            <x-form.input name="email" label="email" valid="required" type="email"/>
            <x-form.input name="website" label="website" valid="required" type="url"/>
            <div class="mt-4">
                <x-form.cancelButton location="companies">Cancel</x-form.cancelButton>
                <x-form.submitButton>Create</x-form.submitButton>
            </div>
        </form>

    </div>
</x-card>

<x-footer/>
