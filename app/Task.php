<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class Task extends Model
{
    public function response()
    {
        return $this->hasOne('App\TaskResponse');
    }
    public function queue()
    {
        return $this->belongsTo('App\Queue');
    }
    public function importedBy()
    {
        return $this->belongsTo('App\User', 'created_user_id', 'id');
    }
    public function locks()
    {
        return $this->hasMany('App\TaskLock')->where('created_at', '>', Carbon::now()->subminutes(10))->where('user_id', '<>', Auth::id());
    }
    public function locked()
    {
        if($this->locks()->count() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    protected $casts = [
      'task_details' => 'array',
    ];
    protected $fillable = ['queue_id', 'task_details','created_user_id'];

}
