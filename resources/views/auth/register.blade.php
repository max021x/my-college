<x-layout>
    <section>
        <h1>Welcome To Your Party</h1>
        <form action="{{ route('auth.register') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4 @error('name') error @enderror">
                <label for="name">User Name</label>
                <input type="text" name="name" value="{{old('name')}}">
                @error('name')
                <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 @error('email') error @enderror">
                <label for="email">Eamil</label>
                <input type="email" name="email" value="{{old('email')}}">
                @error('email')
                <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4 @error('password') error @enderror"> 
                <label for="password">Password</label>
                <input type="password" name="password" value="{{old('password')}}">
                @error('password')
                <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4 @error('password') error @enderror">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
            </div>
            
            {{-- needed to ber persian calleder --}}
            <div class="mb-4 @error('date') error @enderror">
                <label for="birthdate">Birth Date</label>
                <input required type="date" name="birthdate" value="{{old('birthdate')}}">
                @error('date')
                <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4 @error('avatar') error @enderror">
                <label for="avatar">Profile (this field is optional)</label>
                <input type="file" name="avatar">
                @error('avatar')
                <p style="background: #f00 ; color:#fff ; ">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit">Submit</button>
        </form>
    </section>
</x-layout>
