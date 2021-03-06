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
        
        Blade::component('components.header', 'header');
        Blade::component('components.avatar', 'avatar');
        Blade::component('components.deadline', 'deadline');

        Blade::component('components._list',  'list');

        Blade::component('components.cardTeam',    'cardTeam');
        Blade::component('components.cardProject', 'cardProject');
        Blade::component('components.cardTask',    'cardTask');
        Blade::component('components.cardTodo',    'cardTodo');


        Blade::component('forms.addProject', 'addProject');
        Blade::component('forms.addTeam',    'addTeam');
        Blade::component('forms.addUser',    'addUser');
        Blade::component('forms.addTask',    'addTask');
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
