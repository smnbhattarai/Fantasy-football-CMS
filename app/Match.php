<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Match extends Model
{
    public function getGroupLevelAttribute($value)
    {
        return ucwords(str_replace('-', ' ', $value));
    }


    public function getTeam($teamId)
    {
        return Team::find($teamId);
    }


    public function winner($matchId) {
        return Winner::where('match', $matchId)->pluck('winner')->first();
    }

    public function userPrediction($matchId){
        return WinnerPrediction::where('user_id', Auth::id())->where('match_id', $matchId)->pluck('prediction')->first();
    }


    public function userScore($matchId){
        return WinnerPrediction::where('user_id', Auth::id())->where('match_id', $matchId)->pluck('score')->first();
    }


//    public function getMatchDateAttribute($date)
//    {
//        return Carbon::parse($date);
//    }
}
