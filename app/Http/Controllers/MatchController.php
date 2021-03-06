<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Match;
use Illuminate\Support\Facades\Session;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('country_name', 'asc')->get();
        $matches = Match::orderBy('id', 'asc')->get();
        return view('admin.match.index', compact('teams', 'matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::orderBy('country_name', 'asc')->get();
        $matches = Match::orderBy('id', 'asc')->get();
        return view('admin.match.index', compact('teams', 'matches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'team_one' => 'required',
            'team_two' => 'required',
            'match_date' => 'required',
            'group_level' => 'required'
        ]);

        $match = new Match();
        $match->team_one = $request->team_one;
        $match->team_two = $request->team_two;
        $match->match_date = $request->match_date;
        $match->match_time = trim($request->match_time);
        $match->match_location = trim($request->match_location);
        $match->group_level = $request->group_level;

        if($match->save()) {
            Session::flash('success', 'Match added successfully.');
            return redirect()->back();
        } else {
            Session::flash('error', 'Oops! Something went wrong. Please try again.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::findOrFail($id);
        $teams = Team::orderBy('country_name', 'asc')->get();
        return view('admin.match.edit')->with('match', $match)->with('teams', $teams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'team_one' => 'required',
            'team_two' => 'required',
            'match_date' => 'required',
            'group_level' => 'required'
        ]);

        $match = Match::findOrFail($id);
        $match->team_one = $request->team_one;
        $match->team_two = $request->team_two;
        $match->match_date = $request->match_date;
        $match->match_time = trim($request->match_time);
        $match->match_location = trim($request->match_location);
        $match->group_level = $request->group_level;

        if($match->save()) {
            Session::flash('success', 'Match updated successfully.');
            return redirect()->back();
        } else {
            Session::flash('error', 'Oops! Something went wrong. Please try again.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getMatchTime(Request $request){
        return Match::where('match_time', 'like', '%' . $request->term . '%')->distinct()->take(10)->pluck('match_time');
    }


    public function getMatchLocation(Request $request){
        return Match::where('match_location', 'like', '%' . $request->term . '%')->distinct()->take(10)->pluck('match_location');
    }
}
