<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Tender extends Model
    {
        //

        protected $dates = [
            'end_time',
            'start_time',
            'created_at',
            'updated_at',
        ];

        protected $fillable = [
            'user_id',
            'name',
            'reference_no',
            'requirements',
            'proc_dept',
            'start_time',
            'end_time',
            'status',
        ];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function bids(): HasMany
        {
            return $this->hasMany(Bidding::class);
        }

    }
