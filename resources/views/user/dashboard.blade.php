<x-layout>


    <a href="#posts">Rich To Your Posts</a>

    {{-- profile inforation update --}}
    <form action="">
        {{-- input file --}}
        {{-- username --}}
        {{-- email --}}
        {{-- email verfication --}}
        {{-- bio --}}
        <button>SAVE</button>
    </form>

    {{-- user password update --}}
    <form action="">
        {{-- current password --}}
        {{-- new password --}}
        {{-- confimpassword --}}
        <button>SAVE</button>
    </form>
    {{-- delete account --}}
    <form action="">
        <button>DELETE ACCOUNT</button>
    </form>

    <h1 id="posts">Lates Posts</h1>
    @foreach ( $posts as $post )
            <x-postCard :post="$post">
                <a style="background-color: #00ff00 ; padding:10px; color:#fff;" href="">Update</a>
                <form style="display: inline-block;" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button style="background-color: #ff0000; color:#fff;">Delete</button>
                </form>
            </x-postCard>  
    @endforeach


    <div>
        {{$posts->links('pagination::bootstrap-5')}}
    </div>

</x-layout>