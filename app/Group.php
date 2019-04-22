<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function group()
    {
        return $this->belongsToMany('App\Group');
    }
    public function forms()
    {
        return $this->hasMany('App\Form');
    }
    public function users()
    {
       return $this->belongsToMany('App\User', 'user_groups');
    }
}
