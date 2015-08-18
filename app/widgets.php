<?php
use Illuminate\Support\Facades\Auth;

Widget::register('sidebar', 'SidebarWidget');
Widget::register('header', 'HeaderWidget');

class SidebarWidget
{
    /**
     * Function, that return a sidebar with data about user
     * @return \Illuminate\View\View
     */
    public function register()
    {
        $user = Auth::user();
        return view('templates.sidebar', ['user' => $user]);
    }
}

class HeaderWidget
{
    public function register()
    {
        $user = Auth::user();
        return view('templates.header', ['user' => $user ]);
    }
}

