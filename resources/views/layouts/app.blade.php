<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme='dark'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LibraryEase</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM3Awtjz5z5E7A7Pb3J9Q6bAK4MjhK/N7d3yW9b" crossorigin="anonymous">

    <link rel="icon" href="{{ Vite::asset('resources/images/logo.svg') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-info-subtle">
            <div class="container">
                <a class="navbar-brand" href="/books">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Logo" style="height: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                {{ Auth::user()->name }}
                            </li>
                        @endauth
                    </ul>
                    {{--  Display only if the user is admin --}}
                    @can('admin.access')
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a href="{{ route('user_dashboard') }}">User Dashboard</a>
                            </li>
                            <li class="nav-item ms-5">
                                <a href="{{ url('book') }}">Book Dashboard</a>
                            </li>
                        </ul>
                    @endcan

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="{{ route('user.profile', Auth::user()->id) }}" aria-label="User Profile"
                                    class="text-primary me-2">
                                    <i class="fa-solid fa-user"></i>My Profile
                                </a> <span class="mx-2">|</span>
                                <a href="{{ route('logout') }}" aria-label="Logout" class="text-danger"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout <i class="fa-solid fa-right-from-bracket"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                    </div>
                    </li>
                @endguest
                </ul>
            </div>
    </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>
