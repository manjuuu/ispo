<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskResponse extends Model
{
    protected $casts = [
      'response_attributes' => 'array',
    ];
}
