<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Notifications\VerifyEmail ; 
use Illuminate\Notifications\Messages\MailMessage ; 
use Illuminate\Support\Facades\Route ; 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->view('emails.email-verification-message', ['url' => $url]);
        });

        Route::pattern('id', '[0-9]+');

        Password::default(function () {
            $rule = Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(3);
            // return $this->app->isProduction()

            //     ? $rule->mixedCase()->uncompromised()

            //     : $rule;

            return $rule;
        });
    }
}
