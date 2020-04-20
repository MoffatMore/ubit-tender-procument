<?php

    namespace App\Providers;

    use App\Http\View\TenderComposer;
    use App\Mixins\StrMixins;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Str;

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
            //
            //custom string mixins
            Str::mixin(new StrMixins());
            View::composer(['procurement.*', '*'], TenderComposer::class);
        }
    }
