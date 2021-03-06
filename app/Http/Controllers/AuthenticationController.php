<?php

namespace App\Http\Controllers;

use beinmedia\payment\Parameters\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

      $validator = Validator::make($request->all() , $rules);

          if ($validator->fails())
          {
              return \redirect()->route('welcome')->withErrors($validator)->withInput();
    //          ->withInput(Input::except('password'));
          }
          else
          {
              $userdata = array(
                  'email' => $request->email,
                  'password' => $request->password,
              );

              if (Auth::attempt($userdata))
              {
                  if (Auth::user()->hasRole('Admin'))
                  {
                      return redirect()->route('adminDashboard');
                  }
                  elseif (Auth::user()->hasRole('Sub Admin'))
                  {
                      return redirect()->route('subAdminDashboard');
                  }
                  elseif (Auth::user()->hasRole('Employer'))
                  {
                      $activeUser =  DB::table('active_users')->where('user_id',  Auth::user()->id)->first();
                      if (isset($activeUser))
                      {
                          DB::table('active_users')->where('user_id', $activeUser->user_id)->update([
                              'date' => DB::raw('CURRENT_TIMESTAMP')
                          ]);
                      }
                      else
                      {
                          DB::table('active_users')->insert([
                              'user_id' => Auth::user()->id,
                              'model_id' => 2,
                              'date' => DB::raw('CURRENT_TIMESTAMP')
                          ]);
                      }

//                      return redirect()->route('employeedashboard', encrypt(Auth::user()->id));
                      return redirect()->route('employerDashboard');
                  }
                  elseif (Auth::user()->hasRole('Candidate'))
                  {
                      $activeUser =  DB::table('active_users')->where('user_id',  Auth::user()->id)->first();

                      if (isset($activeUser))
                      {
                          DB::table('active_users')->where('user_id', $activeUser->user_id)->update([
                              'date' => DB::raw('CURRENT_TIMESTAMP')
                          ]);
                      }
                      else
                      {
                          DB::table('active_users')->insert([
                              'user_id' => Auth::user()->id,
                              'model_id' => 3,
                              'date' => DB::raw('CURRENT_TIMESTAMP')
                          ]);
                      }

//                      return redirect()->route('edit_profile', Auth::user()->id);
                      return redirect()->route('candidateDashboard');
                  }
              }
              else
              {
                  return \redirect()->route('welcome')->withInput()->with('warning','These credentials do not match our records.');
              }
          }
    }
}
