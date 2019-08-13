<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libraries\Helpers\DeclesionsOfWord;

class Lottery extends Model
{
    protected $fillable = ['id', 'active', 'key_id', 'datetime'];

    public function keys()
    {
        return $this->belongsToMany('App\Models\Key', 'lottery_has_key')->withTimestamps();
    }

    public function getLastLottery()
    {
        $lottery = self::where('active', 1)
            ->orderBy('created_at', 'desc')
            ->with('keys')
            ->first();

        if ($lottery !== null) {
            $lottery->shortListKeysQuantity = 4;

            $moreQuantity = count($lottery->keys) - $lottery->shortListKeysQuantity;

            if ($moreQuantity > 0) {
                $declisionOfWord = DeclesionsOfWord::make($moreQuantity, ['номер', 'номера', 'номеров']);
                $lottery->declisionKeysPhrase = "Ещё " . $moreQuantity . " " . $declisionOfWord;
            }
        }

        return $lottery;
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
