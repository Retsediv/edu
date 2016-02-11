<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CourseLesson extends Model
{
    protected $table = 'course_lessons';

    protected $guarden = ['id'];

    protected $fillable = ['title', 'course_id', 'test_id', 'body', 'published_at'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function getDates()
    {
        return ['published_at'];
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
        return $this->attributes['published_at'] = Carbon::parse($date)->format('Y-m-d');
    }
}
