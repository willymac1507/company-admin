<x-header/>
<x-breadcrumbs/>
<x-card>
    <div class="card-header card-header-font">
        <div class="row">
            <div class="col-8 col-md-9 col-lg-10">Employee Details</div>
            <div class="col text-end"><a href="/employees/{{ $employee->id }}/edit">Edit</a></div>
            <div class="col text-end">
                <form method="POST" action="/employees/{{ $employee->id }}/delete" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <a class="text-danger" href="#" x-data="{}" @click.prevent="document.querySelector('#delete-form')
                        .submit()"
                    >Delete</a>
                </form>
            </div>
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
                        <div class="col-3 border-end d-md-none">
                            <span class="icon icon-office"></span>
                        </div>
                        <div class="col-3 border-end d-none d-md-block">
                            Company Name
                        </div>
                        <div class="col-9">
                            <a href="/companies/{{ $employee->company->id }}">{{ $employee->company->name }}</a>
                        </div>
                    </li>
                </div>
                <div class="list-group-item">
                    <li class="row">
                        <div class="col-3 border-end d-md-none">
                            <span class="icon icon-envelop3"></span>
                        </div>
                        <div class="col-3 border-end d-none d-md-block">
                            Company Email
                        </div>
                        <div class="col-9">
                            <a href="mailto:{{ $employee->company->email }}">{{ $employee->company->email }}</a>
                        </div>
                    </li>
                </div>
                <div class="list-group-item">
                    <li class="row">
                        <div class="col-3 border-end d-md-none">
                            <span class="icon icon-sphere"></span>
                        </div>
                        <div class="col-3 border-end d-none d-md-block">
                            Company Website
                        </div>
                        <div class="col-9">
                            <a href="{{ $employee->company->website }}">{{ $employee->company->website }}</a>
                        </div>
                    </li>
                </div>
            </ul>
        </x-card>
    </div>
</x-card>
<x-footer/>
