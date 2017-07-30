<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionGroup extends Model
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
    public function options()
    {
        return $this->hasMany('App\Option');
    }
}
