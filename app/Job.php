<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable=[
        'worker_id',
        'client_id',
        'status_id',
        'name',
        'description',
        'price',
        'time_end',
        'image_before',
        'image_after',
    ];
    public function status(){
        return $this->belongsTo('App\Statuses','status_id','id');
    }
    public function worker(){
        return $this->belongsTo('App\User','worker_id','id');
    }
    public function client(){
        return $this->belongsTo('App\User','client_id','id');
    }
}
