<x-layout>
    <x-card>
        <div class="card-header row m-0 ps-0">
            <div class="col-3 border-end">
                Employees
            </div>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($employees as $employee)
                <li class="list-group-item col-3 border-end">
                    <a href="/employees/#">{{ $employee->firstName }} {{ $employee->lastName }}</a>
                </li>
            @endforeach
        </ul>
    </x-card>
    {{ $employees->onEachSide(2)->links('paginator.bootstrap') }}
</x-layout>
