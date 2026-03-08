<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        Event::listen(Login::class, function ($event) {
            $event->user->update([
                'active' => true,
            ]);
        });

        Event::listen(Logout::class, function ($event) {
            if ($event->user) {
                $event->user->update([
                    'active' => false,
                ]);
            }
        });

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

    }

}
