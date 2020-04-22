<?php


    namespace App\Repository;


    interface BiddingRepositoryInterface
    {
        public function bid($customer);

        public function getMyBids();

        public function setBidScore($id, $score);

        public function getHighestBid($tender_id);
    }