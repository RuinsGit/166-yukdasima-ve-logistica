<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ThemeSetting;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*', function ($view) {
            $themeSettings = ThemeSetting::first() ?? new ThemeSetting();
            $view->with('themeSettings', $themeSettings);
        });
    }
} 