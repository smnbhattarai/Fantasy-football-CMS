<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinnerPrediction extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }



}
