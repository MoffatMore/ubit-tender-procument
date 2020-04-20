<?php

namespace App\Repository\Eloquent;

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

    public function update($id, array $attributes): Model
    {
        $tender = $this->find($id);
        return $tender;
    }
    public function publishTender($args)
    {
        return $this->create(
            [
                'name'         => $args->tender_name,
                'user_id'      => Auth::user()->id,
                'reference_no' => $args->reference_no,
                'requirements' => $args->requirements,
                'proc_dept'    => $args->proc_dept,
                'start_time'   => $args->start_time,
                'end_time'     => $args->end_time,
            ]
        );
    }

    public function getTenders()
    {
        if (Auth::check()){
            $tenders = $this->model->where('user_id', Auth::user()->id)->get();
            return $tenders->load('bids');
        }
        return null;
    }

}
