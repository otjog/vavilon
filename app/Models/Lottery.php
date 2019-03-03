<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    public function keys()
    {
        return $this->belongsTo('App\Models\Key');
    }
}
