<?php

    namespace App\Facade;

    use Illuminate\Support\Facades\Facade;

    /**
     * Class CaseRepository
     * @package App\Facade
     */
    class UserRepository extends Facade
    {
        /**
         * @return string
         */
        protected static function getFacadeAccessor(): string
        {
            return 'UserRepository';
        }
    }
