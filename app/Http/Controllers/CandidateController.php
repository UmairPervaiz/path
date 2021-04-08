<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\Console\Input\Input;

class CandidateController extends Controller
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

    public  function dashboard($id)
    {
        $user_found = $id;

        $candidate_id = DB::table('users')->select()->where('id' , $user_found)->first();

        $mytime = Carbon::now();

        $skills = DB::table('candidate_skills')
        ->where('user_id', $id)
        ->get()
        ->pluck('skill');

        $skilledJobs = DB::table('job_skills')->whereIn('skill', $skills)
        ->groupBy('job_id')
        ->pluck('job_id');

        $candidate_information = DB::table('users as U')
        ->select('*')
        ->join('candidate_personal_informations as P', 'U.id', '=', 'P.user_id')
        ->join('candidate_abouts as A','U.id','=','A.user_id')
        ->where('U.id', $id)
        ->get();

        $jobs = array();

        foreach ($candidate_information as $candidate_information){
            $jobs = DB::table('jobs as J')->select('J.id', 'J.title', 'J.job_location', 'J.type', 'J.endingDate', 'J.salary')
            ->where('J.status','=','Active')
            ->whereIn('J.id', $skilledJobs)
            ->where('J.job_location', '=' , $candidate_information->location)
            ->where('J.candidate_nationality', '=' , $candidate_information->nationality)
            ->where('J.gender', '=' , $candidate_information->gender)
            ->where('J.experience', '=' , $candidate_information->experience)
            ->where('J.salary', '=' , $candidate_information->expected_salary)
            ->whereDate('J.endingDate','>=', $mytime)
            ->join('users as U', 'J.user_id', '=' , 'U.id')
            ->get();
        }


        return view('candidate.index', compact('jobs','user_found'));
    }

    public  function edit_profile($id)
    {
//        $user =DB::table('candidate_profiles')->where('user_id', $id)->first();
//        if ($user != '')
//        if ($user =DB::table('candidate_profiles')->where('user_id', $id)->first())
//        {
//            if ($user != '')
//            {
//
//
//            if (empty($user)) {
//                dd('in edit show view USER NOT FOUND');
////            return redirect('/employee/editprofile');
//                return redirect()->back()->with('message', 'User not found');
//            }
//
//            return view('candidate.edit_profile', compact('user'));
//            }
//        }
//
//        $user = DB::table('users')->select()->where('id',$id)->first();
//
//        if (empty($user)) {
//            dd('in edit show view USER NOT FOUND');
////            return redirect('/employee/editprofile');
//            return redirect()->back()->with('message', 'User not found');
//        }
//
//        return view('candidate.edit_profile_user', compact('user'));

        $user =DB::table('candidate_profiles')->where('user_id', $id)->first();



        return view('candidate.edit_profile', compact('user'));

    }
//
//    public function edit_profile_user($id)
//    {
//
//    }

    public function save_edit_profile(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);
//        dd($id_user->id);
        if (empty($id_user)) {
//            dd('user not found');
            return redirect()->back();
        }
        // dd($request->all());

        $validator = Validator::make($request->all(),[
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'full_name' => 'string|max:255|nullable',
            'phoneNo' => 'regex:/[0-9]{4}[0-9]{7}/ |nullable',
            'phoneNo2' => 'regex:/[0-9]{4}[0-9]{7}/ |nullable',
            'phoneNo3' => 'regex:/[0-9]{4}[0-9]{7}/ |nullable',
//            'phone' => 'phone_number',       AppServiceProvider (boot function)
//            'address' => 'string|max:255|nullable',
//            'industry_expertise' => 'string|max:255|nullable',
//            'about_me' => 'string|max:255|nullable',
            'new_password' => 'string|min:8|nullable|confirmed',
        ]);

