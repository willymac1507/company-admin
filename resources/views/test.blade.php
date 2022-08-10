<x-header />
<div
    x-data="{ show: true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    class="position-relative bg-success text-white py-2 px-4 rounded-3 top-0 w-100 fs-6">
    This is a message
</div>
<div class="">This is some text</div>
<x-footer />
