<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function usergroups()
    {
        return $this->hasMany('App\UserGroup');
    }
    public function forms()
    {
        return $this->hasMany('App\Form');
    }
}
