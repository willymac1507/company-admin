<x-header/>
<x-breadcrumbs/>
<x-filter main-search="/employees" alpha-search="lastName" />
<x-card>
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-md-3 border-end table-head-font">
                Employees
            </div>
            <div class="col-3 d-none d-md-block border-end table-head-font">
                Company
            </div>
            <div class="col-3 d-none d-md-block border-end table-head-font">
                Email
            </div>
            <div class="col-3 d-none d-md-block text-end table-head-font">
                Telephone
            </div>
        </div>

    </div>
    <ul class="list-group list-group-flush">

        @foreach($employees as $employee)
            <div class="list-group-item">
                <li class="row">
                    <div class="col-12 col-md-3 border-end">
                        <a href="/employees/{{ $employee->id }}">{{ $employee->lastName }}, {{ $employee->firstName
                        }}</a>
                    </div>
                    <div class="col-3 d-none d-md-block border-end">
                        <a href="/companies/{{ $employee->company->id }}">{{ $employee->company->name }}</a>
                    </div>
                    <div class="col-3 d-none d-md-block border-end">
                        {{ $employee->email }}
                    </div>
                    <div class="col-3 d-none d-md-block text-end">
                        {{ $employee->phoneNumber }}
                    </div>
                </li>
            </div>

        @endforeach
        <x-create>
            <a href="/employee/create">Add new employee</a>
        </x-create>
    </ul>
</x-card>
{{ $employees->links() }}
<x-footer/>
