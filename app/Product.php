<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(image::class, 'imageable');
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
    public function scopeUnPublished($query)
    {
        return $query->whereIsPublished(null)->orWhere('count',0);
    }
    public function scopePublished($query)
    {
        return $query->whereIsPublished('on')->where('count', '>', 0);
    }
    public function scopeHasDiscount($query)
    {
        return $query->where('discount', '>', 0);
    }
    public function scopeOffer($query)
    {
        return $query->whereIsOffer('on');
    }
    public function getDiscountPriceAttribute()
    {
        return $this->price - ($this->price * ($this->discount/100));
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('name','LIKE','%'. $search . '%')
            ->orWhere('price','LIKE','%'. $search . '%')
            ->orWhere('description','LIKE','%'. $search . '%');
    }

}
