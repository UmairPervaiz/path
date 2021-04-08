<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile()
    {
        $countries = DB::table('countries')->get();
        $categories = DB::table('employee_bussiness_categories')->get();

        return view('employer.pages.profile.profile', compact('countries','categories'));
    }

    public function saveProfile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'string|max:255|required',
            'phoneNo' => 'required',
            'companyWebAddress' => 'string|max:255|nullable',
            'category' => 'required',
            'aboutus' => 'required|string|between: 10,255',
            'new_password' => 'string|min:6|nullable|confirmed',
        ]);

        if ($request->current_password != ''){
            if (!(Hash::check($request->get('current_password'), Auth::user()->getAuthPassword())))
            {
                return redirect()->back()->with('error', 'Current password not matched');
            }
        }
        if ($request->new_password != ''){
            if (strcmp($request->get('current_password'),$request->get('new_password'))==0)
            {
                return redirect()->back()->with('error', 'Your current password cannot be same to new password');

            }
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }

        $categories  = implode(',',$request->category);

//        $all_users = DB::table('users')
//            ->join('model_has_roles', 'users.id','=','model_has_roles.model_id')
//            ->select('users.name','users.country_name')
//            ->where('model_has_roles.role_id', '=' ,2)
//            ->where('users.id', '!=' , Auth::user()->id)
//            ->where('users.id', '!=' ,1)
//            ->get();
//
//        foreach ($all_users as $all_user)
//        {
//            if($request->name === $all_user->name && $request->country_name === $all_user->country_name)
//            {
//                return redirect()->back()->with('error', 'Company name already present in our records for selected country');
//            }
//        }

        if( $request->hasFile('profile_avatar')) {
            $image = $request->file('profile_avatar');
            $path = public_path(). '/images/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $avatar  = $filename;

            DB::table('users')->where('id', Auth::user()->id)->update(array(
                'avatar' => $avatar,
            ));
        }

        DB::table('users')->where('id', Auth::user()->id)->update(array(
            'name' => $request->input(['name']),
            'phoneNo' => $request->input(['phoneNo']),
            'phoneNo2' => $request->input(['phoneNo2']),
            'companyPhoneNo' => $request->input(['companyPhoneNo']),
            'companyWebAddress' => $request->input(['companyWebAddress']),
            'category' => $categories,
            'aboutus' => $request->input(['aboutus']),
            'facebooklink' => $request->input(['facebooklink']),
            'twitterlink' => $request->input(['twitterlink']),
            'goooglelink' => $request->input(['goooglelink']),
        ));

        if ($request->input('new_password') != null || $request->input('new_password') != '')
        {
            DB::table('users')->where('id', Auth::user()->id)->update([
               'password' =>  Hash::make($request->input('new_password'))
            ]);
        }

        return redirect()->route('employerDashboard')->with('success', 'Profile Edited successfully');
    }

}
