<x-layout>
    <x-breadcrumbs />
    <x-card>
        <div class="card-header fs-5">
            <div class="row">
                <div class="col-10">Employee Details</div>
                <div class="col text-end"><a href="#">Edit</a></div>
                <div class="col text-end"><a href="#" class="link-danger">Delete</a></div>
            </div>

        </div>
        <div class="card-body">
            <?php $name = $employee->firstName . ' ' . $employee->lastName; ?>
            <h3 class="card-title">{{ $name }}</h3>
            <hr>
            <div class="card-text">Email: <a
                    href="mailto:{{ $employee->email }}">
                    {{ $employee->email }}</a></div>
            <div class="card-text">Telephone: <a
                    href="tel:{{ $employee->phoneNumber }}">
                    {{ $employee->phoneNumber }}</a></div>
            <hr>
            <x-card :col="12">
                <div class="card-header fs-6">
                    Employer
                </div>
                <ul class="list-group list-group-flush">
                    <div class="list-group-item">
                        <li class="row">
                            <div class="col-2 border-end">
                                Company Name
                            </div>
                            <div class="col-10">
                                <a href="/companies/{{ $employee->company->id }}">{{ $employee->company->name }}</a>
                            </div>
                        </li>
                    </div>
                    <div class="list-group-item">
                        <li class="row">
                            <div class="col-2 border-end">
                                Company Email
                            </div>
                            <div class="col-10">
                                <a href="mailto:{{ $employee->company->email }}">{{ $employee->company->email }}</a>
                            </div>
                        </li>
                    </div>
                    <div class="list-group-item">
                        <li class="row">
                            <div class="col-2 border-end">
                                Company Website
                            </div>
                            <div class="col-10">
                                <a href="{{ $employee->company->website }}">{{ $employee->company->website }}</a>
                            </div>
                        </li>
                    </div>
                </ul>
            </x-card>
        </div>

    </x-card>
</x-layout>
