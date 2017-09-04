<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ValidationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('file_exists', function ($attribute, $value, $parameters, $validator) {
            return Storage::disk($parameters[0])->exists('files' . $value);
        });

        Validator::extend('auth_user_own_shop', function ($attribute, $value, $parameters, $validator) {
            $shop = \App\Models\UserShops::find($value);
            return $shop ? $shop->user_id == auth()->id() : false;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
