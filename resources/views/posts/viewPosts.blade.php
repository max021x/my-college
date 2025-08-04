<x-layout>
    {{-- Category Navigation --}}
    <section class="mb-6 mt-10">
        <div class="flex justify-center">
            <nav>
                <ul class="flex flex-wrap gap-2 justify-center">
                    <li><a href="{{route('posts.category', 'computer')}}" class="px-3 py-1 bg-[#004677] text-white rounded-full hover:bg-[#003355] transition-colors text-xs">Computer</a></li>
                    <li><a href="{{route('posts.category', 'game')}}" class="px-3 py-1 bg-[#004677] text-white rounded-full hover:bg-[#003355] transition-colors text-xs">Game</a></li>
                    <li><a href="{{route('posts.category', 'cooking')}}" class="px-3 py-1 bg-[#004677] text-white rounded-full hover:bg-[#003355] transition-colors text-xs">Cooking</a></li>
                    <li><a href="{{route('posts.category', 'movie')}}" class="px-3 py-1 bg-[#004677] text-white rounded-full hover:bg-[#003355] transition-colors text-xs">Movie</a></li>
                    <li><a href="{{route('posts.category', 'fun')}}" class="px-3 py-1 bg-[#004677] text-white rounded-full hover:bg-[#003355] transition-colors text-xs">Fun</a></li>
                </ul>
            </nav>
        </div>
    </section>

    {{-- Latest Posts --}}
    <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Latest Posts</h2>
        
        <div class="flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4 w-full max-w-4xl">
                @foreach ($posts as $post)
                    <div class="bg-white rounded-lg shadow-xs border border-gray-100 overflow-hidden">
                        {{-- Image --}}
                        @if ($post->cover)
                            <img src="{{ asset('storage/' . $post->cover) }}" 
                                class="w-full h-40 object-cover"
                                alt="Post cover">
                        @else
                            <img src="{{ asset('storage/blog-images/default.webp') }}" 
                                class="w-full h-40 object-cover"
                                alt="Default post image">
                        @endif

                        <div class="p-3">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-xs text-[#004677] font-medium">{{ $post->category }}</span>
                                <span class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                            </div>

                            <h3 class="text-sm font-medium text-gray-800 mb-1 line-clamp-2">{{ $post->title }}</h3>
                            
                            <p class="text-xs text-gray-600 mb-2 line-clamp-3">{{ $post->description }}</p>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-500 truncate max-w-[120px]">by {{ $post->user->name }}</span>
                                <a href="{{ route('posts.show', $post) }}" class="text-xs text-[#004677] font-medium hover:underline">
                                    Read →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Pagination --}}
    <div class="flex justify-center mb-8">
        <div class="px-4">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
</x-layout>