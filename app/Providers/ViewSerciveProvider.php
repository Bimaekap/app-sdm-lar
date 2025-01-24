<?php

namespace App\Providers;

use App\Models\User;
use App\Models\KategoriCuti;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewSerciveProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('users', User::all());
            $view->with('userpaginate', User::query()->paginate());
        });
    }
}
