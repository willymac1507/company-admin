<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header">
        <div class="row">
            <div class="col-3 border-end">
                Employees
            </div>
            <div class="col-3 border-end">
                Company
            </div>
            <div class="col-3 border-end">
                Email
            </div>
            <div class="col-3 text-end">
                Telephone
            </div>
        </div>

    </div>
    <ul class="list-group list-group-flush">

        @foreach($employees as $employee)
            <div class="list-group-item">
                <li class="row">
                    <div class="col-3 border-end">
                        <a href="/employees/{{ $employee->id }}">{{ $employee->firstName }} {{ $employee->lastName
                            }}</a>
                    </div>
                    <div class="col-3 border-end">
                        <a href="/companies/{{ $employee->company->id }}">{{ $employee->company->name }}</a>
                    </div>
                    <div class="col-3 border-end">
                        {{ $employee->email }}
                    </div>
                    <div class="col-3 text-end">
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
{{ $employees->links('paginator.bootstrap') }}
<x-footer/>
