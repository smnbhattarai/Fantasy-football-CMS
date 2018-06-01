<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserScore extends Model
{

    public function userDetail($userId){
        $user = User::where('id', $userId)->take(1)->get();
        return $user;
    }
}
