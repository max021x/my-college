<x-layout>
    {{-- latest Post --}}
    <section>
        <div>
            <nav>
                <ul>
                    <li><a href="{{route('posts.category' , 'computer')}}">Computer Engeering</a></li>
                    <li><a href="{{route('posts.category' , 'game')}}">Game</a></li>
                    <li><a href="{{route('posts.category' , 'cooking')}}">Cooking</a></li>
                    <li><a href="{{route('posts.category' , 'movie')}}">Movie</a></li>
                    <li><a href="{{route('posts.category' , 'fun')}}">Fun</a></li>
                </ul>
            </nav>
        </div>


        <h2>Your Lates Posts</h2>
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </section>


    <div>
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</x-layout>
