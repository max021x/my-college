<x-layout>

    {{-- header --}}
    <section class="text-box">
        <h1>To Infinity & Beyond</h1>
        <p>
            Be free to create posts and share your data with anybody
        </p>
    </section>

    {{-- about app --}}
    <section class="about">
        <h2>What The Hell Is My College?</h2>
        <p>My College is my first website which is only a weblog
            that I created for our Guffi gang.
            For me, it is just a start. Later on I will add more features, so enjoy and relax.
        </p>
    </section>


    <section class="tools">
        <h2>What tools did I use to create this app?</h2>

        <div class="row">
            <div class="col">
                <div class="avatar">
                    <img src="{{ asset('storage/my-college/main/logos/laravel-logo.png') }}" alt="">
                </div>
                <h3>Laravel</h3>
                <p>Every new nerd programmer hates PHP for no reason. I always wondered why PHP has lots of haters, then I found it's because of its powerful features such as Blade templating and Artisan which I love 💗 to work with, even when I want to make a simple view.</p>
            </div>

            <div class="col">
                <div class="avatar">
                    <img src="{{ asset('storage/my-college/main/logos/mysql-logo.png') }}" alt="">
                </div>
                <h3>MySQL</h3>
                <p>
                    Well, I'm still new to MySQL. I used MariaDB driver which is faster. MySQL string functions were the part I liked so much,
                    and I offer you to look at this database - it's so catchy.
                </p>
            </div>


            <div class="col">
                <div class="avatar">
                    <img src="{{ asset('storage/my-college/main/logos/laragon-logo.png') }}" alt="">
                </div>
                <h3>Laragon</h3>
                <p>
                    Leo Khoa (Laragon Creator) is a smart guy,
                    but I wish his team made Laragon for Linux distros too. Laragon is a web tool package that has everything a web developer needs for developing like Apache, Nginx, PHP, MySQL, Node.js, Python, even a mailer AKA Mailpit. In Mailpit I could send emails to my local machine to test emails.
                </p>
            </div>
        </div>
    </section>

</x-layout>