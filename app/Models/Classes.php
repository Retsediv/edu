<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = ['name', 'school_id'];

    public $timestamps = false;

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }


}
