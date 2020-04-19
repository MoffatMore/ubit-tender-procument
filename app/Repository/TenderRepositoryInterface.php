<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface TenderRepositoryInterface
{
    public function publishTender($args): Collection;

    public function getTenders($id): Collection;
}
