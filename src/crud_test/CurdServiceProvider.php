<?php

namespace CrudTest;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CurdServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadMigrationsFrom(base_path('crud_test/migrations'));

        $this->loadViewsFrom(base_path('crud_test/views'),'Crud');

        Route::middleware('web')
            ->group(base_path('crud_test/crud_routes.php'));
    }
}