//        dd($validator);
        if ($request->current_password != ''){
            if (!(Hash::check($request->get('current_password'), Auth::user()->getAuthPassword())))
            {
                return Redirect::back()->withErrors(['Current password not matched']);
            }
        }
        if ($request->new_password != ''){
            if (strcmp($request->get('current_password'),$request->get('new_password'))==0)
            {
//            dd('Your current password cannot be same to new password');
                return Redirect::back()->withErrors(['Your current password cannot be same to new password']);
//            return back()->with('error','Your current password cannot be same to new password');
            }
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user_id = $id_user->id;
        $inputavatar  = $request->input('avatar');
        // $inputfullname = $request->input('full_name');
        $inputphoneNo = $request->input('phoneNo');
        $inputphoneNo2 = $request->input('phoneNo2');
        $inputphoneNo3 = $request->input('phoneNo3');
//        $inputaddress = $request->input('address');
//        $inputindustry_expertise = $request->input('industry_expertise');
//        $inputabout_me = $request->input('about_me');
        $newpassword = $request->input('new_password');

        // dd($inputphoneNo2);
        $user_id_present = DB::table('candidate_profiles')->select()->where('user_id', $user_id)->first();
//        dd($user_id_present);
        if ($user_id_present != '')
        {
//            dd('in update function');

            $dataUpdate = DB::table('candidate_profiles')->where('user_id',$user_id)->update(array(
                'user_id' => $user_id,
                // 'avatar' => $avatar,
                // 'full_name' => $inputfullname,
                'phoneNo' => $inputphoneNo,
                'phoneNo2' => $inputphoneNo2,
                'phoneNo3' => $inputphoneNo3,

//                'address' => $inputaddress,
//                'industry_expertise' => $inputindustry_expertise,
//                'about_me' => $inputabout_me,
//            'password' => Hash::make($newpassword),
            ));



        }
//        DB::table()->updateOrInsert();
        else {
//            dd('in insert function');


            $dataUpdate = DB::table('candidate_profiles')->insert(array(
                'user_id' => $user_id,
                // 'avatar' => $avatar,
                // 'full_name' => $inputfullname,
                'phoneNo' => $inputphoneNo,
                'phoneNo2' => $inputphoneNo2,
                'phoneNo3' => $inputphoneNo3,
//                'address' => $inputaddress,
//                'industry_expertise' => $inputindustry_expertise,
//                'about_me' => $inputabout_me,
//            'password' => Hash::make($newpassword),
            ));

        }

        if( $request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $path = public_path(). '/images/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $avatar  = $filename;


            DB::table('users')->where('id', $user_id)->update(array(
                'avatar' => $avatar,
            ));
        }

        if ($request->new_password != '')
        {
            $dataUpdate = DB::table('users')->where('id', $id_user->id)->update(array(
                'password' => Hash::make($newpassword),
            ));
        }
//        dd('done');
        $user = DB::table('candidate_profiles')->select()->where('user_id', $id_user->id)->first();

//        return view('candidate.edit_profile',compact('user'));
        return \redirect()->action('CandidateController@edit_profile',['id'=>$user->user_id])->with('success','Profile edited successfully');

    }

    public function edit_resume($id)
    {
        $user1 = DB::table('users')->find($id);
//        dd($user);re
        if (empty($user1)) {
            dd('user not found');
            return redirect()->back();
        }
        $user = DB::table('candidate_abouts')->select()->where('user_id', $user1->id)->first();
        $user2 = DB::table('candidate_educations')->select()->where('user_id', $user1->id)->first();
        $user3 = DB::table('candidate_experiences')->select()->where('user_id', $user1->id)->first();
        $user4 = DB::table('candidate_personal_informations')->select()->where('user_id', $user1->id)->first();
        $user5 = DB::table('candidate_portfolios')->select()->where('user_id', $user1->id)->first();
        $user6 = DB::table('candidate_skills')->select()->where('user_id', $user1->id)->first();
        $user7 = DB::table('candidate_special_qualifications')->select()->where('user_id', $user1->id)->first();
        $user8 = DB::table('candidate_professional_skills')->select()->where('user_id', $user1->id)->first();
        $user9 = DB::table('candidate_skills')->select()->where('user_id', $user1->id)->first();
        $nationality = DB::table('nationalities')->select()->get();
        $country = DB::table('countries')->select()->get();
//        dd($user9);
        $category = DB::table('candidate_field_of_expertises')->select()->get();

        if (isset($user->country_of_interest) && isset($user->language))
        {
            $country_array = explode(',',$user->country_of_interest);

            $candidateLanguage = explode(',',$user->language);
        }

        else
            {
                $country_array[] = '';

                $candidateLanguage[] = '';
            }

//        dd($candidateLanguage);

        $job_experiences = DB::table('job_experiences')->get();

        $genders = DB::table('job_genders')->get();
        $maritalstatus = DB::table('candidate_marital_status')->get();
        $dependents = DB::table('candidate_dependents')->get();
        $qualifications = DB::table('job_qualifications')->get();
        $careerlevels = DB::table('job_career_levels')->get();
//        dd($careerlevels);
        $salaryranges = DB::table('job_salary_ranges')->get();
        $skills = DB::table('skills')->get();
//        if($user->field_of_expertise != ''){
        $category_array = '';
        $category_array1 = '';
        if(isset($user->field_of_expertise))
        {

            $category_array = explode(',',$user->field_of_expertise);
            $category_array1 = explode(',',$user->other_field_of_expertise);
        }
        else
        {
            $category_array = '';
            $category_array1 = '';
        }

       $candidateSkills = DB::table('candidate_skills')
       ->where('user_id', $user1->id)
       ->get();
//        dd($candidateSkills);
       $candidateEducations = DB::table('candidate_educations')
       ->where('user_id', $user1->id)
       ->get();

       $candidateExperiences = DB::table('candidate_experiences')
       ->where('user_id', $user1->id)
       ->get();

       $specialQualifications = DB::table('candidate_special_qualifications')
       ->where('user_id', $user1->id)
       ->get();

       $professionalSkills = DB::table('candidate_professional_skills')
       ->where('user_id', $user1->id)
       ->get();

       $candidatePortfolios = DB::table('candidate_portfolios')
       ->where('user_id', $user1->id)
       ->get();

       $candidatecountryname = DB::table('candidate_abouts')
       ->select('country_of_interest')
       ->where('user_id', $user1->id)
       ->get();

        $languages = DB::table('languages')
       ->select('*')
       ->get();

        return view('candidate.edit_resume', compact('user','user9','user2','user3','user4','user5',
                         'user6','user7','user8','genders','maritalstatus','dependents',
                         'qualifications','careerlevels','salaryranges','job_experiences','nationality','category',
                         'category_array','category_array1','country','skills', 'candidateSkills', 'candidateEducations',
             'candidateExperiences', 'specialQualifications', 'professionalSkills', 'candidatePortfolios','candidatecountryname','country_array'
        ,'languages','candidateLanguage'));
    }

    public function save_skills(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);

        if (empty($id_user)) {
            return redirect()->back();
        }

        $user_id = $id_user->id;

        DB::table('candidate_skills')
        ->where('user_id', $user_id)
        ->delete();

        // return $request->all();
        if($request->has('skills')){
            foreach ($request->skills as $key => $value) {
                DB::table('candidate_skills')->insert(array(
                    'user_id' => $user_id,
                    'skill' => $value
                ));
            }
        }



        if( $request->skill_name != null)
        {
            $string = preg_replace('/\.$/', '', $request->skill_name);
            $array = explode(', ', $string);
            foreach($array as $value)
            {
                $exists = DB::table('candidate_skills')
                ->where('user_id', $user_id)
                ->where('skill', $value)
                ->first();

                if(empty($exists) || $exists == null){
                    DB::table('candidate_skills')->insert(array(
                        'user_id' => $user_id,
                        'skill' => $value
                    ));
                }

            }
        }


        $user = DB::table('candidate_skills')->select()->where('user_id', $id_user->id)->first();
        return \redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id])->with('success','Resume edited successfully');
        // return redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id]);
    }

     public function save_edit_about_us(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);
