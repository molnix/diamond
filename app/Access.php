<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table='access';
    protected $fillable=[
        'name',
    ];
    public function users(){
        return $this->hasMany('App\User');
    }
}
