<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable=[
        'user_id',
        'new_message',
        'tracked',
    ];

    public function messages(){
        return $this->hasMany('App\Message');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
