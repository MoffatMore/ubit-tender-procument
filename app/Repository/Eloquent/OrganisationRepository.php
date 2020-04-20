<?php

    namespace App\Repository\Eloquent;

    use App\Organisation;
    use App\Repository\TenderRepositoryInterface;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Collection;

    class OrganisationRepository extends AbstractBaseRepository implements TenderRepositoryInterface
    {
        public function __construct(Organisation $model)
        {
            parent::__construct($model);
        }

        public function update($id, array $attributes): Model
        {
            return $this->find($id);
        }

        public function addOrganisation($args)
        {
            return $this->create(
                [
                    'name' => $args->name,
                    'location' => $args->location,
                    'email' => $args->$args->email,
                    'contact' => $args->$args->contact,
                ]
            );
        }

        public function getTenders(): Collection
        {
            $user = auth()->user();
            return $this->model->where('id', $user->id);
        }
    }