//        dd($id_user->id);
        if (empty($id_user)) {
//            dd('user not found');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(),[
            'about' => 'string|max:255|nullable',
            'category' => 'string|max:255|nullable',
            'location' => 'string|max:255|nullable',
//            'country_of_interest' => 'string|max:255|nullable',
            'status' => 'string|max:255|nullable',
            'career_level' => 'string|max:255|nullable',
            'experience' => 'string|max:255|nullable',
            'salary' => 'string|max:255|nullable',
            'expected_salary' => 'string|max:255|nullable',
//            'gender' => 'string|max:255|nullable',
            'age' => 'string|max:255|nullable',
            'qualification' => 'string|max:255|nullable',
            'language' => 'required|nullable',
        ]);
//        dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

//        dd($request->country_of_interest);
        $temp  = implode(',',$request->country_of_interest);
        $tempLanguage  = implode(',',$request->language);
//        dd($temp);
//        $field_of_expertise  = implode(',',$request->field_of_expertise);
//        $other_field_of_expertise  = implode(',',$request->other_field_of_expertise);
//        $field_of_expertise_other  = implode(',',$request->otherAnswer);


        $user_id = $id_user->id;
        $inputabout  = $request->input('about');
        $inputcategory = $request->input('category');
        $inputlocation = $request->input('location');
//        $inputcountry_of_interest = $request->input('country_of_interest');
        $inputcountry_of_interest = $temp;
        $inputstatus = $request->input('status');
        $inputcareer_level = $request->input('career_level');
        $inputexperience = $request->input('experience');
        $inputsalary = $request->input('salary');
        $inputexpected_salary = $request->input('expected_salary');
        $inputgender = $request->input('gender');
        $age = $request->input('age');
        $qualification = $request->input('qualification');
//        $languages = $temp;
         $languages = $tempLanguage;
