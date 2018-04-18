<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::component('components.listProject', 'listProject');
        Blade::component('components.cardProject', 'cardProject');
        Blade::component('components.cardTask', 'cardTask');
        Blade::component('components.header', 'header');
        Blade::component('components.avatar', 'avatar');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
