<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    protected $table='statuses';
    protected $fillable=[
        'name',
    ];

    public function job(){
        return $this->hasMany('App\Job','status_id','id');
    }
}
