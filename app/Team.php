<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{


    public function setCountryCodeAttribute($value) {
        $this->attributes['country_code'] = strtoupper($value);
    }


    public function setCountryNameAttribute($value) {
        $this->attributes['country_name'] = ucwords($value);
    }
}
