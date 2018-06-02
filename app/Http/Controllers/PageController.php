<?php

namespace App\Http\Controllers;

use App\Match;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\UserScore;
use App\WinnerPrediction;
use Auth;
use App\Team;


class PageController extends Controller
{

    public function index(){
        $top_users = UserScore::orderBy('score', 'desc')->take(20)->get();
        $matches = Match::where('match_date', '>=', Carbon::now())->orderBy('match_date', 'asc')->take(5)->get();
        return view('welcome', compact('matches', 'top_users'));
    }


    public function myPrediction(){
        $predictions = WinnerPrediction::where('user_id', Auth::id())->get();
        $score = 0;
        foreach($predictions as $prediction){
            $score = $score + $prediction->score;
        }
        $teams = Team::orderBy('country_name', 'asc')->get();
        $matches = Match::orderBy('match_date', 'asc')->get();
        return view('pages.my_prediction', compact('teams', 'matches', 'score'));
    }


    public function matchResult(){
        $matches = Match::all();
        return view('pages.match_result', compact('matches'));
    }


    public function matchSchedule(){
        $matches = Match::all();
        return view('pages.match_schedule', compact('matches'));
    }
}
