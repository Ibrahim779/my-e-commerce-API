<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(image::class, 'imageable');
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function scopeNotAllow($query)
    {
        return $query->whereStatus(0);
    }
    public function scopeHasDiscount($query)
    {
        return $query->where('discount', '>',0);
    }
}
