<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    public $timestamps = false;

    protected $guarden = ['id'];

    protected $fillable = ['title', 'body', 'user_id'];

    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function authorCheck(User $user)
    {
        if($user->id == $this->user_id){
            return true;
        }

       return false;
    }

}
