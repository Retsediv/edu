<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Town extends Model
{
    public function townRegion()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function schools()
    {
        return $this->hasMany('App\Models\School');
    }

}