//        $expertise = $field_of_expertise;
//        $other_field_of_expertise = $other_field_of_expertise;
//        $otherExpertise = $field_of_expertise_other;

        $user_id_present = DB::table('candidate_abouts')->select()->where('user_id', $user_id)->first();

        if ($user_id_present!= '')
        {
            $userData = DB::table('candidate_abouts')->select()->where('user_id', $user_id)->update(array(
                'user_id' => $user_id,
                'about' => $inputabout,
                'category' => $inputcategory,
                'location' => $inputlocation,
//                'country_of_interest' => $inputcountry_of_interest,
                'country_of_interest' => $inputcountry_of_interest,
                'status' => $inputstatus,
                'career_level' => $inputcareer_level,
                'experience' => $inputexperience,
                'salary' => $inputsalary,
                'expected_salary' => $inputexpected_salary,
//                'gender' => $inputgender,
                'age' => $age,
                'qualification' => $qualification,
                'language' => $languages,
            ));
        }
        else
            {
                $userData = DB::table('candidate_abouts')->select()->where('user_id', $user_id)->Insert(array(
                    'user_id' => $user_id,
                    'about' => $inputabout,
                    'category' => $inputcategory,
                    'location' => $inputlocation,
//                    'country_of_interest' => $inputcountry_of_interest,
                    'country_of_interest' => $inputcountry_of_interest,
                    'status' => $inputstatus,
                    'career_level' => $inputcareer_level,
                    'experience' => $inputexperience,
                    'salary' => $inputsalary,
                    'expected_salary' => $inputexpected_salary,
//                    'gender' => $inputgender,
                    'age' => $age,
                    'qualification' => $qualification,
                    'language' => $languages,
                ));
            }

        $user = DB::table('candidate_abouts')->select()->where('user_id', $id_user->id)->first();
        return \redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id])->with('success','Resume edited successfully');

    }

    public function save_edit_personal_details(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);
//        dd($id_user->id);
        if (empty($id_user)) {
            dd('user not found');
            return redirect()->back();
        }
//        dd($request->all());
        $validator = Validator::make($request->all(),[
            'firstName' => 'string|max:255|nullable',
            'lastName' => 'string|max:255|nullable',
            'full_name' => 'string|max:255|nullable',
            'father_name' => 'string|max:255|nullable',
            'mother_name' => 'string|max:255|nullable',
//            'DOB' => 'data_format|nullable',
            'nationality' => 'string|max:255|nullable',
            'gender' => 'string|max:255|nullable',
            'maritalStatus' => 'string|max:255|nullable',
            'dependents' => 'nullable',
            'age' => 'string|max:255|nullable',
            'address' => 'string|max:255|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user_id = $id_user->id;
        $inputfirstName  = $request->input('firstName');
        $inputlastName  = $request->input('lastName');
        $inputfull_name  = $request->input('full_name');
        $inputfather_name = $request->input('father_name');
        $inputmother_name = $request->input('mother_name');
        $inputDOB = $request->input('DOB');
        $inputnationality = $request->input('nationality');
        $inputgender = $request->input('gender');
        $inputmaritalStatus = $request->input('maritalStatus');
        $inputdependents = $request->input('dependents');
        $age = $request->input('age');
        $address = $request->input('address');

        $user_id_present = DB::table('candidate_personal_informations')->select()->where('user_id', $user_id)->first();

        if ($user_id_present!= '')
        {
            $userData = DB::table('candidate_personal_informations')->select()->where('user_id', $user_id)->update(array(
                'user_id' => $user_id,
                'firstName' => $inputfirstName,
                'lastName' => $inputlastName,
                'full_name' => $inputfull_name,
                'father_name' => $inputfather_name,
                'mother_name' => $inputmother_name,
                'DOB' => $inputDOB,
                'nationality' => $inputnationality,
                'gender' => $inputgender,
                'maritalStatus' => $inputmaritalStatus,
                'dependents' => $inputdependents,
                'age' => $age,
                'address' => $address,
            ));
        }
        else
        {
            $userData = DB::table('candidate_personal_informations')->select()->where('user_id', $user_id)->Insert(array(
                'user_id' => $user_id,
                'firstName' => $inputfirstName,
                'lastName' => $inputlastName,
                'full_name' => $inputfull_name,
                'father_name' => $inputfather_name,
                'mother_name' => $inputmother_name,
                'DOB' => $inputDOB,
                'nationality' => $inputnationality,
                'gender' => $inputgender,
                'maritalStatus' => $inputmaritalStatus,
                'dependents' => $inputdependents,
                'age' => $age,
                'address' => $address,
            ));
        }

        $user = DB::table('candidate_personal_informations')->select()->where('user_id', $id_user->id)->first();
        return \redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id])->with('success','Resume edited successfully');
    }

    public function save_edit_education_background(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);
//        dd($id_user->id);
        if (empty($id_user)) {
            dd('user not found');
            return redirect()->back();
        }

        $input = $request->all();

        foreach($input['candidate_educations'] as $key => $val)
        {
            if ($input['candidate_educations'][$key]['ending_date']  < $input['candidate_educations'][$key]['starting_date'])
            {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('warning', 'Starting date must be less than To date');
            }
        }

        DB::table('candidate_educations')
        ->where('user_id', $id)
        ->delete();

        for ($i = 0; $i < count($request->candidate_educations); $i++) {

            DB::table('candidate_educations')
            ->insert(array(
                'user_id' => $id,
                'title' => $request->candidate_educations[$i]['title'],
                'institution' => $request->candidate_educations[$i]['institution'],
                'starting_date' => $request->candidate_educations[$i]['starting_date'],
                'ending_date' => $request->candidate_educations[$i]['ending_date'],
                'description' => $request->candidate_educations[$i]['description'],
            ));
        }


        $user = DB::table('candidate_educations')->select()->where('user_id', $id_user->id)->first();
        return \redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id])->with('success','Resume edited successfully');
    }

    public function save_edit_work_experience(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);
