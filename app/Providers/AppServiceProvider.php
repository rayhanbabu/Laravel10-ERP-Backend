<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        if ($this->app->runningInConsole()) {
            return;
        }

        $forwardedProto = strtolower((string) request()->server('HTTP_X_FORWARDED_PROTO'));
        $https = request()->isSecure() || $forwardedProto === 'https';

        if ($https) {
            URL::forceScheme('https');
            config(['session.secure' => true]);
        }
    }
}
