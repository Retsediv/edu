<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    public $timestamps = false;

    protected $fillable = ['title', 'body', 'user_id'];

    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }

}
