<?php

    namespace App\Repository;

    interface TenderRepositoryInterface
    {
        public function publishTender($args);

        public function getTenders();

        public function availableTenders();

        public function awardTender($tender_id);
    }
