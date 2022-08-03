<x-layout>
    <x-breadcrumbs />
    <x-card>
        <div class="card-header fs-5">
            <div class="row">
                <div class="col-10">Company Details</div>
                <div class="col text-end"><a href="/companies/{{$company->id}}/edit">Edit</a></div>
                <div class="col text-end">
                    <form method="POST" action="/companies/{{ $company->id }}/delete" id="delete-form">
                        @csrf
                        @method('DELETE')
                        <a class="text-danger" href="#" x-data="{}" @click.prevent="document.querySelector('#delete-form')
                        .submit()"
                        >Delete</a>
{{--                        <button type="submit">Delete</button>--}}
                    </form>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-10">
                    <h3 class="card-title mt-2">{{ $company->name }}</h3>
                </div>
                <div class="col-2 text-end">
                    <img src="/storage/{{ $company->logo }}" alt="logo" width="50">
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
