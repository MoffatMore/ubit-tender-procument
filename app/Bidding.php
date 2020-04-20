<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Bidding extends Model
    {
        //
        protected $table = 'bids';

        protected $fillable = [
            'user_id',
            'tender_id',
            'status',
            'score',
            'attachments',
            'qualification',
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function tender()
        {
            return $this->belongsTo(Tender::class);
        }
    }
