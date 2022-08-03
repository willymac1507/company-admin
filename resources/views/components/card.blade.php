@props(['col' => 8])

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-{{ $col }}">
            <div class="card">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
