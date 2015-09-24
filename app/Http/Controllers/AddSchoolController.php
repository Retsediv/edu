<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function addSchool()
    {
        //
    }


}
