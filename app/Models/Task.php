<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id', 'active', 'name', 'description', 'customer_id'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
