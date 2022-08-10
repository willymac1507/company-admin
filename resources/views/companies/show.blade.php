<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header card-header-font">
        <div class="row">
            <div class="col-7 col-md-9 col-lg-10">Company Details</div>
            <div class="col text-end"><a href="/companies/{{$company->id}}/edit">Edit</a></div>
            <div class="col text-end">
                <form method="POST" action="/companies/{{ $company->id }}/delete" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <a class="text-danger" href='#' data-bs-toggle="modal" data-bs-target="#confirmModal"
                       aria-label="Delete">Delete</a>
                    {{--                        <button type="submit">Delete</button>--}}
                </form>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="row pe-3">
            <div class="col-10">
                <h3 class="card-title mt-2">{{ $company->name }}</h3>
            </div>
            <div class="col-2 text-end p-0 rounded-2">
                @if(isset($company->logo))
                    <img class="rounded-2" src="/storage/{{ $company->logo }}" alt="logo" width="50">
                @else
                    <img class="rounded-2" src="https://picsum.photos/100" alt="logo" width="50">
                @endif
            </div>
        </div>
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
                            <div class="col-12 col-md-4 border-end border-md">
                                <a class="employee__name" href="/employees/{{ $employee->id }}">{{ $employee->firstName
                                }} {{
                                    $employee->lastName }}</a>
                            </div>
                            <div class="employee__email col-12 col-md-4 border-end border-md">
                                <a href="mailto:{{ $employee->email }}">{{
                                $employee->email }}</a>
                            </div>
                            <div class="employee__phone col-12 col-md-3 text-md-end">
                                {{ $employee->phoneNumber }}
                            </div>
                        </li>
                    </div>

                @endforeach

            </ul>
        </x-card>
    </div>

</x-card>
{{ $emps->links() }}
<x-footer/>
