<?php

namespace App\Providers;

use App\Http\Interfaces\User\IUserFind;
use App\Http\Interfaces\User\IUserStore;
use App\Http\Interfaces\User\IUserLogin;
use App\Http\Interfaces\User\IUserLogout;
use App\Http\Interfaces\User\IUserRegister;
use App\Repositories\User\UserFind;
use App\Repositories\User\UserStore;
use App\Services\User\UserLoginService;
use App\Services\User\UserLogoutService;
use App\Services\User\UserRegisterService;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setUser();
    }

    public function setUser()
    {
        $this->app->bind(IUserFind::class, UserFind::class);
        $this->app->bind(IUserStore::Class, UserStore::class);
        $this->app->bind(IUserLogin::class, UserLoginService::class);
        $this->app->bind(IUserLogout::class, UserLogoutService::class);
        $this->app->bind(IUserRegister::class, UserRegisterService::class);
    }
}
