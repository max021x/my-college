<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## My College  
My College is not only a web application - here we can chat and chill a little bit, and stay away from this cruel world that made monsters of us. 🌷  
Anyway, I hope you enjoy it and please let me know if you liked this website on GitHub discussion [here]()

## How to install on your local 
To install My College you need some tools: <br>
- PHP 8.x.x 
- Composer 
- MariaDB 
- Node.js (npm)
- A web server (Apache or Nginx)

If it's too much for you, you can just download and install Laragon from [here]()

After you have installed these tools, you need to run some commands. Go inside the project folder (the folder where the artisan file exists)

### PHP libraries installation 
> composer install 

### Make env file 
> cp .env.example .env

### Generate application key:
> php artisan key:generate

### Migrate database 
> php artisan migrate

### And the final command to run the app 
> php artisan serve 

This command will create a server on localhost:8000  
Let me know if you get stuck on something on [GitHub]()