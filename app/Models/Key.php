<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = ['customer_id', 'key'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function lotteries()
    {
        return $this->hasMany('App\Models\Lottery');
    }
}