<x-layout>
    <x-card>
        <div class="card-header">Companies</div>
        <ul class="list-group list-group-flush">
            @foreach($companies as $company)
                <li class="list-group-item">
                    <a href="/companies/#">{{ $company->name }}</a>
                </li>
            @endforeach
        </ul>
    </x-card>
</x-layout>
