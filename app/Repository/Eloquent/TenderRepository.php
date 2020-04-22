<?php

    namespace App\Repository\Eloquent;

    use App\Awards;
    use App\Bidding;
    use App\Facade\BiddingRepository;
    use App\Repository\TenderRepositoryInterface;
    use App\Tender;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;

    class TenderRepository extends AbstractBaseRepository implements TenderRepositoryInterface
    {
        public function __construct(Tender $model)
        {
            parent::__construct($model);
        }

        public function publishTender($args)
        {
            return $this->create(
                [
                    'name' => $args->tender_name,
                    'user_id' => Auth::user()->id,
                    'reference_no' => $args->reference_no,
                    'requirements' => $args->requirements,
                    'proc_dept' => $args->proc_dept,
                    'start_time' => $args->start_time,
                    'end_time' => $args->end_time,
                ]
            );
        }

        public function getTenders()
        {
            if (Auth::check()) {
                $tenders = $this->model->where('user_id', Auth::user()->id)->get();
                return $tenders->load('bids');
            }
            return null;
        }

        /**
         * @return mixed
         */
        public function availableTenders()
        {
            $tenders = $this->model->where('end_time', '>=', now())->get();
            $tenders = $tenders->load('user', 'user.organisation', 'bids');
            $availableTenders = array();
            foreach ($tenders as $tender) {
                $bid = Bidding::where('tender_id', $tender->id)
                    ->where('user_id', Auth::user()->id)
                    ->first();

                if ($bid && $bid->count() > 0) {
                    continue;
                } else {
                    $availableTenders[] = $tender;
                }
            }

            return $availableTenders;
        }

        public function awardTender($tender_id)
        {
            $bid = BiddingRepository::getHighestBid($tender_id);
            if ($bid && $bid->count() > 0) {
                $award = Awards::create([
                    'tender_id' => $tender_id,
                    'user_id' => $bid->user_id,
                    'score' => $bid->score
                ]);
                if ($award) {
                    $this->update($tender_id, [
                        'status' => 'evaluated'
                    ]);
                }
                return $award;
            }
            return false;
        }

        /**
         * @param int   $id
         * @param array $attributes
         *
         * @return bool|Model
         */
        public function update($id, array $attributes)
        {
            return $this->find($id)->update($attributes);
        }
    }
