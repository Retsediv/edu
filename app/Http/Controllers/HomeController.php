<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function events()
    {
        return view('student.events');
    }
}
