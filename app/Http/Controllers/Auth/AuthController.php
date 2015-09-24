<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use App\Models\Region;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Town;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;



    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->redirectPath = '/';
    }

    /**
     * @return \Illuminate\View\View with list of regions
     */
    public function getRegister()
    {
        $regions = Region::all();
        $roles = Role::all();
        return view('auth.register', ['regions' => $regions, 'roles' => $roles]);
    }

    /**
     * @post region_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getArea()
    {
        $region_id = $_POST['region_id'];

        $region = new Region();
        $areas = $region::find($region_id)->areas;

        return Response::json($areas);
    }

    /**
     * @post $region_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTown()
    {
        $area_id = $_POST['area_id'];

        $towns = new Area();
        $towns = $towns::find($area_id)->towns;

        return Response::json($towns);
    }

    /**
     * @post $town_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSchool()
    {
        $town_id = $_POST['town_id'];
        $schools = new Town();
        $schools = $schools::find($town_id)->schools;

        return Response::json($schools);
    }

    /**
     * Get a validator for an incoming authentification request
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function authValidator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'last_name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|exists:roles,id',
            'region' => 'required',
            'area'  => 'required',
            'town' => 'required',
            'school' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'school_id' => $data['school'],
            'class' => $data['class']
        ]);


    }

    /**
     * Adding role for user in special table
     * @param array $data
     * @return RoleUser
     */
    public function createRoleUser(array $data)
    {
        RoleUser::create([
            'user_id' => User::all()->last()->id,
            'role_id' => $data['role']
        ]);
    }
}
