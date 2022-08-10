<!doctype html>
<html lang="en">

<!-- START head.blade.php -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>camelAdmin</title>
</head>
<!-- END head.blade.php -->
<!-- START body -->
<body class="px-2 py-4 max-w-7xl mx-auto">
<x-flash />

<nav class="navbar  navbar-expand-md bg-light">
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
                    <div class="md-up-only">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Welcome back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="/">Dashboard</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/companies">Companies</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/employees">Employees</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/admin">Admin</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" x-data="{}"
                                       @click.prevent="document.querySelector('#logout-form').submit()">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </div>

                    <div class="sm-down-only text-end">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/companies">Companies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/employees">Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" x-data="{}"
                               @click.prevent="document.querySelector('#logout-form').submit()">Log Out</a>
                        </li>
                    </div>

                    <form id="logout-form" class="hidden" action="/logout" method="post">
                        @csrf
                    </form>
                </ul>
            </div>
        @endauth
    </div>
</nav>
