<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD

=======
use Illuminate\Pagination\Paginator;
>>>>>>> 9caac8dc45f3eaa383ea36ec2e8ec22d6f74fbff
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
<<<<<<< HEAD
        //
=======
        Paginator::useBootstrap();

>>>>>>> 9caac8dc45f3eaa383ea36ec2e8ec22d6f74fbff
    }
}
