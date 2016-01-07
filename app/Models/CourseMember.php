<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseMember extends Model
{
    protected $table = 'course_member';

    protected $fillable = ['course_id', 'user_id'];
}
