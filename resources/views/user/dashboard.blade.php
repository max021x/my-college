<x-layout>
    {{-- Success/Delete Messages --}}
    @if (session('success') || session('delete'))
        <div class="bg-green-600 text-white p-4 mb-6 rounded text-center">
            {{ session('success') ?? session('delete') }}
        </div>
    @endif

    <div class="pb-10"></div>
    {{-- User Avatar --}}
    <div class="w-40 h-40 mx-auto mb-8 rounded-full overflow-hidden border-2 border-[#004677]">
        @if ($avatar)
            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $avatar) }}" alt="Profile Avatar">
        @else
            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        @endif
    </div>

    <div class="text-center mb-8">
        <a href="#posts" class="text-[#004677] font-medium hover:underline">Jump to Your Posts ↓</a>
    </div>

    {{-- Profile Update Form --}}
    <div class="max-w-2xl mx-auto mb-8">
        <form class="border-2 border-gray-200 rounded-lg p-6" action="" enctype="multipart/form-data">
            @csrf
            <h1 class="text-xl font-bold text-[#004677] mb-4">Update Your Info</h1>
            
            <div class="space-y-4">
                {{-- Avatar --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="avatar">Avatar:</label>
                    <input type="file" name="avatar" class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-[#004677] file:text-white
                        hover:file:bg-[#003355]">
                </div>
                
                {{-- Username --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="username">Username:</label>
                    <input type="text" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677]">
                </div>
                
                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email:</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677]">
                </div>
                
                <button type="submit" class="w-full bg-[#004677] text-white py-2 px-4 rounded-md hover:bg-[#003355] transition-colors">
                    SAVE
                </button>
            </div>
        </form>
    </div>

    {{-- Password Update Form --}}
    <div class="max-w-2xl mx-auto mb-8">
        <form class="border-2 border-gray-200 rounded-lg p-6" action="">
            <h1 class="text-xl font-bold text-[#004677] mb-4">Reset Your Password</h1>
            
            <div class="space-y-4">
                {{-- Current Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="current-password">Current Password:</label>
                    <input type="password" name="current-password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677]">
                </div>
                
                {{-- New Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password">New Password:</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677]">
                </div>
                
                {{-- Confirm Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677]">
                </div>
                
                <button type="submit" class="w-full bg-[#004677] text-white py-2 px-4 rounded-md hover:bg-[#003355] transition-colors">
                    SAVE
                </button>
            </div>
        </form>
    </div>

    {{-- Delete Account --}}
    <div class="max-w-2xl mx-auto mb-8 text-center">
        <form action="{{route('auth.delete')}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-6 rounded-md transition-colors">
                DELETE ACCOUNT
            </button>
        </form>
    </div>

    {{-- Posts Section --}}
    <div class="max-w-6xl mx-auto px-4" id="posts">
        <h1 class="text-2xl font-bold text-[#004677] mb-6">Latest Posts</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($posts as $post)
                <x-postCard :post="$post">
                    <div class="flex gap-2 mt-3">
                        <a href="{{ route('posts.edit', $post) }}" class="bg-green-500 hover:bg-green-600 text-white py-1 px-3 rounded-md text-sm transition-colors">
                            Update
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md text-sm transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </x-postCard>
            @endforeach
        </div>
    </div>

    {{-- Pagination --}}
    <div class="max-w-6xl mx-auto px-4 mt-8">
        {{ $posts->links('pagination::tailwind') }}
    </div>
</x-layout>