<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    ];
}
