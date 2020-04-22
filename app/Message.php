<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Message extends Model
    {
        //
        protected $fillable = [
            'tender_id',
            'user_id',
            'message',
        ];

        public function tender()
        {
            return $this->belongsTo(Tender::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }
