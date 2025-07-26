<x-layout>
    <section>
        <h1>Welcome To Your Party</h1>
        <form action="" method="post">
            @csrf
            <div>
                <label for="name">User Name</label>
                <input type="text" name="username">
            </div>

            <div>
                <label for="email">Eamil</label>
                <input type="email" name="email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation">
            </div>

            <button type="submit">Submit</button>
        </form>
    </section>
</x-layout>
