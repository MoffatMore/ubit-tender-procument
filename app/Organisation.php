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
}
