<x-layout>
    @if (session('success') || session('delete'))
        <p style="background: green ; color:#fff;">{{ session('success') ?? session('delete') }}</p>
    @endif

    {{-- user avatar --}}
    <div style="width:40% ; text-align:center ; margin:auto">
        <img style="" src="{{ asset('storage/' . $avatar) }}" alt="">
    </div>


    <a href="#posts">Rich To Your Posts</a>

    {{-- profile inforation update --}}
    <form style="border:2px solid ; padding:20px; margin: 20px 0px ;  " action="" enctype="multipart/form-data">
        @csrf
        <h1>Update Your Info</h1>
        {{-- avatar file --}}
        <div>
            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar">
        </div>
        {{-- username --}}
        <div>
            <label for="username">UserName:</label>
            <input type="text" name="username">
        </div>
        {{-- email --}}
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email">
        </div>
        {{-- email verfication --}}
        <div>
            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar">
        </div>
        {{-- bio --}}
        <button>SAVE</button>
    </form>

    {{-- user password update --}}
    <form style="border:2px solid ; padding:20px;  action="">
        <h1>Reset Your Password</h1>

        {{-- current password --}}
        <div>
            <label for="current-password">Current Password:</label>
            <input type="password" name="current-password">
        </div>
        {{-- new password --}}
        <div>
            <label for="password">New Password:</label>
            <input type="password" name="password">
        </div>
        {{-- confimpassword --}}
        <div>
            <label for="password_confirmation">Confirm:</label>
            <input type="password" name="password_confirmation">
        </div>
        <button>SAVE</button>
    </form>
    {{-- delete account --}}
    <br>
    <form action="">
        <button style="background-color: #ff0000; color:#fff;">DELETE ACCOUNT</button>
    </form>

    <h1 id="posts">Lates Posts</h1>
    @foreach ($posts as $post)
        <x-postCard :post="$post">
            <a style="background-color: #00ff00 ; padding:10px; color:#fff;"
                href="{{ route('posts.edit', $post) }}">Update</a>
            <form style="display: inline-block;" action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button style="background-color: #ff0000; color:#fff;">Delete</button>
            </form>
        </x-postCard>
    @endforeach


    <div>
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>

</x-layout>
