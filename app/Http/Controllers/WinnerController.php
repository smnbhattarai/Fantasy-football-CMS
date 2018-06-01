<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Winner;
use Illuminate\Support\Facades\DB;

class WinnerController extends Controller
{

    public function addWinner(Request $request) {
        $winner = $request->winner;
        $match = $request->match_id;
        $match_found = Winner::where('match', $match)->take(1)->get();
        if(count($match_found) > 0) {
            // Edit the match result
            $id = $match_found[0]->id;
            DB::table('winners')->where('id', $id)->update(['match' => $match, 'winner' => $winner]);
            return "Winner updated";
        } else {
            // Create new result
            $winnerI = new Winner();
            $winnerI->match = $match;
            $winnerI->winner = $winner;
            $winnerI->save();
            return "Winner Added";
        }
    }

}
