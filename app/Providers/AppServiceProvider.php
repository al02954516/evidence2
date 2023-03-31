<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('required_or_boolean', function ($attribute, $value, $parameters, $validator) {
            if (is_bool($value)) {
                return true;
            }

            $validator->addReplacer('required_or_boolean', function ($message, $attribute, $rule, $parameters) {
                return str_replace(':boolean', $parameters[0], $message);
            });

            return !empty($value);
        });
    }
}
