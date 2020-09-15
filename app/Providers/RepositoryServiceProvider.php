<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Todo\TodoRepository;
use App\Repositories\Todo\TodoRepositoryInterface;
use App\Repositories\UserActivationToken\UserActivationTokenRepository;
use App\Repositories\UserActivationToken\UserActivationTokenRepositoryInterface;
// use App\Repositories\PasswordReset\PasswordResetRepository;
// use App\Repositories\PasswordReset\PasswordResetRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
        $this->app->bind(UserActivationTokenRepositoryInterface::class, UserActivationTokenRepository::class);
        // $this->app->bind(PasswordResetRepositoryInterface::class, PasswordResetRepository::class);
    }

}
