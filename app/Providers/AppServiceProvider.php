<?php

namespace App\Providers;

use URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(env('APP_ENV',"production") !== 'local')
        {
            URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        setlocale(LC_TIME, config('app.locale'));
        Carbon::setLocale(config('app.locale'));
        date_default_timezone_set(config('app.timezone'));
    }
}
