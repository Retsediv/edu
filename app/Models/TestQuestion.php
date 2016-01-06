<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $table = 'test_questions';

    public function qTest(){
        return $this->belongsTo('App/Models/Test');
    }

    public function answers(){
        return $this->hasMany('\App\Models\TestQuestionAnswer');
    }
}
