<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);

        $currency = \Session::get('currency');
        $default_currency = \config('currency.default');
        
        \View::share('currency', $currency);
        \View::share('default_currency', $default_currency);

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
