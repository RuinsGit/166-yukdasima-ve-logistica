<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Str::macro('slug', function($string, $separator = '-') {
            return Str::slug($string, $separator);
        });

        view()->composer('*', function ($view) {
            $themeSettings = \App\Models\ThemeSetting::first() ?? new \App\Models\ThemeSetting();
            $view->with('themeSettings', $themeSettings);
        });
    }
}
