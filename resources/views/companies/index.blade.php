<x-layout>
    <x-breadcrumbs />
    <x-card>
        <div class="card-header">
            <div class="row">
                <div class="col-3 border-end">
                    Companies
                </div>
                <div class="col-3 border-end">
                    Email
                </div>
                <div class="col-3 border-end">
                    Website
                </div>
                <div class="col-3 text-end">
                    #Employees
                </div>
            </div>

        </div>
        <ul class="list-group list-group-flush">
            @foreach($companies as $company)
                <div class="list-group-item">
                    <li class="row">
                        <div class="col-3 border-end">
                            <a href="/companies/{{ $company->id }}">{{ $company->name }}</a>
                        </div>
                        <div class="col-3 border-end">
                            <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                        </div>
                        <div class="col-3 border-end">
                            <a href="{{ $company->website }}">{{ $company->website }}</a>
                        </div>
                        <div class="col-3 text-end">
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
</x-layout>
{{ $companies->links('paginator.bootstrap') }}
