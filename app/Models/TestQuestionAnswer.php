<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestionAnswer extends Model
{
    protected $table = 'test_question_answers';

    public function aQuestion(){
        return $this->belongsTo('App/Models/TestQuestion');
    }


}
