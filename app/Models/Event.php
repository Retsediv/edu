<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    public $timestamps = false;

    protected $fillable = ['name', 'description', 'data_range', 'school_id', 'user_id'];

    public function getEventsBySchool($school_id)
    {
        $events = $this->where('school_id', '=', $school_id)->get();
        return $events;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function authorCheck(User $user)
    {
        if($this->user_id == $user->id){
            return true;
        }
        return false;
    }


}
