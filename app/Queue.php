<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
    public function questions()
    {
        return $this->hasMany('App\QueueQuestion');
    }
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
