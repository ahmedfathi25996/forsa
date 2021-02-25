<?php

namespace App\Providers;

use App\Adapters\Implementation\PhoneValidationAdapter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('App\Adapters\IPhoneValidation', function ($app) {
            return new PhoneValidationAdapter();
        });

        #region  User & Auth
        $this->app->bind('App\Services\IUserService', 'App\Services\Implementation\UserService');
        $this->app->bind('App\Services\IAuthService', 'App\Services\Implementation\AuthService');
        $this->app->bind('App\Adapters\IUserAdapter', 'App\Adapters\Implementation\UserAdapter');
        #endregion

        #region  Setting
        $this->app->bind('App\Services\ISettingService', 'App\Services\Implementation\SettingService');
        $this->app->bind('App\Adapters\ISettingAdapter', 'App\Adapters\Implementation\SettingAdapter');
        #endregion


        #region doctors
        $this->app->bind('App\Services\IDoctorService', 'App\Services\Implementation\DoctorService');
        $this->app->bind('App\Adapters\IDoctorAdapter', 'App\Adapters\Implementation\DoctorAdapter');
        #endregion


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
