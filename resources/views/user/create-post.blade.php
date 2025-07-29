<x-layout>
    <section>

        {{-- session success --}}
        @if (session('success'))
            <p style="background: green ; color:#fff;">Yes your post was Created .</p>
        @endif

        {{-- create form --}}
        <form id="postform" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- title input --}}
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>

            <div class="error">
                @error('title')
                    <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>

            {{-- category input --}}
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
                    <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>

            {{-- description input --}}
            <div>
                <label for="description">Descrption</label>
                <textarea name="description">{{ old('description') }}</textarea>
            </div>

            <div>
                @error('description')
                    <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>
            {{-- markdown input --}}
            <div>
                <label for="markdown">MarkDown</label>
                <textarea id="markdown" name="markdown" cols="95" rows="20">
                    {{ old('markdown') }}
                </textarea>
            </div>

            <div>
                @error('markdown')
                    <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>

            {{-- image cover --}}
            <div>
                <label for="cover">Insert Image [optional] </label>
                <input type="file" name="cover">
            </div>
            @error('cover')
                <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
            @enderror


            <button style="background: #00ff; color:#fff;" type="submit">Submit</button>

            {{-- markdown result  --}}
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
