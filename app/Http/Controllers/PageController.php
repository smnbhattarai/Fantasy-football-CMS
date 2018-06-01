<?php

namespace App\Http\Controllers;

use App\Match;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\UserScore;


class PageController extends Controller
{

    public function index(){
        $top_users = UserScore::orderBy('score', 'desc')->take(20)->get();
        $matches = Match::where('match_date', '>=', Carbon::now())->orderBy('match_date', 'asc')->take(5)->get();
        return view('welcome', compact('matches', 'top_users'));
    }
}
