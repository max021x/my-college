<x-layout>
    @if (session('status'))
        <p class="text-center mx-auto text-white bg-green-500 p-10 align-middle">{{ session('status') }}</p>
    @endif



    <div class="container">
        <section class="form__container">
            <h1>Welcome Back Soldier</h1>
            @error('message')
                <p class="error">{{ $message }}</p>
            @enderror
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="input box">
                    <div class="checkbox">
                        <span>Remember Me</span>
                        <input type="checkbox" name="remember">
                    </div>

                    <a class="text-blue-500" href="{{ route('password.request') }}">Forgot your password?</a>
                </div>

                <button
                    class="btn px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                    type="submit">Submit</button>
            </form>
        </section>
    </div>
</x-layout>
