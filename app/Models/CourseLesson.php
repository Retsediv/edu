<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    protected $table = 'course_lessons';

    protected $guarden = ['id'];

    protected $fillable = ['title', 'course_id', 'test_id', 'body'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
