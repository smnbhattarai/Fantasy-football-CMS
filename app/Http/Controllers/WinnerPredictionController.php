<?php

namespace App\Http\Controllers;

use App\Winner;
use App\WinnerPrediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WinnerPredictionController extends Controller
{

    public function addPrediction(Request $request) {
        $winner = $request->winner;
        $match = $request->match_id;
        $prediction_found = WinnerPrediction::where('match_id', $match)->where('user_id', Auth::id())->take(1)->get();
        if(count($prediction_found) > 0) {
            // Edit the prediction result
            $id = $prediction_found[0]->id;
            DB::table('winner_predictions')->where('id', $id)->update(['prediction' => $winner]);
            return "Prediction Updated";
        } else {
            // Create new prediction
            $winnerI = new WinnerPrediction();
            $winnerI->user_id = Auth::id();
            $winnerI->match_id = $match;
            $winnerI->prediction = $winner;
            $winnerI->save();
            return "Prediction added";
        }
    }


    public function calculateScore(Request $request){
        if($request->isMethod('get')) {
            return view('admin.calculate_score');
        }

        if($request->isMethod('post')) {
            $start = microtime(true);
            $predictions = WinnerPrediction::all();
            foreach($predictions as $prediction) {
                    $id = $prediction->id;
                    $match = $prediction->match_id;
                    $userPrediction = $prediction->prediction;
                    $match_winner = Winner::where('match', $match)->take(1)->pluck('winner');
                    if($match_winner[0] == $userPrediction){
                        $score = 100;
                    } else {
                        $score = -25;
                    }
                    DB::table('winner_predictions')->where('id', $id)->update(['score' => $score]);
            }
            $end = microtime(true);
            $time = $end - $start;
            $time = $time / 100000 . ' seconds';
            return view('admin.calculate_score')->with('time', $time);
        }
    }
}
