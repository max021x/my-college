<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('APP_NAME'))</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    {{-- main page header --}}

    <header>
        <nav>
            <ul>
                <li><a href="{{ route('index.main') }}">Home</a></li>

                @auth
                    <li>
                        <a href="{{ route('user.dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button>Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <div>
                        <li><a href="{{ route('auth.login') }}">Login</a></li>
                        <li><a href="{{ route('auth.register') }}">Register</a></li>
                    </div>
                @endguest
            </ul>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        &copy; all rights are not reserved 💗
        <nav>
            <ul>
                <li><a href="">contacts</a></li>
                <li><a href="">contacts</a></li>
                <li><a href="">contacts</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>
