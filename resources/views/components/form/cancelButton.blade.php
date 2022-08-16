@props(['location'])

<button
    class="btn btn-outline-secondary"
    type="button"
    x-data="{}"
    x-on:click="window.location.href='/{{ $location }}'">
    {{ $slot }}
</button>
