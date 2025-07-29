<x-layout>
    <section>

        @if (session('success'))
            <p style="background: green ; color:#fff;">Yes your post was Created .</p>
        @endif

        <form id="postform" action="{{ route('posts.store') }}" method="post">
            {{-- <form action="" enctype="multipart/form-data"> --}}
                @csrf
                
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>

            <div class="error">
                @error('title')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="category">Category</label>
                <select name="category" id="">
                    <option value="computer">Computer Engineering : defualt</option>
                    <option value="game">Game</option>
                    <option value="cooking">Cooking</option>
                    <option value="movie">Movie</option>
                    <option value="fun">Fun 😂</option>
                </select>

            </div>

            <div>
                @error('category')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="description">Descrption</label>
                <textarea name="description">{{ old('description') }}</textarea>

            </div>

            <div>
                @error('description')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label for="markdown">MarkDown</label>
                <textarea id="markdown" name="markdown" cols="95" rows="20">
                    {{ old('markdown') }}
                </textarea>
            </div>

            <div>
                @error('markdown')
                    <br>
                    {{ $message }}
                @enderror
            </div>
            <br>
            <button type="submit">Submit</button>
            <div style="border: solid 1px black ; padding:30px">
                <div id="body"></div>
            </div>
        </form>



        @section('script')
            <script>
                
                let markdownTextarea = () => document.querySelector('#markdown');

                document.getElementById('postform').addEventListener('submit', function(event) {
                    localStorage.removeItem('markdown'); 
                });

                let convert = () => {
                    let markdown = markdownTextarea().value;

                    axios.post('{{ route('posts.create') }}', {
                            markdown
                        })
                        .then(response => {
                            document.querySelector('#body').innerHTML = response.data;
                        });

                    localStorage.setItem('markdown', markdown);

                };

                let init = () => {
                    markdownTextarea().value = localStorage.getItem('markdown');

                    setInterval(convert, 2000);
                }

                init();
            </script>
        @endsection

    </section>



</x-layout>
