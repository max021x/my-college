@props(['post', 'full' => false])

<section class="card"
    style="padding:@if ($full) 50px @else 10px @endif; border:1px solid black ; line-height:20px ">

    <div>
        <p>Title : {{ $post->title }}</p>
        <p>Category : {{ $post->category }}</p>
        <a href="">
            <p>Author : {{ $post->user->name }}</p>
        </a>

        @if (!$full)
            <p>Description : <br>{{ Str::words($post->description, 10) }}</p>
            <a href="{{ route('posts.show', $post) }}">Readmore</a>
        @else
            <p style="line-height: 30px;">Description : <br>{{ $post->description }}</p>

            <p id="markdown" style="line-height: 30px;">
                Markdown: <br> {{ $post->markdown}}
            </p>
        @endif


        <p>Createdat: {{ $post->created_at->diffForHumans() }}</p>

    </div>
</section>
<br>

@if ($full)
    @section('script')
        <script>
            let markdownTextarea = () => document.querySelector('#markdown');

            let convert = () => {
                let markdown = markdownTextarea().value;

                axios.post('{{ route('posts.show' , $post) }}', {
                        markdown
                    })
                    .then(response => {
                        document.querySelector('#markdown').innerHTML = response.data;
                    });
            };

            convert() ;
        </script>
    @endsection
@endif
