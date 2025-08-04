<x-layout>
    <section class="max-w-4xl mx-auto py-8 px-4 font-sans">
        @if (session('success'))
            <p class="bg-green-600 text-white p-4 mb-6 rounded-lg text-center font-medium shadow-md">
                Post created successfully!
            </p>
        @endif

        <form id="postform" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title Field -->
            <div class="space-y-2">
                <label for="title" class="block text-lg font-medium text-[#004677]">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="mt-1 block w-full rounded-lg border-2 border-[#004677]/20 p-3 shadow-sm hover:shadow-md focus:border-[#004677] focus:ring-2 focus:ring-[#004677]/50 transition-all duration-200">
            </div>

            <div class="text-[#e20000] text-sm font-medium">
                @error('title')
                    {{ $message }}
                @enderror
            </div>

            <!-- Category Field -->
            <div class="space-y-2">
                <label for="category" class="block text-lg font-medium text-[#004677]">Category</label>
                <select name="category"
                    class="mt-1 block w-full rounded-lg border-2 border-[#004677]/20 p-3 shadow-sm hover:shadow-md focus:border-[#004677] focus:ring-2 focus:ring-[#004677]/50 transition-all duration-200">
                    <option value="computer">Computer Engineering</option>
                    <option value="game">Game</option>
                    <option value="cooking">Cooking</option>
                    <option value="movie">Movie</option>
                </select>
            </div>

            <div class="text-[#e20000] text-sm font-medium">
                @error('category')
                    {{ $message }}
                @enderror
            </div>

            <!-- Description Field -->
            <div class="space-y-2">
                <label for="description" class="block text-lg font-medium text-[#004677]">Description</label>
                <textarea name="description" rows="3"
                    class="mt-1 block w-full rounded-lg border-2 border-[#004677]/20 p-3 shadow-sm hover:shadow-md focus:border-[#004677] focus:ring-2 focus:ring-[#004677]/50 transition-all duration-200">{{ old('description') }}</textarea>
            </div>

            <div class="text-[#e20000] text-sm font-medium">
                @error('description')
                    {{ $message }}
                @enderror
            </div>

            <!-- Cover Image Field -->
            <div class="space-y-2">
                <label for="cover" class="block text-lg font-medium text-[#004677]">Cover Image</label>
                <input type="file" name="cover" id="cover"
                    class="mt-1 block w-full rounded-lg border-2 border-[#004677]/20 p-3 shadow-sm hover:shadow-md focus:border-[#004677] focus:ring-2 focus:ring-[#004677]/50 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#004677] file:text-white hover:file:bg-[#00315a]">
            </div>

            <!-- Markdown Editor -->
            <div class="space-y-2">
                <label for="markdown" class="block text-lg font-medium text-[#004677]">Content (Markdown)</label>
                <textarea id="markdown" name="markdown" rows="20"
                    class="mt-1 block w-full rounded-lg border-2 border-[#004677]/20 p-3 shadow-sm hover:shadow-md focus:border-[#004677] focus:ring-2 focus:ring-[#004677]/50 transition-all duration-200">{{ old('markdown') }}</textarea>
                <div class="text-[#e20000] text-sm font-medium">
                    @error('markdown')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- Preview Section -->
            <div class="space-y-2">
                <label class="block text-lg font-medium text-[#004677]">Preview</label>
                <div class="mt-1 rounded-lg border-2 border-[#004677]/20 p-4 shadow-lg bg-white">
                    <article class="prose max-w-none" id="body"></article>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full rounded-lg bg-[#004677] px-6 py-3 text-lg font-semibold text-white shadow-lg hover:bg-[#00315a] hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-[#004677]/50 focus:ring-offset-2 transition-all duration-200 transform hover:-translate-y-0.5">
                    Publish Post
                </button>
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