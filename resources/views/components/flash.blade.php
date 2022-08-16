@if (session()->has('success')||session()->has('error'))
    @if(session()->has('success'))
        <div id="flashMessage" class="alert alert-success alert-block text-center">
            <strong>{{ session('success') }}</strong>
        </div>
    @else
        <div id="flashMessage" class="alert alert-danger alert-block text-center">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
    <script>
        setTimeout(() => {
            // const message = document.getElementById('flashMessage');
            // message.classList.add('flashHidden');
            const message = $('#flashMessage');
            message.slideUp();
        }, 3000)
    </script>

@endif
