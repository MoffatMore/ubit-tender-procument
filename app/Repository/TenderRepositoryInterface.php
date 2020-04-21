<?php

    namespace App\Repository;

    interface TenderRepositoryInterface
    {
        public function publishTender($args);

        public function getTenders();

        public function availableTenders();
    }
