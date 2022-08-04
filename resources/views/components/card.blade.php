@props(['col' => 8])

<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-{{ $col }}">
            <div class="card">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
