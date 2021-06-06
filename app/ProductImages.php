<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable=[
        'product_id',
        'image_url',
    ];
}
