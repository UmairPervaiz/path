<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

//    public function welcome()
//    {
//        return redirect()->back();
//    }

//    public function dashboard()
//    {
//        $roles = auth()->user()->roles()->pluck('name');
//
//        if ($roles[0] == 'Admin') {
//            return view('done', compact("roles") );
//
//        }
//        elseif ($roles[0] == 'Employer')
//        {
//            return view('employee.index', compact("roles") );
//
//        }
//        elseif ($roles[0] == 'Candidate')
//        {
//            return view('done', compact("roles") );
//
//        }
//        else{
//            return view('error.error', compact("roles"));
//
//        }
//    }

}
