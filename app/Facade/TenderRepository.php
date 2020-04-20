<?php

    namespace App\Facade;

    use Illuminate\Support\Facades\Facade;

    /**
     * Class CaseRepository
     * @package App\Facade
     */
    class TenderRepository extends Facade
    {
        /**
         * @return string
         */
        protected static function getFacadeAccessor(): string
        {
            return 'TenderRepository';
        }
    }
