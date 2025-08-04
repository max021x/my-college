<x-layout>
    <section class="max-w-4xl mx-auto py-8 px-4">
        <form id="postform" action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-2">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677]">
                @error('title')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677]">
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
                @error('category')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677]">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="markdown" class="block text-sm font-medium text-gray-700">MarkDown</label>
                <textarea name="markdown" id="markdown" rows="8"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#004677] focus:border-[#004677] font-mono text-sm">{{ old('markdown', $post->markdown) }}</textarea>
                @error('markdown')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="cover" class="block text-sm font-medium text-gray-700">Insert Image [optional]</label>
                <input type="file" name="cover" 
                       class="block w-full text-sm text-gray-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-md file:border-0
                              file:text-sm file:font-semibold
                              file:bg-[#004677] file:text-white
                              hover:file:bg-[#003355]">
                @error('cover')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex">
                <button type="submit" 
                        class="px-4 py-2 bg-[#004677] text-white rounded-md hover:bg-[#003355] transition-colors w-100 m-auto">
                    Update Post
                </button>
            </div>
        </form>

        <div class="mt-8 border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Preview</h3>
            <div id="body" class="prose max-w-none"></div>
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