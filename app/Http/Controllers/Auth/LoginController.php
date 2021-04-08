<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
//        $this->middleware('auth');
    }

    protected function authenticated(Request $request, $user)
    {
//        dd($user);
//        $id = $user->id;
        if ($user->hasRole('Admin'))
        {
//            return redirect('adminDashboard');

            return redirect()->route('adminDashboard');
//            return response()->json(['status' => 1,'url'=>route('adminDashboard')]);


//            return view('superadmin.dashboard');
        }
        elseif ($user->hasRole('Employer'))
        {
            return redirect()->route('employeedashboard', encrypt($user->id));

//            return response()->json(['status' => 1,'url'=>route('employeedashboard', encrypt($user->id))]);
//            return redirect()->route('employee/dashboard/', $user->id);
        }
        elseif ($user->hasRole('Candidate'))
        {
//            return response()->json(['status' => 1,'url'=>route('edit_profile', $user->id)]);

//            return redirect('/candidate/dashboard', $user->id);
            return redirect()->route('edit_profile', $user->id);

        }
        elseif ($user->hsRole('Sub Admin'))
        {
            return redirect()->route('subAdminDashboard');
        }
        else
        {
//            return redirect()->route('welcome');
//            return response()->json(['status' => 0, 'message'=> 'Invalid Credentials']);
//
            return redirect()->back()->with('message', 'Invalid Credentials');
        }
    }
}
