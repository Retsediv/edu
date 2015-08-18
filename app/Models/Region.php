<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Region extends Model
{
    protected $fillable = ['name'];

    public function towns()
    {
        return $this->hasMany('App\Models\Town');
    }
}
