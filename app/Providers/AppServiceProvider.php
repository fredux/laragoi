<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    /**
     * Custom If Statements
     * Cria um if personalizado no blade para usar na view
    */
        Blade::if('admin', function () {
            $user = auth()->user();

            return $user->isAdmin();
        });
    }
}
