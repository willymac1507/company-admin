<x-header/>
<x-breadcrumbs/>
<x-filter alpha-search="name" main-search="/companies">

</x-filter>
<x-card>
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-md-3 border-end border-md table-head-font">
                Companies
            </div>
            <div class="col-3 d-none d-md-block border-end table-head-font">
                Email
            </div>
            <div class="col-3 d-none d-md-block border-end table-head-font">
                Website
            </div>
            <div class="col-3 d-none d-md-block text-end table-head-font">
                #Employees
            </div>
        </div>

    </div>
    <ul class="list-group list-group-flush">
        @foreach($companies as $company)
            <div class="list-group-item">
                <li class="row">
                    <div class="col-12 col-md-3 border-end border-md">
                        <a href="/companies/{{ $company->id }}">{{ $company->name }}</a>
                    </div>
                    <div class="col-3 d-none d-md-block border-end">
                        <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                    </div>
                    <div class="col-3 d-none d-md-block border-end">
                        <a href="{{ $company->website }}">{{ $company->website }}</a>
                    </div>
                    <div class="col-3 d-none d-md-block text-end">
                        {{ $company->employees->count() }}
                    </div>
                </li>
            </div>
        @endforeach
        <x-create>
            <a href="/company/create">Add new company</a>
        </x-create>
    </ul>
</x-card>
{{ $companies->links() }}
<x-footer/>

