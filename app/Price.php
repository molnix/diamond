<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable=[
        'name',
        'price',
        'work_type_id',
    ];
}
