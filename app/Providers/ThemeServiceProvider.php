<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ThemeSetting;

class ThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        view()->composer('*', function ($view) {
            $themeSettings = ThemeSetting::firstOrNew();
            $view->with('themeSettings', $themeSettings);
        });
    }
} 