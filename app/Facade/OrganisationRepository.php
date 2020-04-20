<?php

    namespace App\Facade;

    use Illuminate\Support\Facades\Facade;

    /**
     * Class CaseRepository
     * @package App\Facade
     */
    class OrganisationRepository extends Facade
    {
        /**
         * @return string
         */
        protected static function getFacadeAccessor(): string
        {
            return 'OrganisationRepository';
        }
    }
