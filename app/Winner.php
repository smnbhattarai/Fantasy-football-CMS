<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    public static function hasResult($matchId){
        if (Winner::where('match', '=', $matchId)->count() > 0) {
            return true;
        }
        return false;
    }
}
