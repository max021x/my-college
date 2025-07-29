@props(['post', 'full' => false])

<section class="card"
    style="padding:@if ($full) 50px @else 10px @endif; border:1px solid black ; line-height:20px ; background:#e0e0e0 ; ">

    <div>
        {{-- image cover --}}
        <div>
            @if ($post->cover)
                <img src="{{asset('storage/' . $post->cover)}}" 
                width="@if($full) 100% ; @else 30% ;@endif" 
                alt="">
            @endif
        
        </div>


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

            <div id="markdown" style="line-height: 30px;">
                Markdown: 
                ============================================================
                {!! $post->markdown !!} 
            </div>
        @endif


        <p>Createdat: {{ $post->created_at->diffForHumans() }}</p>

        <div >
            {{$slot}}
        </div>

    </div>
</section>
<br>
