<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    //
    protected $fillable = [
        'name',
        'contact',
        'email',
        'location'
    ];

    public function tenders()
    {
        return $this->hasManyThrough(
            Tender::class,
            User::class,
        );
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
