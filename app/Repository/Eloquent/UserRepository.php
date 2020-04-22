<?php

    namespace App\Repository\Eloquent;

    use App\Awards;
    use App\Message;
    use App\Repository\UserRepositoryInterface;
    use App\User;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Facades\Auth;

    class UserRepository extends AbstractBaseRepository implements UserRepositoryInterface
    {
        public function __construct(User $model)
        {
            parent::__construct($model);
        }

        public function update(int $id, array $attributes): User
        {
            $user = $this->find($id);
            return $user->update($attributes);
        }

        /**
         * @param $id
         *
         * @return mixed
         */
        public function userSchedule($id)
        {
            // TODO: Implement userSchedule() method.
        }

        /**
         * @param $attributes
         *
         * @return mixed
         */
        public function sendQuery($attributes)
        {
            return Message::create($attributes);
        }

        /**
         * @return Collection
         */
        public function allUsers(): Collection
        {
            // TODO: Implement allUsers() method.
        }

        /**
         * @return mixed
         */
        public function myTenderAwards()
        {
            return Awards::where('user_id',Auth::user()->id)
                ->get()
                ->load(['tender','tender.user.organisation']);
        }

        /**
         * @return Collection
         */
        public function getLawyersOnly(): Collection
        {
            // TODO: Implement getLawyersOnly() method.
        }
    }
