<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Add this line at the top
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS in production (Vercel)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}