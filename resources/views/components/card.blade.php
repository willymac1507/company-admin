@props(['col' => 10])

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-{{ $col }}">
            <div class="card">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
