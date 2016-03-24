<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\AddSchoolFormRequest;
use App\Models\Region;
use App\Models\Role;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddSchoolController extends Controller
{
    /**
     * Display a form to add a new school to database
     *
     * @return View
     */
    public function index()
    {
        $roles = Role::all();
        $regions = Region::all();

        return view('auth.addschool', ['roles' => $roles, 'regions' => $regions]);
    }

    /**
     * Store a new school.
     *
     * @param AddSchoolFormRequest $request
     * @return Response
     */
    public function addSchool(AddSchoolFormRequest $request)
    {
        $school = School::create([
            'name' => $request->school,
            'town_id' => $request->town
        ]);

        $user = new AuthController();

        $data = $request->all();
        $data['class'] = -1;
        $data['role'] = 1;
        $data['school'] = $school->id;
        $data['is_moderated'] = 1;
        $user->create($data);

        return redirect(route('home'));
    }


}
