<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function candidates()
    {
        return $this->hasMany('App\Candidate');
    }
    public function voters()
    {
        return $this->hasMany('App\Voter');
    }
}