<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\VarDumper\Dumper\esc;

class RegisterController extends Controller
{
    protected function register(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Username' => 'required|string|max:255',
                'agreeterms' => 'required',
                'accountTypeUser' => 'required',
                'UserEmail' => 'required|unique:users,email',
                'user_password' => 'required|confirmed|min:8',
            ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with('errorUser','invalid')
                ->withInput();
        }
        else
        {
            $agreement = '';
            if($request['agreeterms'] == true)
            {
                $agreement = 1;
            }
            elseif($request['agreeterms'] == false)
            {
                $agreement = 0;
            }
            $userid =  User::create([
                'name' => $request['Username'],
                'email' => $request['UserEmail'],
                'password' => Hash::make($request['user_password']),
                'agreement' => $agreement,

            ]);

            if($request->accountTypeUser == 'Employer')
            {
                $data1=array('role_id'=>'2',"model_type"=>'App\User',"model_id"=>$userid->id);
                DB::table('model_has_roles')->insert($data1);
            }
            elseif($request->accountTypeUser == 'Candidate')
            {
                $data1=array('role_id'=>'3',"model_type"=>'App\User',"model_id"=>$userid->id);
                DB::table('model_has_roles')->insert($data1);
            }

            return redirect()->back()->with('success', 'Registered Successfully, Login to proceed');
        }

    }
}
