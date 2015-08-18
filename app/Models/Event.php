<?php

namespace App\Models;

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


}
