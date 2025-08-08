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
                            <a href="{{ route('posts.create') }}">Create</a>
                        </li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button class="text-white cursor-pointer ">Logout</button>
                            </form>
                        </li>
                    @endauth
                    
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
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

    
   
    @yield('footer')
    
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





