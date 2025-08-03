<x-layout>
    <section class="register form__container">
        <h1>Welcome to the Party</h1>
        <form action="{{ route('auth.register') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4 input @error('name') ring-red-500  @enderror">
                <label for="name">User Name</label>
                <input type="text" name="name" value="{{old('name')}}">
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 input @error('email') ring-red-500  @enderror">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')}}">
                @error('email')
                 <p class="error">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4 input @error('password') ring-red-500  @enderror"> 
                <label for="password">Password</label>
                <input type="password" name="password" value="{{old('password')}}">
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4 input @error('password') ring-red-500  @enderror">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
            </div>
            
            {{-- needed to ber persian calleder --}}
            <div class="mb-4 @error('date') ring-red-500  @enderror">
                <label for="birthdate">Birth Date</label>
                <input required type="date" name="birthdate" value="{{old('birthdate')}}">
                @error('date')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4 @error('avatar') ring-red-500  @enderror">
                <label for="avatar">Profile</label>
                <input type="file" name="avatar">
                @error('avatar')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            
           <button
                    class="btn px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                    type="submit">Submit</button>
        </form>
    </section>
</x-layout>
