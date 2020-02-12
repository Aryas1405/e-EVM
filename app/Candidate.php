<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function party()
    {
        return $this->belongsTo('App\Party');
    }
    public function district()
    {
        return $this->belongsTo('App\District');
    }
}
