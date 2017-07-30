<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
