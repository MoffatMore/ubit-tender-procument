<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Awards extends Model
    {
        //
        protected $fillable = [
            'tender_id',
            'user_id',
            'score'
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
