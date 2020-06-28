<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Brand::class);
    }
    public function products()
    {
        return $this->belongsToMany(Brand::class);
    }
}
