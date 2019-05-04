<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Schema;

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
<<<<<<< HEAD
        {
            Schema::defaultStringLength(191);
        }

}
=======
    {
        Schema::defaultStringLength(191);
    }
}
>>>>>>> 44b940b4d3142f24c359a0c5d8556b8cb561f5e8
