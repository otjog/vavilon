<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = ['name', 'phone', 'email', 'city'];

    public function keys()
    {
        return $this->hasMany('App\Models\Key');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function lotteries()
    {
        return $this->hasManyThrough('App\Models\Lottery', 'App\Models\Key');
    }

}
