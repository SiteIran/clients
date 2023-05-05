<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Validator;
use App\Rules\Mobile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Validator::extend('mobile', function ($attribute, $value, $parameters, $validator) {
            return (new Mobile)->passes($attribute, $value);
        });
    
    }
}
