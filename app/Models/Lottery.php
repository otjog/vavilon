<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    protected $fillable = ['id', 'active', 'key_id', 'datetime'];

    public function keys()
    {
        return $this->belongsTo('App\Models\Key', 'key_id');
    }

    public function getLastLottery()
    {
        return self::where('active', 1)
            ->orderBy('created_at', 'desc')
            ->with('keys')
            ->first();
    }

    public function getLastLotteries($take = 3)
    {
        return self::where('active', 1)
            ->orderBy('created_at', 'desc')
            ->with('keys')
            ->take($take)
            ->get();
    }
}
