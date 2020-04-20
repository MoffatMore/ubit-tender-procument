<?php

    namespace App\Providers;

    use App\Repository\BiddingRepositoryInterface;
    use App\Repository\Eloquent\AbstractBaseRepository;
    use App\Repository\Eloquent\BiddingRepository;
    use App\Repository\Eloquent\TenderRepository;
    use App\Repository\Eloquent\UserRepository;
    use App\Repository\EloquentRepositoryInterface;
    use App\Repository\TenderRepositoryInterface;
    use App\Repository\UserRepositoryInterface;
    use Illuminate\Support\ServiceProvider;

    /**
     * @class RepositoryProvider
     */
    class RepositoryServiceProvider extends ServiceProvider
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
                AbstractBaseRepository::class);
            $this->app->bind(TenderRepositoryInterface::class, TenderRepository::class);
            $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
            $this->app->bind(BiddingRepositoryInterface::class, BiddingRepository::class);
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
            $this->app->singleton('BiddingRepository', BiddingRepositoryInterface::class);
        }
    }
