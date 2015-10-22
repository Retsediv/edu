<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }


}
