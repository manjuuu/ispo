<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function optiongroup()
    {
        return $this->belongsTo('App\OptionGroup');
    }
    public function parent($query)
    {
        return $query->whereIsNull('parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Option', 'parent_id', 'id');
    }
}
