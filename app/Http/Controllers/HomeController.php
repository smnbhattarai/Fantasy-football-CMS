<?php

namespace App\Http\Controllers;

use App\WinnerPrediction;
use Illuminate\Http\Request;
use App\Team;
use App\Match;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predictions = WinnerPrediction::where('user_id', Auth::id())->get();
        $score = 0;
        foreach($predictions as $prediction){
            $score = $score + $prediction->score;
        }
        $teams = Team::orderBy('country_name', 'asc')->get();
        $matches = Match::orderBy('match_date', 'asc')->get();
        return view('home', compact('teams', 'matches', 'score'));
    }
}
