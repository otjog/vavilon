<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['id', 'active', 'name', 'description'];

    public function getLastActiveNews()
    {
        return self::where('active', 1)
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get();
    }
}
