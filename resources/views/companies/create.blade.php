<x-layout>
    <x-breadcrumbs/>
    <x-card>
        <div class="card-header">Create New Company</div>
        <div class="card-body">
            <form action="{{ route('createCompany') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.input name="name"/>
                <x-form.input name="logo" type="file"/>
                <x-form.input name="email" type="email"/>
                <x-form.input name="website" type="url"/>
                <div class="mt-4">
                    <x-form.button>Create</x-form.button>
                </div>
            </form>

        </div>
    </x-card>

</x-layout>
