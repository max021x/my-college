<x-layout>
    <section>
        <h1>Welcome To Your Party</h1>
        <form action="{{ route('auth.register') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4 @error('name') error @enderror">
                <label for="name">User Name</label>
                <input type="text" name="name">
                @error('name')
                    {{ $message }}
                @enderror
            </div>

            <div class="mb-4 @error('email') error @enderror">
                <label for="email">Eamil</label>
                <input type="email" name="email">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            
            <div class="mb-4 @error('password') error @enderror"> 
                <label for="password">Password</label>
                <input type="password" name="password">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            
            <div class="mb-4 @error('password') error @enderror">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation">
            </div>
            
            {{-- needed to ber persian calleder --}}
            <div class="mb-4 @error('date') error @enderror">
                <label for="birthdate">Birth Date</label>
                <input required type="date" name="birthdate">
                @error('date')
                    {{ $message }}
                @enderror
            </div>
            
            <div class="mb-4 @error('profile') error @enderror">
                <label for="profile">Profile (this field is optional)</label>
                <input type="file" name="profile">
                @error('profile')
                    {{ $message }}
                @enderror
            </div>
            
            <button type="submit">Submit</button>
        </form>
    </section>
</x-layout>
