<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    //
    protected $fillable = [
        'user_id',
        'tender_id',
        'status',
        'qualification'
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
