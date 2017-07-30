<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function optiongroup()
    {
        return $this->belongsTo('App\OptionGroup');
    }
}
