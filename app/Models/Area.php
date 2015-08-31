<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    protected $fillable = ['name', 'region_id'];

    public $timestamps = false;

    public function towns()
    {
        return $this->hasMany('App\Models\Town');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }
}
