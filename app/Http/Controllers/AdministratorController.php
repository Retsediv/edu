<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
       return view('admin.users');
    }

    /**
     * Api function to get all users from director's school
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers(Request $request)
    {
        $school_id = $request->user()->school_id;
        $users = User::where('school_id', '=', $school_id)->with('userClass', 'roles')->paginate(10);
//        dd($users);
        return response()->json($users);
    }
}
