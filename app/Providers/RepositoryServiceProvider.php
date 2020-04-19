<?php

namespace App\Providers;

use App\Repository\Eloquent\AbstractBaseRepository;
use App\Repository\Eloquent\TenderRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\TenderRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * @class RepositoryProvider
 */
class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            EloquentRepositoryInterface::class,
            AbstractBaseRepository::class
        );
        $this->app->bind(TenderRepositoryInterface::class, TenderRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->singleton('TenderRepository', TenderRepositoryInterface::class);
        $this->app->singleton('UserRepository', UserRepositoryInterface::class);
    }
}
