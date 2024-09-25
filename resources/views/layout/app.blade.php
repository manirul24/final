<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Car Rental</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/toastify.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/toastify-js.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
</head>

<body>

    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div>

        <nav class="navbar sticky-top shadow-sm navbar-expand-lg navbar-light py-2">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Car Rental
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header01"
                    aria-controls="header01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="header01">
                    <ul class="navbar-nav ms-auto mt-3 mt-lg-0 mb-3 mb-lg-0 me-4">
                        <li class="nav-item me-4"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item me-4"><a class="nav-link" href="{{ url('/search') }}">bookings</a></li>
                        <li class="nav-item me-4"><a class="nav-link" href="{{ url('/userRegistration') }}">Singup</a>
                        </li>
                        <li class="nav-item me-4"><a class="nav-link" href="{{ url('/search') }}">About</a></li>
                        <li class="nav-item me-4"><a class="nav-link" href="{{ url('/') }}">Contact</a></li>


                        @if (Cookie::get('token') !== null)
                            <li><a href="{{ url('/profile') }}"> <i class="linearicons-user"></i> Account</a></li>
                            <li><a class="btn btn-danger btn-sm" href="{{ url('/logout') }}"> Logout</a></li>
                        @else
                            <li><a class="btn btn-danger btn-sm" href="{{ url('/userLogin') }}">Login</a></li>
                        @endif




                    </ul>
                    {{-- <div><a class="btn mt-3 bg-gradient-primary" href="{{ url('/userLogin') }}">Login</a></div> --}}
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <script></script>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
