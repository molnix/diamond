<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifiedEmail extends Model
{
    protected $fillable=[
        'user_id',
        'email_verified_token',
    ];
}
