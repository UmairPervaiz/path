<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

//    protected $redirectTo = RouteServiceProvider::HOME;
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'agreeterms' => ['required'],
            'accounttype' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return RedirectResponse
     */
    protected function create(array $data)
    {
        $agreement = '';
        if($data['agreeterms'] == true)
        {
            $agreement = 1;
//            dd('true');
        }
        elseif($data['agreeterms'] == false)
        {
            $agreement = 0;
        }

        $userid =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'agreement' => $agreement,

        ]);
        if($data['accounttype'] == 'Employer')
        {
            $data1=array('role_id'=>'2',"model_type"=>'App\User',"model_id"=>$userid->id);
            DB::table('model_has_roles')->insert($data1);
//            $data2=array('permission_id'=>'1',"model_type"=>'App\User',"model_id"=>$userid->id);
//            DB::table('model_has_permissions')->insert($data2);
        }
        elseif($data['accounttype'] == 'Candidate')
        {
            $data1=array('role_id'=>'3',"model_type"=>'App\User',"model_id"=>$userid->id);
            DB::table('model_has_roles')->insert($data1);
//            $data2=array('permission_id'=>'2',"model_type"=>'App\User',"model_id"=>$userid->id);
//            DB::table('model_has_permissions')->insert($data2);
        }
        return $userid;
    }

//    protected function registered(Request $request, $user)
//    {
//        $id = $user->id;
////        dd($id);
//        if ($user->hasRole('Admin'))
//        {
//            return redirect('home');
////            return view('superadmin.dashboard');
//        }
//        elseif ($user->hasRole('Employer'))
//        {
////            return redirect('/employee/dashboard');
//            return redirect()->route('employeedashboard', encrypt($user->id));
//        }
//        elseif ($user->hasRole('Candidate'))
//        {
////            return redirect('/candidate/dashboard');
////           return redirect()->route('edit_profile',  $id );
//           return redirect()->route('candidatedashboard', $user->id);
//        }
//        else
//        {
////            return redirect('/welcome');
//            return redirect()->back();
//        }
//    }
}
