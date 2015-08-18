<?php

namespace App\Models;

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
}
