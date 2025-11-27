<?php

namespace App\Providers;
use Livewire\Livewire;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('jdate', function ($attribute, $value, $parameters) {
            try {
                Jalalian::fromFormat($parameters[0] ?? 'Y-m-d', $value);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        });
        Livewire::component('sidebar-toggle', \App\Http\Livewire\SidebarToggle::class);
    }

}
