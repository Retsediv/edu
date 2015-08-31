<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Town extends Model
{
    protected $fillable = ['name', 'area_id'];

    public $timestamps = false;

    public function townArea()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function schools()
    {
        return $this->hasMany('App\Models\School');
    }

}
