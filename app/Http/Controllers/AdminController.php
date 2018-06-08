<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index() {
        $users = User::all();
        $teams = DB::table('teams')->count();
        $matches = DB::table('matches')->count();
        return view('admin.dashboard', compact('users', 'teams', 'matches'));
    }

}
