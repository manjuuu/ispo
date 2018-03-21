<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLock extends Model
{
    protected $fillable = ['task_id', 'user_id'];
}
