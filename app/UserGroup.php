<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
