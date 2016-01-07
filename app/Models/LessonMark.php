<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonMark extends Model
{
    protected $table = 'lesson_mark';

    /**
     * Return a lesson by mark.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function markLesson()
    {
        return $this->belongsTo('App\Models\CourseLesson', 'lesson_id');
    }

    /**
     * Return an user, who get this mark.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function markUser()
    {
        return $this->belongsTo('App\Models\User');
    }
}
