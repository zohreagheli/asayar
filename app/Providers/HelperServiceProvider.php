<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $file = app_path('Helpers/negovid_helpers.php');
        if (file_exists($file)) {
            require_once $file;
        }
    }
}
