<?php


    namespace App\Repository\Eloquent;


    use App\Bidding;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;

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
            return $this->create($customer);
        }

        /**
         *
         */
        public function getMyBids()
        {
            return $this->model->where('user_id', Auth::user()->id)
                ->get()
                ->load(['tender', 'tender.user.organisation']);
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
         * @return mixed
         */
        public function getHighestBid($tender_id)
        {
            $highestBid = $this->model->where('tender_id', $tender_id)
                ->orderBy('score', 'desc')
                ->first();
            $highestBid = $highestBid->load(['user','user.organisation']);
            return $highestBid;
        }
    }