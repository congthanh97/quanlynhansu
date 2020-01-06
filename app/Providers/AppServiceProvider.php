<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\level;

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
         view()->composer('admin.header', function ($view) {
            $level =  new Level();
            $levels =  $level::getLevels();
            // $levels = Level::all();
            $view->with('levels',$levels);
        });
    }
}
