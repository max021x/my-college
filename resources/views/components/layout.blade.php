<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('APP_NAME'))</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.11.0/axios.min.js"
        integrity="sha512-h9644v03pHqrIHThkvXhB2PJ8zf5E9IyVnrSfZg8Yj8k4RsO4zldcQc4Bi9iVLUCCsqNY0b4WXVV4UB+wbWENA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- main page header --}}

    <header class="@if (request()->routeIs('home.index')) header__container @else header__slim @endif ">
        {{-- menu --}}
        <div class="header__menu">
            {{-- logo --}}
            <a href="{{ route('home.index') }}"><img
                    src="{{ asset('storage/my-college/main/logos/my-college-nbg-white.png') }}"
                    alt="my college logo"></a>

            <nav id="headerMenu">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    @auth
                        <li><a href="{{ route('posts.index') }}">Latest</a></li>
                        <li>
                            <a href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('posts.create') }}">Create Post</a>
                        </li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button>Logout</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li><a href="{{ route('auth.login') }}">Login</a></li>
                        <li><a href="{{ route('auth.register') }}">Register</a></li>
                    @endguest
                </ul>
            </nav>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>


    <footer class="bg-white fixed bottom-0 left-0 right-0 z-50">
        <div
            class="container flex flex-col items-center justify-between p-4 mx-auto space-y-2 sm:space-y-0 sm:flex-row">
            <a href="#">
                <img class="w-auto h-10" src="{{ asset('storage/my-college/main/logos/my-college-slog.png') }}">
            </a>

            <p class="text-xs text-gray-600">© Copyright 2021. All Rights Reserved.</p>

            <div class="flex -mx-1">
                <!-- Telegram -->
                <a href="#" class="mx-1 text-gray-600 hover:text-blue-500" aria-label="Telegram">
                    <svg class="w-6 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.57-1.38-.93-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69.03-.1.05-.2-.04-.3-.1-.1-.25-.07-.36-.04-.15.05-2.57 1.66-7.27 4.88-.7.5-1.34.74-1.91.73-.6-.01-1.76-.34-2.62-.63-1.07-.36-1.92-.55-1.85-1.16.03-.3.45-.61 1.24-.88z" />
                    </svg>
                </a>

                <!-- Gmail -->
                <a href="#" class="mx-1 text-gray-600 hover:text-red-500" aria-label="Gmail">
                    <svg class="w-6 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z" />
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="#" class="mx-1 text-gray-600 hover:text-pink-600" aria-label="Instagram">
                    <svg class="w-6 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>

    {{-- page reload --}}
    {{-- eve.preventDefault();  --}}
    @yield('script')

    <script>
        // JavaScript for toggle menu 
        const navLinks = document.getElementById("headerMenu");

        function showMenu() {
            navLinks.style.right = "0px";

        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>

</body>

</html>
