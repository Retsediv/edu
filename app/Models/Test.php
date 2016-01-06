<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    public function questions(){
        return $this->hasMany('App\Models\TestQuestion');
    }

    public function answers(){
        return $this->hasMany('App/Models/TestQuestionAnswer');
    }

}
