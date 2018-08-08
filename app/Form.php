<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\GroupScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new GroupScope);
    }


    public function group()
    {
        return $this->belongsTo('App\Group');
    }
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function responses()
    {
        return $this->hasMany('App\Response');
    }
}
