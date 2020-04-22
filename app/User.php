<?php

    namespace App;

    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Spatie\Permission\Traits\HasRoles;

    class User extends Authenticatable
    {
        use Notifiable, HasRoles;


        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'email', 'password', 'organisation_id',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        public function organisation(): BelongsTo
        {
            return $this->belongsTo(Organisation::class);
        }

        public function tenders(): HasMany
        {
            return $this->hasMany(Tender::class);
        }

        public function bids(): HasMany
        {
            return $this->hasMany(Bidding::class);
        }

        public function award()
        {
            return $this->hasMany(Awards::class);
        }
    }
