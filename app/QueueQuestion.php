<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueueQuestion extends Model
{
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
