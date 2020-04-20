<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasManyThrough;

    class Organisation extends Model
    {
        //
        protected $fillable = [
            'name',
            'contact',
            'email',
            'location',
        ];

        public function tenders(): HasManyThrough
        {
            return $this->hasManyThrough(
                Tender::class,
                User::class,
                'organisation_id',
                'user_id'
            );
        }

        public function users(): HasMany
        {
            return $this->hasMany(User::class);
        }
    }
