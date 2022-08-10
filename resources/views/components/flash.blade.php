@if (session()->has('success'))
    {{--    <div x-data="{ show: true}"--}}
    {{--         x-init="setTimeout(() => show = false, 4000)"--}}
    {{--         x-show="show" x-transition--}}
    {{--         class="position-fixed bg-success text-white py-2 px-4 rounded-3 top-0 w-100 fs-6">--}}
    {{--        <p>{{ session('success') }}</p>--}}
    {{--    </div>--}}
    <div id="flashMessage" class="alert alert-success alert-block text-center">
        <strong>{{ session('success') }}</strong>
    </div>
    <script>
        setTimeout(() => {
            const message = document.getElementById('flashMessage');
            message.classList.add('flashHidden');
        }, 4000)
    </script>

@endif
