<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    protected $fillable = ['title', 'description', 'allower', 'retry', 'per_page', 'user_id'];

    public function questions(){
        return $this->hasMany(TestQuestion::class);
    }

    public function scopeAllowed($query)
    {
        return $query->where('allowed','=',1);
    }


}
