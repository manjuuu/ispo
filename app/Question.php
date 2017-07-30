<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function form()
    {
        return $this->belongsTo('App\Form');
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
