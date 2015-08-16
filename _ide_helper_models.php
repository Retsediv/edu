<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Role
 *
 * @property integer $id 
 * @property string $role_name 
 * @property string $role_slug 
 * @property-read \App\Models\User $user 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereRoleName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereRoleSlug($value)
 */
	class Role {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @property integer $id 
 * @property string $name 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Town[] $towns 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Region whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Region whereName($value)
 */
	class Region {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property integer $id 
 * @property string $name 
 * @property string $last_name 
 * @property string $email 
 * @property string $password 
 * @property string $avatar 
 * @property integer $role_id 
 * @property integer $school_id 
 * @property string $remember_token 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \App\Models\Role $role 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRoleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSchoolId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 */
	class User {}
}

namespace App\Models{
/**
 * App\Models\Town
 *
 * @property integer $id 
 * @property string $name 
 * @property integer $region_id 
 * @property-read \App\Models\Region $townRegion 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\School[] $schools 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Town whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Town whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Town whereRegionId($value)
 */
	class Town {}
}

namespace App\Models{
/**
 * App\Models\School
 *
 * @property integer $id 
 * @property string $name 
 * @property integer $town_id 
 * @property-read \App\Models\Town $schoolTown 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\School whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\School whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\School whereTownId($value)
 */
	class School {}
}

