<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Api\Dmm\DmmProperty;
use App\Api\Dmm\DmmApi;
use App\Actress;
use App\Item;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('DmmApi', function($app, $array) {
        $dmmProperty = new DmmProperty($array['hits'], $array['offset'], $array['actress_id'], $array['keyword'], $array['sort'], $array['initial']);
        return new DmmApi($dmmProperty);
      });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
