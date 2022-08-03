<x-layout>
    <x-card>
        <div class="card-header fs-5">
            <div class="row">
                <div class="col-10">Company Details</div>
                <div class="col text-end"><a href="#">Edit</a></div>
                <div class="col text-end"><a href="#" class="link-danger">Delete</a></div>
            </div>

        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $company->name }}</h3>
            <hr>
            <div class="card-text">Email: <a href="mailto:{{ $company->email }}">{{ $company->email }}</a></div>
            <div class="card-text">Website: <a href="{{ $company->website }}">{{ $company->website }}</a></div>
            <hr>
            <x-card :col="12">
                <div class="card-header fs-6">
                    Employees
                </div>
                <ul class="list-group list-group-flush">
                    <?php $emps = $company->employees()->paginate(10); ?>
                    @foreach($emps as $employee)
                        <div class="list-group-item">
                            <li class="row">
                                <div class="col-4 border-end">
                                    <a href="/employees/{{ $employee->id }}">{{ $employee->firstName }} {{
                                    $employee->lastName }}</a>
                                </div>
                                <div class="col-4 border-end">
                                    {{ $employee->email }}
                                </div>
                                <div class="col-3 text-end">
                                    {{ $employee->phoneNumber }}
                                </div>
                            </li>
                        </div>

                    @endforeach

                </ul>
            </x-card>
        </div>

    </x-card>
</x-layout>
{{ $emps->links('paginator.bootstrap') }}
