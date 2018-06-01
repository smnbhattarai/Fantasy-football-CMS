<?php

namespace App\Http\Controllers;

use App\User;
use App\UserScore;
use App\WinnerPrediction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserScoreController extends Controller
{
    public function calculateUserScore(Request $request) {
        $start = microtime(true);
        $users = User::all();
        $score = 0;
        foreach($users as $user) {
            $predictions = WinnerPrediction::where('user_id', $user->id)->get();
            foreach($predictions as $prediction) {
                $score = $score + $prediction->score;
            }
            $user_found = UserScore::where('user_id', $user->id)->take(1)->get();
            if($user_found->count() > 0){
                DB::table('user_scores')->where('user_id', $user->id)->update(['score' => $score, 'updated_at' => Carbon::now()]);
            } else {
                DB::table('user_scores')->insert(['user_id' => $user->id, 'score' => $score, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            }

        }
        $end = microtime(true);
        $time = $end - $start;
        $time = $time / 100000 . ' seconds';
        return view('admin.calculate_score')->with('scoretime', $time);
    }
}
