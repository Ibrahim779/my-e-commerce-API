<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(image::class, 'imageable');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
