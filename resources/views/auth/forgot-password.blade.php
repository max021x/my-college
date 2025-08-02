<x-layout>
    <section>
        <h1>Insert Your email Address to Reset Password</h1>
        {{-- Session Messages --}}
        @if (session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <form action="{{ route('password.request') }}" method="post">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            <button type="submit">Send Email</button>
        </form>

    </section>
</x-layout>
