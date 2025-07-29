<x-layout>
    <section>
        <h1>Welcome Back Soldier</h1>
        <form action="{{route('auth.login')}}" method="post">
            @csrf
            <div>
                <label for="email">Eamil</label>
                <input type="email" name="email" value="{{old('email')}}">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <input type="checkbox" name="remember">
                <span>Remember Me</span>
            </div>
            
            @error('message')
                <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
            @enderror

            <button type="submit">Submit</button>
        </form>
    </section>
</x-layout>
