<?php


    namespace App\Repository\Eloquent;


    use App\Bidding;
    use Illuminate\Database\Eloquent\Model;

    /**
     * Class BiddingRepository
     * @package App\Repository\Eloquent
     */
    class BiddingRepository extends AbstractBaseRepository implements \App\Repository\BiddingRepositoryInterface
    {

        /**
         * @inheritDoc
         */
        public function __construct(Bidding $model)
        {
            parent::__construct($model);
        }

        /**
         * @param int   $id
         * @param array $attributes
         *
         * @return Model
         */
        public function update(int $id, array $attributes): Model
        {
            // TODO: Implement update() method.
        }

        /**
         * @param $customer
         */
        public function bid($customer)
        {
            // TODO: Implement bid() method.
        }

        /**
         *
         */
        public function getMyBids()
        {
            // TODO: Implement getMyBids() method.
        }

        /**
         * @param $id
         * @param $score
         *
         * @return bool
         */
        public function setBidScore($id, $score): bool
        {
            $bid = $this->find($id);
            return $bid->update([
                'score' => $score
            ]);
        }

        /**
         *
         */
        public function getAward()
        {
            // TODO: Implement getAward() method.
        }
    }