<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OptionGroup extends Model
{    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
    public function options()
    {
        return $this->hasMany('App\Option');
    }
}