//        dd($id_user->id);
        if (empty($id_user)) {
            return redirect()->back();
        }

        $input = $request->all();

        foreach($input['candidate_experiences'] as $key => $val)
        {
            if ($input['candidate_experiences'][$key]['ending_date']  < $input['candidate_experiences'][$key]['starting_date'])
            {
                return redirect()
                ->back()
                ->withInput()
                ->with('warning', 'Starting date must be less than To date');
            }
        }

        DB::table('candidate_experiences')
        ->where('user_id', $id)
        ->delete();

        for ($i = 0; $i < count($request->candidate_experiences); $i++) {

            DB::table('candidate_experiences')
            ->insert(array(
                'user_id' => $id,
                'title' => $request->candidate_experiences[$i]['title'],
                'company' => $request->candidate_experiences[$i]['company'],
                'starting_date' => $request->candidate_experiences[$i]['starting_date'],
                'ending_date' => $request->candidate_experiences[$i]['ending_date'],
                'description' => $request->candidate_experiences[$i]['description'],
            ));


        }

        $user = DB::table('candidate_experiences')->select()->where('user_id', $id_user->id)->first();
        return \redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id])->with('success','Resume edited successfully');
    }

    public function save_edit_self_qualification(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);
//        dd($id_user->id);
        if (empty($id_user)) {
            dd('user not found');
            return redirect()->back();
        }

        DB::table('candidate_special_qualifications')
        ->where('user_id', $id)
        ->delete();

        for ($i = 0; $i < count($request->candidate_special_qualifications); $i++) {

            DB::table('candidate_special_qualifications')
            ->insert(array(
                'user_id' => $id,
                'qualification_name' => $request->candidate_special_qualifications[$i]['qualification_name'],
            ));


        }

        $user = DB::table('candidate_special_qualifications')->select()->where('user_id', $id_user->id)->first();
        return \redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id])->with('success','Resume edited successfully');
    }

    public function save_edit_professional_skills(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);
