<?php

namespace App\Repository\Eloquent;

use App\Repository\TenderRepositoryInterface;
use App\Tender;

class TenderRepository extends AbstractBaseRepository implements TenderRepositoryInterface
{
    public function __construct(Tender $tender)
    {
        parent::__construct($tender);
    }

    public function update(int $id, array $attributes)
    {
        # code...
    }
    public function publishTender($args)
    {
        return $this->create($args);
    }

    public function getTenders($id)
    {
    }
}
