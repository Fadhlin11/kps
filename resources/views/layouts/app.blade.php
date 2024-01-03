<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" defer></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}" defer></script>

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if(auth()->check()&& auth()->user()->roles->name === 'patient')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('my.appointment') }}">{{ __('My Booking') }}</a>
                            </li>
                        @endif

                        @if(auth()->check()&& auth()->user()->roles->name === 'patient')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('my.treatment') }}">{{ __('My Treatment') }}</a>
                            </li>
                        @endif

                        <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    @if(auth()->check()&& auth()->user()->roles->name === 'patient')
                                    <a href="{{url('profile')}}" class="dropdown-item">Profile</a>
                                    @else
                                    <a href="{{url('dashboard')}}" class="dropdown-item">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
    <script>
    var dateToday = new Date();
        $( function() {
            $("#datepicker").datepicker({
                dateFormat:"dd-mm-yy",
                showButtonPanel:true,
                numberOfMonths:1,
                minDate:dateToday,
            });
        });
    </script>
   <style type="text/css">
    /* Add this style to ensure the slot buttons have a responsive size */
    label.btn.btn-block-custom {
        width: 100%; /* Use a percentage to make it responsive */
        max-width: 100px; /* Set a maximum width if needed */
    }

    body {
        background: #fff;
    }

    .ui-corner-all {
        color: #fff;
    }

    label.btn {
        padding: 0;
    }

    label.btn input {
        opacity: 0;
        position: absolute;
    }

    label.btn span {
        text-align: center;
        padding: 6px 12px;
        display: block;
        min-width: 80px;
    }

    label.btn input:checked+span {
        background-color: rgb(0, 128, 0);
        color: #fff;
    }

    .navbar {
        background: #6b9c73!important;
        color: #fff!important;
    }

    /* Media query for adjusting button size on smaller screens */
    @media (max-width: 767px) {
        label.btn.btn-block-custom {
            max-width: 150px; /* Adjust the size for smaller screens */
        }
    }
</style>
</body>
</html>
