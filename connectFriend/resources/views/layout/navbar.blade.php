<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.25rem;
        }
        .nav-link {
            font-weight: 500;
            transition: color 0.3s;
        }
        .nav-link:hover,
        .nav-link.active {
            color: #ffbb33; /* Highlight color */
        }
        .btn-outline-light {
            border-color: #fff;
            color: #fff;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-outline-light:hover {
            background-color: #fff;
            color: #212529;
        }
        .btn-primary {
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"%3E%3Cpath fill="none" stroke="%23fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"/%3E%3C/svg%3E');
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('user.index') }}">ConnectFriend</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('activeHome')" href="{{ route('user.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('activeRequest')" href="{{ route('friend-request.index') }}">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('activeFriend')" href="{{ route('friend.index') }}">Friends</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    @if (Auth::check())
                        <span class="text-light me-3">Welcome, {{ Auth::user()->name }}!</span>
                        <form method="POST" action="{{ url('/logout') }}" class="d-flex">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Logout</button>
                        </form>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <main class="container mt-5">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>