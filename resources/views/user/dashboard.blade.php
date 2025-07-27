<x-layout>
    <section>
        {{-- <form action="{{route('post.store')}}" method="post"> --}}
        <form action="" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{old('title')}}">
            </div>

            <div>
                <label for="category">Category</label>
                <select name="category" id="">
                    <option value="computer">Computer Engineering : defualt</option>
                    <option value="game">Game</option>
                    <option value="cooking">Cooking</option>
                    <option value="movie">Movie</option>
                </select>
            </div>

            <div>
                <label for="description">Descrption</label>
                <textarea name="description"></textarea>
            </div>

            <div>
                <label for="markdown">MarkDown</label>
                <textarea id="markdown" name="markdown"></textarea>
            </div>

            <div>
                <div id="body"></div>
            </div>
        </form>

        @section('script')
        <script>
                let markdownTextarea  = () => document.querySelector('#markdown') ; 

                let convert = () => {
                    let markdown = markdownTextarea().value;

                    axios.post('{{route("user.dashboard")}}', {
                            markdown
                        })
                        .then(response => {
                            document.querySelector('#body').innerHTML = response.data ; 
                        }) ; 
                
                localStorage.setItem('markdown' , markdown) ; 
                
                } ; 

                let init = () => {
                   markdownTextarea().value = localStorage.getItem('markdown') ; 

                    setInterval(convert , 2000);
                }

                init() ; 
            </script>
        @endsection

    </section>



</x-layout>
