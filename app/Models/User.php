<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use SmartCrowd\Rbac\Traits\AllowedTrait;
use SmartCrowd\Rbac\Contracts\Assignable;
use Illuminate\Support\Facades\Auth;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract, Assignable
{
    use Authenticatable, CanResetPassword, AllowedTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'email', 'password', 'school_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * Return user school
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    /**
     * Return user class
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userClass()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id');
    }

    /**
     * Return a collection of user roles
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * Return array of role
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getAssignments()
    {
        return [$this->roles()->first()->role_slug];
    }

    /**
     * Return tasks that user created
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    /**
     * Return courses, where user is author.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests()
    {
        return $this->hasMany('App\Models\Test');
    }

    public function marks()
    {
        return $this->hasMany(\App\Models\Mark::class);
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->name + ' ' + $this->last_name;
    }

    /**
     * @param $id
     * @return string
     */
    public static function getUserFullNameById($id)
    {
        $user = self::find($id);
        return $user->name . ' ' . $user->last_name;
    }

    /**
     * @param $id
     * @param $user
     * @return bool
     */
    public function isUserMemberOfCourse($id, $user)
    {
        $course = (new Course())->find($id);
        if ($course->members()->get()->contains($user->id)){
            return true;
        }
        return false;
    }

    /**
     * @param Course $course
     * @return bool
     */
    public function isAuthor(Course $course)
    {
        $authorId = $course->author()->get()->first()->id;
        if ($authorId == Auth::user()->id){
            return true;
        }
        return false;
    }
}
