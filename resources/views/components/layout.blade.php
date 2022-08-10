<!doctype html>
<html lang="en">

<!-- START head.blade.php -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>camelAdmin</title>
</head>
<!-- END head.blade.php -->
<!-- START body -->
<body class="px-2 py-4 max-w-7xl mx-auto">

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col ps-0"><img src="/images/myLogo.svg" alt="logo" width="75"></div>
                    <div class="col"><h2 class="mb-0">camel<span class="text-danger">A</span>dmin</h2></div>
                </div>
            </div>
        </a>
        @auth()
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/companies" class="nav-link">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a href="/employees" class="nav-link">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin" class="nav-link">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" x-data="{}"
                           @click.prevent="document.querySelector('#logout-form').submit()">Log Out</a>
                    </li>

                    {{--                    <li class="nav-item dropdown">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"--}}
                    {{--                           aria-expanded="false">--}}
                    {{--                            Welcome back, {{ auth()->user()->name }}--}}
                    {{--                        </a>--}}
                    {{--                        <ul class="dropdown-menu dropdown-menu-end">--}}
                    {{--                            <li>--}}
                    {{--                                <a class="dropdown-item" href="/">Dashboard</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a class="dropdown-item" href="/companies">Companies</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a class="dropdown-item" href="/employees">Employees</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a class="dropdown-item" href="/admin">Admin</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a class="dropdown-item" href="#" x-data="{}"--}}
                    {{--                                   @click.prevent="document.querySelector('#logout-form').submit()">Log Out</a>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    <form id="logout-form" class="hidden" action="/logout" method="post">
                        @csrf
                    </form>
                </ul>
            </div>
        @endauth
    </div>
</nav>

{{ $slot }}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
<x-flash/>
</body>
</html>
