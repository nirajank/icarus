<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application service
     *
     * @return void
     */
    public function boot()
    {
      $menuall=Menu::all();
        view()->share('menuall', $menuall);
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
