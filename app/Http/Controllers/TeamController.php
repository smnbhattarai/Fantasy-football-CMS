<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('country_name', 'ASC')->get();
        return view('admin.team.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::orderBy('country_name', 'ASC')->get();
        return view('admin.team.index')->with('teams', $teams);
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
            'country_code' => 'nullable|alpha',
            'country_name' => 'required|min:2',
            'country_flag' => 'nullable|url'
        ]);

        $team = new Team();
        $team->country_code = $request->country_code;
        $team->country_flag = $request->country_flag;
        $team->country_name = $request->country_name;
        if($team->save()) {
            Session::flash('success', 'Team added successfully.');
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
        //
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
        //
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

    /*
    * Get all team ajax request
    */
    public function getTeamAjax(Request $request) {
        $id = $request->id;
        $teams = Team::where('id', '!=', $id)->orderBy('country_name', 'asc')->get();
        return $teams;
    }
}
