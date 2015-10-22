<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class School extends Model
{
    protected $fillable = ['name', 'town_id'];

    public $timestamps = false;

    public function schoolTown()
    {
        return $this->belongsTo('App\Models\Town');
    }

}
