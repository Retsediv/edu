<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    public $fillable = ['user_id', 'title', 'description', 'image'];

    /**
     * Return an author of a course
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Return a members of course
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany('App\Models\User', 'course_member', 'course_id', 'user_id');
    }

    /**
     * Return all lessons of course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany('App\Models\CourseLesson');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'course_member', 'course_id', 'user_id');
    }

    /**
     * @param Course $course
     * @return string
     */
    public static function getAuthorFullName(Course $course)
    {
        $author = $course->author()->get()->first();

        return $author->name . ' ' . $author->last_name;
    }
}
