@props(['post', 'full' => false])

<article class="bg-white rounded-lg shadow-md overflow-hidden">
    @if ($post->cover)
        <img src="{{ asset('storage/' . $post->cover) }}" 
             class="w-full h-64 object-cover"
             alt="Post cover image">
    @else
        <img src="{{ asset('storage/blog-images/default.webp') }}" 
             class="w-full h-64 object-cover"
             alt="Default post image">
    @endif

    <div class="p-6">
        <div class="flex justify-between items-center mb-2">
            <span class="text-sm font-medium text-[#004677] bg-[#004677]/10 px-3 py-1 rounded-full">
                {{ $post->category }}
            </span>
            <span class="text-sm text-gray-500">
                {{ $post->created_at->diffForHumans() }}
            </span>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $post->title }}</h2>
        
        <p class="text-gray-600 mb-4">{{ $post->user->name }}</p>

        <div class="prose max-w-none">
            @if($full)
                <p class="text-gray-700 mb-4">{{ $post->description }}</p>
                <div class="markdown-content">
                    {!! $post->markdown !!}
                </div>
            @else
                <p class="text-gray-700 mb-4 line-clamp-3">{{ $post->description }}</p>
                <a href="{{ route('posts.show', $post) }}" 
                   class="text-[#004677] font-medium hover:underline inline-flex items-center">
                    Read full post
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endif
        </div>

        <div>
            {{$slot}}
        </div>
    </div>
</article>