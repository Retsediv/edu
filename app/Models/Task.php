<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public $timestamps = false;

    protected $fillable = ['name', 'deadline', 'user_id'];

    public function getUserByTask()
    {
        return $this->belongsTo('App\Models\User');
    }
}
