<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopePending($query)
    {
        return $query->whereStatus('pending')->orWhere('status', 'prepared')->orWhere('status', 'delivered');
    }
    public function scopeCompleted($query)
    {
        return $query->whereStatus('completed');
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
