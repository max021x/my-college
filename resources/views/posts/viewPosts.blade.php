<x-layout>
    {{-- latest Post --}}
    <section>
        <h2>Your Lates Posts</h2>
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </section>


    <div>
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</x-layout>
