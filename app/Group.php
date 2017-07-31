<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function group()
    {
        return $this->belongsToMany('App\Group');
    }
    public function forms()
    {
        return $this->hasMany('App\Form');
    }
}
