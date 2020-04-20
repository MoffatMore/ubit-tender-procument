<?php


    namespace App\Facade;


    use Illuminate\Support\Facades\Facade;

    class BiddingRepository extends Facade
    {
        protected static function getFacadeAccessor(): string
        {
            return 'BiddingRepository';
        }
    }