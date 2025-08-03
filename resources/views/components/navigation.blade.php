       <div class="header__menu">
           {{-- logo --}}
           <a href="{{ route('home.index') }}"><img
                   src="{{ asset('storage/my-college/main/logos/my-college-nbg-white.png') }}" alt="my college logo"></a>

           <nav id="headerMenu">
               <i class="fa fa-times" onclick="hideMenu()"></i>
               <ul>
                   @auth
                       <li><a href="{{ route('posts.index') }}">Latest</a></li>
                       <li>
                           <a href="{{ route('user.dashboard') }}">Dashboard</a>
                       </li>
                       <li>
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
