<x-layout>
    <section>

        @if (session('updated'))
            <p style="background: green ; color:#fff;">{{ session('updated') }}</p>
        @endif

        <form id="postform" action="{{ route('posts.update', $post) }}" method="post">
            {{-- <form action="" enctype="multipart/form-data"> --}}
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}">
            </div>

            <div class="error">
                @error('title')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="computer" {{ old('category', $post->category) == 'computer' ? 'selected' : '' }}>
                        Computer Engineering : default
                    </option>
                    <option value="game" {{ old('category', $post->category) == 'game' ? 'selected' : '' }}>
                        Game
                    </option>
                    <option value="cooking" {{ old('category', $post->category) == 'cooking' ? 'selected' : '' }}>
                        Cooking
                    </option>
                    <option value="movie" {{ old('category', $post->category) == 'movie' ? 'selected' : '' }}>
                        Movie
                    </option>
                    <option value="fun" {{ old('category', $post->category) == 'fun' ? 'selected' : '' }}>
                        Fun 😂
                    </option>
                </select>
            </div>

            <div>
                @error('category')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="description">Descrption</label>
                <textarea name="description">{{ old('description', $post->description) }}</textarea>

            </div>

            <div>
                @error('description')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="markdown">MarkDown</label>
                <textarea name="markdown" id="markdown">
                    {{ $post->markdown }}
                </textarea>
            </div>

            <div>
                @error('markdown')
                    <br>
                    {{ $message }}
                @enderror
            </div>
            <br>
            <button type="submit">Update</button>
        </form>


        <div style="border: solid 1px black ; padding:30px">
            <div id="body"></div>
        </div>

        @section('script')
            <script>
                let initialMarkdown = `{{ $post->markdown }}`;

                if (initialMarkdown.trim() !== "") {
                    localStorage.setItem('markdown', initialMarkdown);
                }


                let markdownTextarea = () => document.querySelector('#markdown');

                document.getElementById('postform').addEventListener('submit', function(event) {
                    localStorage.removeItem('markdown');
                });

                let convert = () => {
                    let markdown = markdownTextarea().value;

                    axios.post('{{ route('posts.edit', $post) }}', {
                            markdown
                        })
                        .then(response => {
                            document.querySelector('#body').innerHTML = response.data;
                        });
                };

                let init = () => {
                    markdownTextarea().value = localStorage.getItem('markdown');
                    setInterval(convert, 1000);
                }

                init();
            </script>
        @endsection

    </section>



</x-layout>
