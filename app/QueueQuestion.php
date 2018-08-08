<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QueueQuestion extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function queue()
    {
        return $this->belongsTo('App\Queue');
    }
    public function questiontype()
    {
        return $this->belongsTo('App\QuestionType', 'question_type_id', 'id');
    }
    public function optiongroup()
    {
        return $this->belongsTo('App\OptionGroup', 'option_group_id', 'id');
    }
}
