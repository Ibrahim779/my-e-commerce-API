<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function scopeCategoriesById($query, $category)
    {
        return $query->whereHas('categories', function ($q) use($category){
            $q->where('category_id', $category);
        });
    }

}
