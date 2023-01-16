<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>McDanold</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet"
        crossorigin="anonymous">

    <link href="{{ URL::asset('image/icon.svg') }}" rel="icon">
</head>

<body class="d-flex flex-column vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #DA291C">
        <div class="container-fluid mx-3">
            <a class="navbar-brand" href="/">
                <img src="{{ URL::asset('image/icon.svg') }}" alt="" width="32" height="32">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('menu*') ? 'active' : '' }}" aria-current="page"
                            href="/menu">Menu</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('order*') ? 'active' : '' }}" aria-current="page"
                                href="/order">Order</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about-us*') ? 'active' : '' }}" aria-current="page"
                            href="/about-us">About Us</a>
                    </li>
                </ul>

                <ul
                    class="navbar-nav mb-2 mb-lg-0 d-flex align-items-sm-center justify-content-center justify-content-lg-start">
                    @if (!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" aria-current="page"
                                href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" aria-current="page"
                                href="/login">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/cart">
                                <i class="bi bi-cart"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#"
                                class="nav-link d-block link-dark text-decoration-none dropdown-toggle show"
                                data-bs-toggle="dropdown" aria-expanded="true">
                                <img src="@if (auth()->user()->image_path == null) {{ URL::to('image/default-user.jpg') }} @else /storage/images/{{ auth()->user()->image_path }} @endif"
                                    alt="mdo" width="25" height="25" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small shadow text-secondary"
                                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 34.4px, 0px);"
                                data-popper-placement="bottom-end">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                <li><a class="dropdown-item" href="/logout">Sign out</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="container mt-auto">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item px-2 text-muted">2440017126 - Vio Albert Ferdinand</a></li>
                <li class="nav-item px-2 text-muted fw-semibold">|</a></li>
                <li class="nav-item px-2 text-muted">2440030582 - Gregorius Emmanuel Henry</li>
                <li class="nav-item px-2 text-muted fw-semibold">|</a></li>
                <li class="nav-item px-2 text-muted">2440031521 - Vinsen Nawir</li>
                <li class="nav-item px-2 text-muted fw-semibold">|</a></li>
                <li class="nav-item px-2 text-muted">2440062161 - Francis Alexander</li>
            </ul>
            <p class="text-center text-muted">© 2022 McDanold, Inc</p>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
