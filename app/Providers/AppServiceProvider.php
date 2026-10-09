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
        $this->app->singleton(\App\Services\CartService::class, function ($app) {
            return new \App\Services\CartService($app->make(\Illuminate\Session\SessionManager::class));
        });

        $helperFile = app_path('Helpers/negovid_helpers.php');
        if (file_exists($helperFile)) {
            require_once $helperFile;
        }
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
