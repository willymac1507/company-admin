@if (session()->has('success'))
    <div x-data="{ show: true}"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="position-fixed bg-success text-white py-2 px-4 rounded-3 bottom-3 end-3 fs-6">
        <p>{{ session('success') }}</p>
    </div>
@endif
