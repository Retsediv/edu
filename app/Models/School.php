<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class School extends Model
{
    public function schoolTown()
    {
        return $this->belongsTo('App\Models\Town');
    }

}
