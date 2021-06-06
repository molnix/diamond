<?php

namespace App;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $fillable=[
        'name','description','price', 'category_id',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function product_images(){
        return $this->hasMany('App\ProductImages');
    }
    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
