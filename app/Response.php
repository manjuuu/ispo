<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{  

    protected $fillable = ['response_request'];
    public function form()
    {
        return $this->belongsTo('App\Form');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $casts = [
      'response_request' => 'array',
      'response_attributes' => 'array',
    ];
}