//        dd($id_user->id);
        if (empty($id_user)) {
            dd('user not found');
            return redirect()->back();
        }



        DB::table('candidate_professional_skills')
        ->where('user_id', $id)
        ->delete();

        for ($i = 0; $i < count($request->candidate_professional_skills); $i++) {

            DB::table('candidate_professional_skills')
            ->insert(array(
                'user_id' => $id,
                'description' => $request->candidate_professional_skills[$i]['description'],
                'skill_name' => $request->candidate_professional_skills[$i]['skill_name'],
                'percentage' => $request->candidate_professional_skills[$i]['percentage'],

            ));


        }

        $user = DB::table('candidate_professional_skills')->select()->where('user_id', $id_user->id)->first();
        return \redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id])->with('success','Resume edited successfully');
    }

    public function save_edit_portfolio(Request $request, $id)
    {
        $id_user =DB::table('users')->find($id);
//        dd($id_user->id);
//        dd($request->all());
        if (empty($id_user)) {
            return redirect()->back();
        }

        // $validator = Validator::make($request->all(),[
        //     'title' => 'string|max:255|nullable',
        //     'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'link' => 'string|max:255|nullable',
        // ]);


        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        DB::table('candidate_portfolios')
        ->where('user_id', $id)
        ->delete();

        // return $request->all();

        for ($i = 0; $i < count($request->candidate_portfolios); $i++) {

            if($request->candidate_portfolios[$i]['avatar'])
            {
                $image = $request->candidate_portfolios[$i]['avatar'];
                $path = public_path(). '/images/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);
                $avatar  = $filename;
            }
            else{
                $avatar = null;
            }


            DB::table('candidate_portfolios')
            ->insert(array(
                'user_id' => $id,
                'title' => $request->candidate_portfolios[$i]['title'],
                'avatar' => $avatar,
                'link' => $request->candidate_portfolios[$i]['link'],
            ));


        }

        $user = DB::table('candidate_portfolios')->select()->where('user_id', $id_user->id)->first();
        return \redirect()->action('CandidateController@edit_resume',['id'=>$user->user_id])->with('success','Resume edited successfully');
    }

    public function bookmarks($id)
    {
        $id_user =DB::table('users')->find($id);

        return view('candidate.bookmarks');
    }

    public function applied_job($id)
    {
        $mytime = Carbon::now();

        $id_user = DB::table('users')->select()->where('id',$id)->first();

        $candidate_applied_jobs = DB::table('candidate_applied_jobs')
        ->where('user_id', $id_user->id)
        ->get()
        ->pluck('job_id');

        $jobs = DB::table('jobs as J')->select('J.id', 'J.title', 'U.companyname', 'J.endingDate', 'CJ.status')
        ->whereIn('J.id', $candidate_applied_jobs)
        ->where('J.status','=','Active')
//        ->whereDate('J.endingDate','>=', $mytime)
        ->join('users as U', 'J.user_id', '=' , 'U.id')
        ->join('candidate_applied_jobs as CJ', 'J.id', '=' , 'CJ.job_id')
        ->get();

        return view('candidate.applied_job',compact('jobs','id_user'));

    }

    public function ignored_applied_job($id)
    {
        $id_user =DB::table('users')->select()->where('id',$id)->first();

        $candidate_applied_jobs = DB::table('candidate_applied_jobs')
        ->where('user_id', $id_user->id)
        ->where('status', 'Ignored')
        ->get()
        ->pluck('job_id');

        $jobs = DB::table('jobs as J')->select('J.id', 'J.title', 'U.companyname', 'J.endingDate', 'CJ.status')
        ->whereIn('J.id', $candidate_applied_jobs)
        ->where('J.status','=','Active')
        ->join('users as U', 'J.user_id', '=' , 'U.id')
        ->join('candidate_applied_jobs as CJ', 'J.id', '=' , 'CJ.job_id')
        ->get();

        return view('candidate.applied_job',compact('jobs','id_user'));

    }

    public function interesting_applied_job($id)
    {
        $id_user =DB::table('users')->select()->where('id',$id)->first();

        $candidate_applied_jobs = DB::table('candidate_applied_jobs')
        ->where('user_id', $id_user->id)
        ->where('status', 'Interesting')
        ->get()
        ->pluck('job_id');

        $jobs = DB::table('jobs as J')->select('J.id', 'J.title', 'U.companyname', 'J.endingDate', 'CJ.status')
        ->whereIn('J.id', $candidate_applied_jobs)
        ->where('J.status','=','Active')
        ->join('users as U', 'J.user_id', '=' , 'U.id')
        ->join('candidate_applied_jobs as CJ', 'J.id', '=' , 'CJ.job_id')
        ->get();

        return view('candidate.applied_job',compact('jobs','id_user'));

    }

    public function interview_applied_job($id)
    {
        $id_user =DB::table('users')->select()->where('id',$id)->first();

        $candidate_applied_jobs = DB::table('candidate_applied_jobs')
        ->where('user_id', $id_user->id)
        ->where('status', 'Interview')
        ->get()
        ->pluck('job_id');

        $jobs = DB::table('jobs as J')->select('J.id', 'J.title', 'U.companyname', 'J.endingDate', 'CJ.status')
        ->whereIn('J.id', $candidate_applied_jobs)
        ->where('J.status','=','Active')
        ->join('users as U', 'J.user_id', '=' , 'U.id')
        ->join('candidate_applied_jobs as CJ', 'J.id', '=' , 'CJ.job_id')
        ->get();

        return view('candidate.applied_job',compact('jobs','id_user'));

    }

    public function hired_applied_job($id)
    {
        $id_user =DB::table('users')->select()->where('id',$id)->first();

        $candidate_applied_jobs = DB::table('candidate_applied_jobs')
        ->where('user_id', $id_user->id)
        ->where('status', 'Hired')
        ->get()
        ->pluck('job_id');

        $jobs = DB::table('jobs as J')->select('J.id', 'J.title', 'U.companyname', 'J.endingDate', 'CJ.status')
        ->whereIn('J.id', $candidate_applied_jobs)
        ->where('J.status','=','Active')
        ->join('users as U', 'J.user_id', '=' , 'U.id')
        ->join('candidate_applied_jobs as CJ', 'J.id', '=' , 'CJ.job_id')
        ->get();

        return view('candidate.applied_job',compact('jobs','id_user'));

    }

    public function search($id)
    {
        $user_found =DB::table('users')->find($id);
        if (empty($user_found)) {
            return redirect()->back()->with('message', 'User not found');
        }

        $mytime = Carbon::now();

        $skills = DB::table('candidate_skills')
        ->where('user_id', $id)
        ->get()
        ->pluck('skill');

        $skilledJobs = DB::table('job_skills')->whereIn('skill', $skills)
        ->groupBy('job_id')
        ->pluck('job_id');


        $candidate_information = DB::table('users as U')
        ->select('*')
        ->join('candidate_personal_informations as P', 'U.id', '=', 'P.user_id')
        ->join('candidate_abouts as A','U.id','=','A.user_id')
        ->where('U.id', $id)
        ->get();
        $jobs = array();

        foreach ($candidate_information as $candidate_information){
            $jobs = DB::table('jobs as J')->select('J.id', 'J.title', 'U.companyname', 'J.job_location', 'J.type', 'J.endingDate')
            ->where('J.status','=','Active')
            ->whereIn('J.id', $skilledJobs)
            ->where('J.job_location', '=' , $candidate_information->location)
            ->where('J.candidate_nationality', '=' , $candidate_information->nationality)
            ->where('J.gender', '=' , $candidate_information->gender)
            ->where('J.experience', '=' , $candidate_information->experience)
            ->where('J.salary', '=' , $candidate_information->expected_salary)
            ->whereDate('J.endingDate','>=', $mytime)
            ->join('users as U', 'J.user_id', '=' , 'U.id')
            ->get();
        }


        $countries = DB::table('countries')->select('*')->get();
        $industries = DB::table('employee_bussiness_categories')->select('*')->get();
        $companies = DB::table('users')->select('companyname')->where('companyname', '!=' , null)->get();


        return view('candidate.search',compact('jobs','user_found','countries', 'industries', 'companies'));
    }

    public function job_details($id,$user_id)
    {
        $job_id =DB::table('jobs')->find($id);

        if (empty($job_id)) {
            dd(' job  NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }

        $job = DB::table('jobs')->select()->where('id', $job_id->id)->first();
        $user = DB::table('users')->select()->where('id', $job_id->user_id)->first();
        $user_candidate = DB::table('users')->select()->where('id', $user_id)->first();
//        $jobs = DB::table('jobs')->get();
//dd($job);

        DB::table('jobs')->where('id', $id)->update(array(
            'count' => $job_id->count + 1 ,
        ));

        return view('candidate.job_details',compact('job','user', 'user_candidate'));
    }

    public function applyJob($id,$user_id)
    {
        if(Auth::check()){
            $userId = Auth::user()->id;

            $profilePercentage = 0;

            $candidateAbout = DB::table('candidate_abouts')
                ->where('user_id', $userId)
                ->first();

            if(!empty($candidateAbout) || $candidateAbout != null){
                $profilePercentage = $profilePercentage + 10;
            }

            $candidateProfile = DB::table('candidate_profiles')
                ->where('user_id', $userId)
                ->first();

            if(!empty($candidateProfile) || $candidateProfile != null){
                $profilePercentage = $profilePercentage + 10;
            }

            $candidatePersonalInformation = DB::table('candidate_personal_informations')
                ->where('user_id', $userId)
                ->first();

            if(!empty($candidatePersonalInformation) || $candidatePersonalInformation != null){
                $profilePercentage = $profilePercentage + 20;
            }

            $candidateEducations = DB::table('candidate_educations')
                ->where('user_id', $userId)
                ->get();

            if(count($candidateEducations)>0){
                $profilePercentage = $profilePercentage + 10;
            }

            $candidateExperiences = DB::table('candidate_experiences')
                ->where('user_id', $userId)
                ->get();

            if(count($candidateExperiences)>0){
                $profilePercentage = $profilePercentage + 10;
            }

            $candidatePortfolios = DB::table('candidate_portfolios')
                ->where('user_id', $userId)
                ->get();

            if(count($candidatePortfolios)>0){
                $profilePercentage = $profilePercentage + 10;
            }

            $candidateProSkills = DB::table('candidate_professional_skills')
                ->where('user_id', $userId)
                ->get();

            if(count($candidateProSkills)>0){
                $profilePercentage = $profilePercentage + 10;
            }

            $candidateSkills = DB::table('candidate_skills')
                ->where('user_id', $userId)
                ->get();

            if(count($candidateSkills)>0){
                $profilePercentage = $profilePercentage + 10;
            }

            $candidateSpecialQualification = DB::table('candidate_special_qualifications')
                ->where('user_id', $userId)
                ->get();

            if(count($candidateSpecialQualification)>0){
                $profilePercentage = $profilePercentage + 10;
            }

        }
        else{
            $profilePercentage = 0;
        }

        $job = DB::table('jobs')->find($id);
        $user = DB::table('users')->find($user_id);
        $user_id  = $user->id;
        $job_id  = $job->id;
        $status  = '';


        $dataCheck = DB::table('candidate_applied_jobs')->select()->where('user_id', $user->id)->where('job_id', $job->id)->first();
        $jobstatus = DB::table('jobs')->select()->where('id', $job->id)->first();

        if(isset($dataCheck)){
            return back()->with('warning','You have already applied for this job!');
        }
        elseif ($jobstatus->status != 'Active')
        {
            return back()->with('warning','You cannot apply to this job because it is disabled!');

        }
        elseif ($profilePercentage < 100)
        {
            return back()->with('warning','Please complete your resume and profile to apply');
        }
        else{
            $userData = DB::table('candidate_applied_jobs')->Insert(array(
                'user_id' => $user_id,
                'job_id' => $job_id,
                'status' => $status,
            ));


            return back()->with('success','Job Applied successfully!');
        }
    }

    public function destroy($job_id,$user_id)
    {

        $candidate_job = DB::table('candidate_applied_jobs')
                        ->where('user_id',$user_id)
                        ->where('job_id',$job_id)
                        ->delete();


//        $company = Company::find($id);
//        $company->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $data = [];
        $data['name'] = json_encode($input['name']);

//        Framework::create($data);

        return response()->json(['success'=>'Success Fully Insert Records']);
    }

    public function searchCountryCompany(Request $request){
        $companies = DB::table('users')
        ->select('id', 'country_name', 'companyname')
        ->where('companyname', '!=', null)
        ->where('country_name', $request->country_name)
        ->get();

        return response()->json(['companies'=>$companies]);

    }

    public function searchAdvanceJob(Request $request){
        if($request->ajax()) {
            $userId = Auth::user()->id;

            $mytime = Carbon::now();

            $skills = DB::table('candidate_skills')
            ->where('user_id', $userId)
            ->get()
            ->pluck('skill');

            $skilledJobs = DB::table('job_skills')->whereIn('skill', $skills)
            ->groupBy('job_id')
            ->pluck('job_id');


            $candidate_information = DB::table('users as U')
            ->select('*')
            ->join('candidate_personal_informations as P', 'U.id', '=', 'P.user_id')
            ->join('candidate_abouts as A','U.id','=','A.user_id')
            ->where('U.id', $userId)
            ->get();

            foreach ($candidate_information as $candidate_information){
                $jobs = DB::table('jobs as J')->select('J.id', 'J.title', 'U.companyname', 'J.job_location', 'J.type', 'J.endingDate')
                ->where('J.status','=','Active')
                ->whereIn('J.id', $skilledJobs)
                ->where('J.job_location', '=' , $candidate_information->location)
                ->where('J.candidate_nationality', '=' , $candidate_information->nationality)
                ->where('J.gender', '=' , $candidate_information->gender)
                ->where('J.experience', '=' , $candidate_information->experience)
                ->where('J.salary', '=' , $candidate_information->expected_salary)
                ->whereDate('J.endingDate','>=', $mytime)
                ->where('J.category', $request->industry)
                ->where('J.country', $request->country)
                ->where('J.companyName', $request->companyName)
                ->join('users as U', 'J.user_id', '=' , 'U.id')
                ->get();
            }

            return view('candidate.jobs_view_list', compact('jobs'))->render();
        }
    }

    public function accountStatistics($id){
        $mytime = Carbon::now();

        $cv = DB::table('cv_counters')->where('user_id', $id)->first();

        if(empty($cv)){
            $cvCount = 0;
        }
        else{
            $cvCount = $cv->count;
        }

        $skills = DB::table('candidate_skills')
        ->where('user_id', $id)
        ->get()
        ->pluck('skill');

        $skilledJobs = DB::table('job_skills')->whereIn('skill', $skills)
        ->groupBy('job_id')
        ->pluck('job_id');

        $appliedJobs = DB::table('candidate_applied_jobs')
        ->where('user_id', $id)
        ->get()
        ->pluck('job_id');

        $jobs = DB::table('jobs')->whereIn('id', $appliedJobs)
        ->get();

        $candidate_information = DB::table('users as U')
        ->select('*')
        ->join('candidate_personal_informations as P', 'U.id', '=', 'P.user_id')
        ->join('candidate_abouts as A','U.id','=','A.user_id')
        ->where('U.id', $id)
        ->get();

        $matchedJobs = array();

        foreach ($candidate_information as $candidate_information){
            $matchedJobs = DB::table('jobs as J')
                ->select('J.id', 'J.title', 'U.companyname', 'J.job_location', 'J.type', 'J.endingDate')
            ->where('J.status','=','Active')
            ->whereIn('J.id', $skilledJobs)
            ->where('J.job_location', '=' , $candidate_information->location)
            ->where('J.candidate_nationality', '=' , $candidate_information->nationality)
            ->where('J.gender', '=' , $candidate_information->gender)
            ->where('J.experience', '=' , $candidate_information->experience)
            ->where('J.salary', '=' , $candidate_information->expected_salary)
            ->whereDate('J.endingDate','>=', $mytime)
            ->join('users as U', 'J.user_id', '=' , 'U.id')
            ->get();
        }

        return view('candidate.accountStatistics', compact('cvCount', 'jobs', 'matchedJobs'));
    }

    public function deleteAppliedJob($id){
        $userId = Auth::user()->id;

        DB::table('candidate_applied_jobs')
        ->where('user_id', $userId)
        ->where('job_id', $id)
        ->delete();

        return redirect()->back()->with('success', 'You have UnApplied this Job.');
    }

    public function candidatePortfolioDelete($id){

        DB::table('candidate_portfolios')
        ->where('id', $id)
        ->delete();

        return redirect()->back()->with('warning', 'You have Deleted this portfolio.');
    }


}
