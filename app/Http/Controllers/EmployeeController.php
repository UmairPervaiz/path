<?php

namespace App\Http\Controllers;

use App\User;
//use Barryvdh\DomPDF\PDF;
//use PDF
use Barryvdh\DomPDF\Facade as PDF;

use bawes\myfatoorah\MyFatoorah;

use beinmedia\payment\Parameters\PaymentParameters;
use Carbon\Carbon;
use MyFatoorahPayment;

use Spatie\Browsershot\Browsershot;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Mail;


class EmployeeController extends Controller
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

    public function dashboard($id)
    {
        $user_id = decrypt($id);

        $user = DB::table('users')->find($user_id);



//        dd($user);
        $id_user = $user->id;
//        $user = DB::table('user')->finOrfail($id);
//        if (empty($user)) {
//            return redirect('/welcome');
//        }
        $user_application_id = DB::table('users')
//                               ->select('candidate_applied_jobs.job_id as job_id', 'users.id AS u_id')
                                ->join('jobs','users.id','=','jobs.user_id')
                                ->join('candidate_applied_jobs','jobs.id','=','candidate_applied_jobs.job_id')
                                ->where('users.id', $user->id)
                                ->get();
//        dd($user_application_id);
        $count = count($user_application_id);
        $jobs = DB::table('jobs')->select()->where('user_id', $user->id)->get();
//        dd($jobs);


        $totalJobCount = 0;

        foreach ($jobs as $item) {
                $totalJobCount = $item->count + $totalJobCount;
        }

        return view('employee.index',compact('user','count','jobs', 'totalJobCount'));
    }

    public function editprofile($id)
    {
        $user_id = decrypt($id);

        $user =DB::table('users')->find($user_id);
//        $user = User::findOrFail($id);
        $category = DB::table('employee_bussiness_categories')->select()->get();
        $country = DB::table('countries')->select()->get();
        $city = DB::table('cities')->select()->get();
//        $job = DB::table('jobs')->where('user_id',$user_id)->first();

//        dd($category);
//        foreach ($category as $categorys)
//        {
//        $loop[] =  $categorys->category;
//
//        }
//
//        dd($loop);
        if (empty($user)) {
            dd('in edit show view USER NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }
        $category_array = explode(',',$user->category);
//        dd($category_array);

        return view('employee.editprofile', compact('user','category','country','category_array','city'));
//        return view('employee.editprofile', ['user' =>$user,'category' =>$category,'country'=>$country,'category_array'=>$category_array]);
    }

    public function save_editprofile(Request $request,$id)
    {
        //     return $request->all();
//        dd('in');
        $user_id = decrypt($request->id);

//        dd($request->id);
//        $user_id = Crypt::decrypt($id);
        $id_user =DB::table('users')->find($user_id);
//        $user_int = (int)$user;
        if (empty($id_user)) {
//            dd('user not found');
            return redirect()->back();
        }
//        dd($request->all());
//        dd($request->companyname);

//        dd($temp);
//
//
//        $validator = $request->validate([
//            'companyname' => 'bail|text|max:255',
//            'phone' => 'bail|numeric|size:11',
//            'address' => 'bail|text|max:255',
//            'category' => 'bail|text|max:255',
//            'aboutus' => 'bail|text|max:255',
//            'facebooklink' => 'bail|text|max:500',
//            'twitterlink' => 'bail|text|max:500',
//            'goooglelink' => 'bail|text|max:500',
//            'body' => 'required',
//        ]);


        $validator = Validator::make($request->all(),[
//            'avatar' => 'image|dimensions:max_width=250,max_height=250|mimes:jpeg,png|nullable',
//            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'companyname' => 'string|max:255|nullable|required',
        //     'companyname' => 'string|max:255|nullable|required',
            'country_name' => 'string|max:255|nullable|required',
            'city_name' => 'string|max:255|nullable|required',
            'companyEmail' => 'required| string| email| max:255',
            'phoneNo' => 'regex:/[0-9]{4}[0-9]{7}/ |nullable|required',
            'companyPhoneNo' => 'regex:/[0-9]{4}[0-9]{7}/ |nullable|required',
            'contactPersonName' => 'string|max:255|nullable|required',
//            'phone' => 'phone_number',       AppServiceProvider (boot function)
            'address' => 'string|max:255|nullable|required',
            'category' => 'required',
            'zip_code' => 'required',
            'your_location' => 'string|max:255|nullable',
            'aboutus' => 'string|max:255|nullable',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebooklink' => 'string|max:500|nullable',
            'twitterlink' => 'string|max:500|nullable',
            'goooglelink' => 'string|max:500|nullable',
//            'current_password' => 'string|min:8|nullable',
            'new_password' => 'string|min:8|nullable|confirmed',
        ]);

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
//        dd($validator);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

//        Job::find($id)->update($request->all());
//                $data =
//        $data = array([
//            'companyname' => $request->companyname,
//            'phoneNo' => $request->phone,
//            'address' => $request->address,
//            'category' => $request->category,
//            'aboutus' => $request->aboutus,
//            'facebooklink' => $request->facebooklink,
//            'twitterlink' => $request->twitterlink,
//            'goooglelink' => $request->goooglelink,
//        ]);
        $temp  = implode(',',$request->category);

//        if( $request->hasFile('avatar')) {
//            $image = $request->file('avatar');
//            $path = public_path(). '/images/';
//            $filename = time() . '.' . $image->getClientOriginalExtension();
//            $image->move($path, $filename);
////            $post->image = $path;
//            $avatar  = $filename;
//        }
//        $image  = $avatar;


        $inputcompanyname = $request->input('companyname');
        $inputcountry_name = $request->input('country_name');
        $inputcity_name = $request->input('city_name');
        $inputcompanyEmail = $request->input('companyEmail');
        $inputphoneNo = $request->input('phoneNo');
        $inputcompanyPhoneNo = $request->input('companyPhoneNo');
        $inputcontactPersonName = $request->input('contactPersonName');
        $inputaddress = $request->input('address');
        $inputcategory = $temp;
//        $inputcategory = $request->input('category');
        $inputzip_code = $request->input('zip_code');
        $inputyour_location = $request->input('your_location');
        $inputaboutus = $request->input('aboutus');
        $inputfacebooklink = $request->input('facebooklink');
        $inputtwitterlink = $request->input('twitterlink');
        $inputgoooglelink = $request->input('goooglelink');
        $newpassword = $request->input('new_password');

//        dd($newpassword);

//        $user_present = DB::table('users')->where('id',$id_user->id)->first();
        $user_present = DB::table('users')->select('companyname','country_name')->where( 'id', $id_user->id)->first();

        $all_users = DB::table('users')->select('companyname','country_name')->where('id', '!=' ,$id_user->id)->get();
//        $all_users = DB::table('users')->select('*')->where('id', '!=' ,$id_user->id)->get();

//        dd($all_users);
//        dd($user_present);
//
//        else{
//                $present = $request->companyname && $request->country_name === $user_present->companyname && $user_present->country_name;
//                dd($present);
            foreach ($all_users as $all_user){
                if($request->companyname === $all_user->companyname && $request->country_name === $all_user->country_name)
                //if ($request->companyname && $request->country_name != $all_user->companyname && $all_user->country_name)
                {
//                    dd('done');
                 return \redirect()->action('EmployeeController@editprofile',['id'=>encrypt($id_user->id)])->with('warning', 'Company name already present in our records for your country selected');
                }
            }

            if( $request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $path = public_path(). '/images/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);
                $avatar  = $filename;

                $dataUpdate = DB::table('users')->where('id', $id_user->id)->update(array(
                        'avatar' => $avatar,
                ));
            }


//              else{
//                dd('update');
            $dataUpdate = DB::table('users')->where('id', $id_user->id)->update(array(
                'companyname' => $inputcompanyname,
                'country_name' => $inputcountry_name,
                'city_name' => $inputcity_name,
                'companyEmail' => $inputcompanyEmail,
                // 'avatar' => $avatar,
                'phoneNo' => $inputphoneNo,
                'companyPhoneNo' => $inputcompanyPhoneNo,
                'contactPersonName' => $inputcontactPersonName,
                'address' => $inputaddress,
                'category' => $inputcategory,
                'zip_code' => $inputzip_code,
                'your_location' => $inputyour_location,
                'aboutus' => $inputaboutus,
                'facebooklink' => $inputfacebooklink,
                'twitterlink' => $inputtwitterlink,
                'goooglelink' => $inputgoooglelink,
                'password' => Hash::make($newpassword),
            ));
//              }
//        }
//        dd('stop');
        $user = DB::table('users')->select()->where('id', $id_user->id)->first();
//         $id_user =  encrypt($user->id);
//        return view('employee.editprofile',compact('user'));
        return \redirect()->action('EmployeeController@editprofile',['id'=>encrypt($user->id)])->with('success', 'Profile Edited successfully');

    }

    public function managejob($id)
    {
        $user_id = decrypt($id);
//
////        dd($request->id);
////        $user_id = Crypt::decrypt($id);
//        $id_user =DB::table('users')->find($user_id);
        $user_found =DB::table('users')->find($user_id);
//        dd($user_found);
        if (empty($user_found)) {
//            dd('in manage job show view USER NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }

        $jobs = DB::table('jobs')->select()->where('user_id', $user_found->id)->get();
//        dd($jobs);
        $job_status = DB::table('job_status')->get();
//        dd($job_status);

        $candidate_jobs = DB::table('candidate_applied_jobs')->select()->get();


//        $count = count($jobs);
//        dd($count);
        return view('employee.managejob', compact('jobs','job_status'));
    }

    public function postjob($id)
    {
        $user_id = decrypt($id);
        $user =DB::table('users')->find($user_id);
        if (empty($user)) {
            return redirect()->back()->with('message', 'User not found');
        }

        $locations = DB::table('countries')->get();
        $bussiness_categories = DB::table('employee_bussiness_categories')->get();
        $job_types = DB::table('job_types_tables')->get();
        $job_experiences = DB::table('job_experiences')->get();
        $job_qualifications = DB::table('job_qualifications')->get();
        $job_genders = DB::table('job_genders')->get();
        $job_career_levels = DB::table('job_career_levels')->get();
        $job_salary_ranges = DB::table('job_salary_ranges')->get();
        $job_candidate_locations = DB::table('job_candidate_locations')->get();
        $category = DB::table('field_of_expertises')->select()->get();
        $nationality = DB::table('nationalities')->select()->get();

        $category_array = explode(',',$user->category);

        $skills = DB::table('skills')->get();

        $exist = 0;

        $record =  DB::table('employee_packages')
        ->where('user_id', Auth::user()->id)
        ->where('status', 1)
        ->first();

        if(!empty($record)){
                $exist = 1;
        }


        if($exist == 0){
                return redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning','Please purchase a package before posting a job.');
        }
        else{
                if($record->jobs_count >= $record->jobs_limit){
                        return redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning','You have reached your job posting limit, Please Update your Package.');
                }
        }


        return view('employee.postjob',[ 'user'=>$user, 'locations'=>$locations,'bussiness_categories'=>$bussiness_categories, 'job_types'=>$job_types,
                        'job_experiences'=>$job_experiences,'job_qualifications'=>$job_qualifications,
                        'job_genders'=>$job_genders,'job_career_levels'=>$job_career_levels,
                        'job_salary_ranges'=>$job_salary_ranges,'job_candidate_locations'=>$job_candidate_locations,
                        'category'=>$category,
                        'category_array'=>$category_array,'nationality'=>$nationality, 'skills' => $skills]);
    }

    public function save_postjob(Request $request, $id)
    {
        $user_id = decrypt( $request->id);

        $id_user = DB::table('users')->find($user_id);


        if (empty($id_user)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(),[
            'title' => 'string|max:255|nullable',
            'category' => 'string|max:255|nullable',
            'job_location' => 'string|max:255|nullable',
            'candidate_location' => 'string|max:255|nullable',
            'candidate_nationality' => 'string|max:255|nullable',
            'type' => 'string|max:255|nullable',
            'career_level' => 'string|max:255|nullable',
            'experience' => 'string|max:255|nullable',
            'salary' => 'string|max:255|nullable',
            'qualification' => 'string|max:255|nullable',
            'gender' => 'string|max:255|nullable',
            'vacancy' => 'string|max:255|nullable',
            'date' => 'data_format|nullable',
            'endingDate' => 'data_format|nullable',
            'description' => 'string|max:255|nullable',
            'responsibilities' => 'string|max:255|nullable',
            'education' => 'string|max:255|nullable',
            'country' => 'string|max:255|nullable',
            'city' => 'string|max:255|nullable',
            'zip_code' => 'numeric|nullable',
            'your_location' => 'string|max:255|nullable',
            'companyName' => 'string|max:255|nullable',
            'webAddress' => 'string|max:255|nullable',
            'companyProfile' => 'string|max:255|nullable',

        ]);

        $title = $request->input('title');
        $category = $request->input('category');
        $job_location = $request->input('job_location');
        $candidate_location = $request->input('candidate_location');
        $candidate_nationality = $request->input('candidate_nationality');
        $type = $request->input('type');
        $career_level = $request->input('career_level');
        $experience = $request->input('experience');
        $salary = $request->input('salary');
        $qualification = $request->input('qualification');
        $gender = $request->input('gender');
        $vacancy = $request->input('vacancy');
        $date = $request->input('date');
        $endingDate = $request->input('endingDate');
        $description = $request->input('description');
        $responsibilities = $request->input('responsibilities');
        $education = $request->input('education');
        $country = $request->input('country');
        $city = $request->input('city');
        $zip_code = $request->input('zip_code');
        $your_location = $request->input('your_location');
        $companyName = $request->input('companyName');
        $webAddress = $request->input('webAddress');
        $companyProfile = $request->input('companyProfile');

        $profilecheck = DB::table('users')->select('contactPersonName')->where('id', $id_user->id)->first();

        $exist = 0;

        $record =  DB::table('employee_packages')
        ->where('user_id', Auth::user()->id)
        ->where('status', 1)
        ->first();

        if(!empty($record)){
                $exist = 1;
        }


        if($exist == 0){
                return redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning','Please purchase a package before posting a job.');
        }
        else{
                if($record->jobs_count >= $record->jobs_limit){
                        return redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning','You have reached your job posting limit, Please Update your Package.');
                }
        }


        if ($profilecheck->contactPersonName === null)
        {
            return \redirect()->action('EmployeeController@editprofile',['id'=>encrypt($id_user->id)])->with('warning','Please complete profile in order to post a job');
        }
        else
        {
            DB::table('jobs')->insert(array(
                'user_id' => $id_user->id,
                'title' => $title,
                'category' => $category,
                'job_location' => $job_location,
                'candidate_location' => $candidate_location,
                'candidate_nationality' => $candidate_nationality,
                'type' => $type,
                'career_level' => $career_level,
                'experience' => $experience,
                'salary' => $salary,
                'qualification' => $qualification,
                'gender' => $gender,
                'vacancy' => $vacancy,
                'date' => $date,
                'endingDate' => $endingDate,
                'description' => $description,
                'responsibilities' => $responsibilities,
                'education' => $education,
                'country' => $id_user->country_name,
                'city' => $city,
                'zip_code' => $zip_code,
                'your_location' => $your_location,
                'companyName' => $id_user->companyname,
                'webAddress' => $webAddress,
                'companyProfile' => $companyProfile,
                'status' => 'Active',
            ));

            $job = DB::table('jobs')->where('user_id',$id_user->id)
            ->orderBy('created_at', 'DESC')
            ->first();


            if($request->has('skills')){
                foreach ($request->skills as $key => $value) {
                    DB::table('job_skills')->insert(array(
                        'user_id' => $id_user->id,
                        'job_id' => $job->id,
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
                    $exists = DB::table('job_skills')
                    ->where('user_id', $id_user->id)
                    ->where('job_id', $job->id)
                    ->where('skill', $value)
                    ->first();

                    if(empty($exists) || $exists == null){
                        DB::table('job_skills')->insert(array(
                                'user_id' => $id_user->id,
                                'job_id' => $job->id,
                                'skill' => $value
                        ));
                    }

                }
            }
        }

        DB::table('employee_packages')->where('id', $record->id)->update(array(
                'jobs_count' => $record->jobs_count + 1,
        ));


        $jobs = DB::table('jobs')->select()->where('user_id', $id_user->id)->get();

        return \redirect()->action('EmployeeController@managejob',['id'=>encrypt($id_user->id)])->with('success','Job Posted successfully');

    }

    public function postjobview($id)
    {
//        DB::table('users')->select()->where('id', );
//        $user =DB::table('jobs')->find($id);
//        $id_user =DB::table('users')->find($id);
//            $user_id = decrypt( $id);
            $user_id = decrypt( $id);
//            dd($user_id);
            $user = DB::table('jobs')->select()->where('id', $user_id)->first();
            $job = DB::table('jobs')->select()->where('id', $user_id)->first();

            $locations = DB::table('countries')->get();
            $bussiness_categories = DB::table('employee_bussiness_categories')->get();
            $job_types = DB::table('job_types_tables')->get();
            $job_experiences = DB::table('job_experiences')->get();
            $job_qualifications = DB::table('job_qualifications')->get();
            $job_genders = DB::table('job_genders')->get();
            $job_career_levels = DB::table('job_career_levels')->get();
            $job_salary_ranges = DB::table('job_salary_ranges')->get();
            $job_candidate_locations = DB::table('job_candidate_locations')->get();
            $nationality = DB::table('nationalities')->select()->get();

            $jobSkills = DB::table('job_skills')
            ->where('user_id', Auth::user()->id)
            ->where('job_id', $job->id)
            ->get();

//        return view('employee.postJobView',compact('user'));
            return view('employee.postJobView',[ 'user'=>$user, 'locations'=>$locations,'job'=>$job,'bussiness_categories'=>$bussiness_categories, 'job_types'=>$job_types,
                'job_experiences'=>$job_experiences,'job_qualifications'=>$job_qualifications,
                'job_genders'=>$job_genders,'job_career_levels'=>$job_career_levels,
                'job_salary_ranges'=>$job_salary_ranges,'job_candidate_locations'=>$job_candidate_locations,
                'nationality'=>$nationality, 'jobSkills'=>$jobSkills]);
    }

    public function postJobEdit($id)
    {
//        DB::table('users')->select()->where('id', );
//        $id_user = DB::table('users')->find($id);
////        dd($id_user);
//        if (empty($id_user)) {
//            dd('user not found');
//            return redirect()->back();
//        }
        $user_id = decrypt( $id);

        $job = DB::table('jobs')->select()->where('id', $user_id)->first();
//        dd($job);
        $locations = DB::table('countries')->get();
        $bussiness_categories = DB::table('employee_bussiness_categories')->get();
        $job_types = DB::table('job_types_tables')->get();
        $job_experiences = DB::table('job_experiences')->get();
        $job_qualifications = DB::table('job_qualifications')->get();
        $job_genders = DB::table('job_genders')->get();
        $job_career_levels = DB::table('job_career_levels')->get();
        $job_salary_ranges = DB::table('job_salary_ranges')->get();
        $job_candidate_locations = DB::table('job_candidate_locations')->get();
        $nationality = DB::table('nationalities')->select()->get();
        $skills = DB::table('skills')->get();

        $jobSkills = DB::table('job_skills')
       ->where('user_id', Auth::user()->id)
       ->where('job_id', $job->id)
       ->get();



//        return view('employee.postJobEdit',compact('job'));
        return view('employee.postJobedit',[ 'job'=>$job,'locations'=>$locations,'bussiness_categories'=>$bussiness_categories, 'job_types'=>$job_types,
            'job_experiences'=>$job_experiences,'job_qualifications'=>$job_qualifications,
            'job_genders'=>$job_genders,'job_career_levels'=>$job_career_levels,
            'job_salary_ranges'=>$job_salary_ranges,'job_candidate_locations'=>$job_candidate_locations,
            'nationality'=>$nationality,'skills'=>$skills,'jobSkills'=>$jobSkills]);
    }

    public function update_postJob(Request $request,$id)
    {
        //     return $request->all();
//        $user_id = decrypt( $request->id);
//        dd($request->id);
//        dd($user_id);
//        $user_id = Crypt::decrypt($id);
//        $id_user = DB::table('users')->find($user_id);
//        dd($id);

        $user_id = decrypt( $id);

//        dd($user_id);
        $id_job = DB::table('jobs')->select()->where('id', $user_id)->first();
        $id_user = DB::table('users')->find($id_job->user_id);

//        dd($id_user);

        if (empty($id_job)) {
//            dd('user not found');
            return redirect()->back();
        }

//        dd($request->all());
        $validator = Validator::make($request->all(),[
            'title' => 'string|max:255|nullable',
            'category' => 'string|max:255|nullable',
            'job_location' => 'string|max:255|nullable',
            'candidate_location' => 'string|max:255|nullable',
            'candidate_nationality' => 'string|max:255|nullable',
            'type' => 'string|max:255|nullable',
            'career_level' => 'string|max:255|nullable',
            'experience' => 'string|max:255|nullable',
            'salary' => 'string|max:255|nullable',
            'qualification' => 'string|max:255|nullable',
            'gender' => 'string|max:255|nullable',
            'vacancy' => 'string|max:255|nullable',
            'date' => 'data_format|nullable',
            'endingDate' => 'data_format|nullable',
            'description' => 'string|max:255|nullable',
            'responsibilities' => 'string|max:255|nullable',
            'education' => 'string|max:255|nullable',
//            'benefits' => 'string|max:255|nullable',
            'country' => 'string|max:255|nullable',
            'city' => 'string|max:255|nullable',
            'zip_code' => 'numeric|nullable',
            'your_location' => 'string|max:255|nullable',
            'companyName' => 'string|max:255|nullable',
            'webAddress' => 'string|max:255|nullable',
            'companyProfile' => 'string|max:255|nullable',
//            'selectPackage' => 'string|max:255|nullable',

        ]);


//        dd($validator);
        $user_id = $id_job->user_id;
//        dd($user_id);
        $title = $request->input('title');
        $category = $request->input('category');
        $job_location = $request->input('job_location');
        $candidate_location = $request->input('candidate_location');
        $candidate_nationality = $request->input('candidate_nationality');
        $career_level = $request->input('career_level');
        $type = $request->input('type');
        $experience = $request->input('experience');
        $salary = $request->input('salary');
        $qualification = $request->input('qualification');
        $gender = $request->input('gender');
        $vacancy = $request->input('vacancy');
        $date = $request->input('date');
        $endingDate = $request->input('endingDate');
        $description = $request->input('description');
        $responsibilities = $request->input('responsibilities');
        $education = $request->input('education');
//        $benefits = $request->input('benefits');
        $country = $request->input('country');
        $city = $request->input('city');
        $zip_code = $request->input('zip_code');
        $your_location = $request->input('your_location');
        $companyName = $request->input('companyName');
        $webAddress = $request->input('webAddress');
        $companyProfile = $request->input('companyProfile');

//        $dataUpdate = DB::table('users')->where('id', $user->id)->update(array(

            DB::table('jobs')->where('id', $id_job->id)->update(array(
            'user_id' => $user_id,
            'title' => $title,
            'category' => $category,
            'job_location' => $job_location,
            'candidate_location' => $candidate_location,
            'candidate_nationality' => $candidate_nationality,
            'career_level' => $career_level,
            'type' => $type,
            'experience' => $experience,
            'salary' => $salary,
            'qualification' => $qualification,
            'gender' => $gender,
            'vacancy' => $vacancy,
            'date' => $date,
            'endingDate' => $endingDate,
            'description' => $description,
            'responsibilities' => $responsibilities,
            'education' => $education,
//            'benefits' => $benefits,
            'country' => $id_user->country_name,
            'city' => $city,
            'zip_code' => $zip_code,
            'your_location' => $your_location,
            'companyName' => $id_user->companyname,
            'webAddress' => $webAddress,
            'companyProfile' => $companyProfile,
//            'selectPackage' => $selectPackage,
        ));

        DB::table('job_skills')
        ->where('user_id', Auth::user()->id)
        ->where('job_id', $id_job->id)
        ->delete();



            // return $request->all();
            if($request->has('skills')){
                foreach ($request->skills as $key => $value) {
                    DB::table('job_skills')->insert(array(
                        'user_id' => $id_user->id,
                        'job_id' =>$id_job->id,
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
                    $exists = DB::table('job_skills')
                    ->where('user_id', $id_user->id)
                    ->where('job_id',$id_job->id)
                    ->where('skill', $value)
                    ->first();

                    if(empty($exists) || $exists == null){
                        DB::table('job_skills')->insert(array(
                                'user_id' => $id_user->id,
                                'job_id' =>$id_job->id,
                                'skill' => $value
                        ));
                    }

                }
            }

//        $user = DB::table('users')->select()->where('id', $user->id)->first();


//        $jobs = DB::table('jobs')->select()->where('id', $id)->get();
//
//        return view('employee.managejob',compact('jobs'));

//        $jobs = DB::table('jobs')->select()->where('user_id', $id_job->user_id)->get();
        $jobs = DB::table('jobs')->select()->where('user_id', $id_job->user_id)->first();
//        return view('employee.managejob', compact('jobs'));
//            $send_id_user = \crypt($id_job->user_id);
         $cry_user_id = encrypt($jobs->user_id);
//        $cry_user_id =  random_bytes($jobs->user_id) ;
//        return \redirect()->route('employee/managejob/{$user_id}');
//        return \redirect()->route('employee/managejob', ['id'=> $user_id]);
//          return \redirect()->action('EmployeeController@managejob',  ['id'=>$id_job->user_id]);
          return \redirect()->action('EmployeeController@managejob',  ['id'=>$cry_user_id])->with('success','Job Edited successfully');
    }


//    public function manageCandidate($id,$job_id)
//    {
//        $user_id = decrypt($id);
//        $user =DB::table('users')->find($user_id);
////        dd($user);
//        $id_job = decrypt($job_id);
//        $jobs = DB::table('jobs')->select()->where('id', $id_job)->first();
//        $candidate_jobs = DB::table('candidate_applied_jobs')->select()->where('job_id', $jobs->id)->get();
//       //dd($candidate_jobs);
////        for($candidate_jobs->user_id){
////            $candidate_users = DB::table('users')->select()->whereIn('id', $candidate_jobs->user_id)->get();
////            $abc[] = $candidate_users;
////        }
////        dd($abc);
//        if (empty($candidate_jobs[0])) {
////            dd('in manage Candidate show view USER NOT FOUND');
////            return redirect('/employee/editprofile');
//                return redirect()->back()->with('warning', 'No applications found');
//            }
//
//        foreach ($candidate_jobs as $rst){
//        $candidate_users = DB::table('users')->select()->where('id', $rst->user_id)->first();
////            $candidate_users = DB::table('users')->select()->whereIn('id', $rst->user_id)->get();
//            $abc[] = $candidate_users;
////        $candidate_users = DB::table('users')->select()->where('id', $candidate_jobs[1]->user_id)->get();
////        dd($candidate_users);
//        $candidate_skills = DB::table('candidate_skills')->select()->where('user_id', $candidate_users->id)->first();
//        $candidate_abouts = DB::table('candidate_abouts')->select()->where('user_id', $candidate_users->id)->first();
//        $candidate_educations = DB::table('candidate_educations')->select()->where('user_id', $candidate_users->id)->first();
//        $candidate_experiences = DB::table('candidate_experiences')->select()->where('user_id', $candidate_users->id)->first();
//        $candidate_professional_skills = DB::table('candidate_professional_skills')->select()->where('user_id', $candidate_users->id)->first();
//        $candidate_special_qualifications = DB::table('candidate_special_qualifications')->select()->where('user_id', $candidate_users->id)->first();
//        $candidate_portfolios = DB::table('candidate_portfolios')->select()->where('user_id', $candidate_users->id)->first();
//        $candidate_personal_informations = DB::table('candidate_personal_informations')->select()->where('user_id', $candidate_users->id)->first();
//        }
////        dd($abc);
////        dd($candidate_jobs);
//        return view('employee.manageCandidate',
//            compact('user','jobs','candidate_jobs','candidate_users',
//                'candidate_skills','candidate_abouts','candidate_educations','candidate_experiences',
//                'candidate_professional_skills','candidate_special_qualifications','candidate_portfolios',
//                'candidate_personal_informations'));
//    }
    public function manageCandidate($id,$job_id)
    {
        $user_id = decrypt($id);
        $user =DB::table('users')->find($user_id);
//        dd($user);
        $id_job = decrypt($job_id);

        $jobss = DB::table('jobs')->select()->where('id', $id_job)->first();
//        dd($jobss);

        $candidate_jobs = DB::table('candidate_applied_jobs')->select()->where('job_id', $jobss->id)->get();
//        $b = count($candidate_jobs);
//        dd($b);


        foreach ($jobss as $jobs){
            $applied_candidate = DB::table('candidate_applied_jobs')
                ->select('candidate_applied_jobs.status as job_status', 'candidate_applied_jobs.user_id as user_id', 'users.email as email', 'users.avatar as avatar',
                    'candidate_applied_jobs.job_id as job_id','users.name as name','candidate_abouts.category as category','candidate_abouts.location as location')


                ->join('users', 'candidate_applied_jobs.user_id', '=', 'users.id')
                ->join('candidate_abouts', 'candidate_applied_jobs.user_id', '=', 'candidate_abouts.user_id')
                ->where('job_id', $id_job)->get();
//            $candidate_users = DB::table('users')->select()->where('id', $rst->user_id)->first();
//            $candidate_users = DB::table('candidate_applied_jobs')
////                ->join('jobs','candidate_applied_jobs.job_id', '=',$jobs[0]->id)
//                ->join('jobs','candidate_applied_jobs.job_id', '=','jobs.id')
//                ->join('users','candidate_applied_jobs.user_id', '=','users.id')
//                ->join('candidate_abouts','users.id','=','candidate_abouts.user_id')
////                ->select('*','users.name as user_name','candidate_abouts.category as category','candidate_abouts.location as location')
//                ->select('*')
//                ->get();
//        dd('in');
        }
        $applied_users_count =  count($applied_candidate);
//        dd($applied_candidate);
//        dd($candidate_jobs);
//            dd($candidate_users);
            $b = count($candidate_jobs);

//        $candidate_abouts = DB::table('candidate_abouts')->select()->where('user_id', $candidate_users->id)->first();

//        }
//        dd('ou');
        return view('employee.manageCandidate1',
//                    ['user' => $user , 'jobss' => $jobss, 'candidate_jobs' => $candidate_jobs, 'applied_candidate' => $applied_candidate ]
//            compact('user','jobss',['candidate_jobs' => $candidate_jobs ],'applied_candidate'
            compact('user','jobss' ,'applied_candidate')
                );
    }
    public function candidateResumeView($candidate_id,$user_id)
    {

        $candidate_id_get = decrypt($candidate_id);

        $candidate =DB::table('users')->find($candidate_id_get);
        $employee_id_ = decrypt($user_id);
        $employee =DB::table('users')->find($employee_id_);

        $candidate_skills = DB::table('candidate_skills')->select()->where('user_id', $candidate->id)->first();
        $candidate_abouts = DB::table('candidate_abouts')->select()->where('user_id', $candidate->id)->first();
        $candidate_educations = DB::table('candidate_educations')->select()->where('user_id', $candidate->id)->first();
        $candidate_experiences = DB::table('candidate_experiences')->select()->where('user_id', $candidate->id)->first();
        $candidate_professional_skills = DB::table('candidate_professional_skills')->select()->where('user_id', $candidate->id)->first();
        $candidate_special_qualifications = DB::table('candidate_special_qualifications')->select()->where('user_id', $candidate->id)->first();
        $candidate_portfolios = DB::table('candidate_portfolios')->select()->where('user_id', $candidate->id)->first();
        $candidate_personal_informations = DB::table('candidate_personal_informations')->select()->where('user_id', $candidate->id)->first();

        $candidateSkills = DB::table('candidate_skills')
         ->where('user_id', $candidate->id)
         ->get();
         $candidateEducations = DB::table('candidate_educations')
         ->where('user_id', $candidate->id)
         ->get();
         $candidateExperiences = DB::table('candidate_experiences')
         ->where('user_id', $candidate->id)
         ->get();
         $candidateProfessionalSkills = DB::table('candidate_professional_skills')
         ->where('user_id', $candidate->id)
         ->get();
         $candidateSpecialQualifications = DB::table('candidate_special_qualifications')
         ->where('user_id', $candidate->id)
         ->get();
         $candidatePortfolios = DB::table('candidate_portfolios')
         ->where('user_id', $candidate->id)
         ->get();


        $exist = DB::table('cv_counters')->where('user_id', $candidate->id)
        ->first();

        if($exist){
                DB::table('cv_counters')->where('id', $exist->id)->update(array(
                        'count'=>$exist->count + 1,
                ));
        }
        else{
                DB::table('cv_counters')->insert(array(
                        'user_id'=>$candidate->id,
                        'count'=>1,
                ));
        }


        return view('employee.candidate_resume_view',
            compact('employee','candidate_skills','candidate_abouts',
                'candidate_educations','candidate_experiences','candidate_professional_skills',
                'candidate_special_qualifications','candidate_portfolios',
                'candidate_personal_informations','candidatePortfolios','candidateSpecialQualifications','candidateProfessionalSkills','candidateExperiences','candidateEducations','candidateSkills'));
    }

    public function shortListedResume($id)
    {
        $user_id = decrypt($id);
        $user =DB::table('users')->find($user_id);
        if (empty($user)) {
            dd('in manage Candidate show view USER NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }
        return view('employee.manageCandidate', compact('user'));
    }

    public function message($id)
    {
        $user_id = decrypt($id);
        $user =DB::table('users')->find($user_id);
        if (empty($user)) {
//            dd('in manage Candidate show view USER NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }
        return view('employee.message', compact('user'));
    }

    public function pricing($id)
    {
        $user_id = decrypt($id);
        $user =DB::table('users')->find($user_id);
        if (empty($user)) {
            return redirect()->back()->with('message', 'User not found');
        }
        $package_ids = DB::table('packages')->select('*')->get();

        $price_details = DB::table('packages')
        ->join('package_details', 'packages.id', '=', 'package_details.package_id')
        ->select('*')
        ->get();

        $features =  DB::table('package_feature_lists')
        ->select('*')
        ->get();

        $exist = 0;
        $existRecord = '';

        $record =  DB::table('employee_packages')
        ->where('user_id', Auth::user()->id)
        ->where('status', 1)
        ->first();

        if(!empty($record)){
            $jobsLimit = $record->jobs_limit;
            $exist = 1;

            $existRecord =  DB::table('employee_packages')
            ->where('user_id', Auth::user()->id)
            ->where('jobs_count', '<' , $jobsLimit)
            ->where('status', 1)
            ->first();

        }

        return view('employee.pricing', ['exist'=> $exist ,'existRecord'=> $existRecord ,'user'=> $user , 'packages' => $price_details , 'features'=>$features]);
    }

//    public function pricing_details($id,$p_id)
//    {
//        $user_id = decrypt($id);
//        $user =DB::table('users')->find($user_id);
//        if (empty($user)) {
//            dd('in manage Candidate show view USER NOT FOUND');
////            return redirect('/employee/editprofile');
//            return redirect()->back()->with('message', 'User not found');
//        }
//
//        return view('employee.pricing', compact('user'));
//    }

//    public function pricingNew()
//    {
////        $user_id = decrypt($id);
////        $user =DB::table('users')->find($user_id);
////        if (empty($user)) {
////            dd('in manage Candidate show view USER NOT FOUND');
//////            return redirect('/employee/editprofile');
////            return redirect()->back()->with('message', 'User not found');
////        }
//
//        return view('employee.pricing_new');
//    }

    public function pricingPlaneEditPage($id)
    {
        $user_id = decrypt($id);
        $user =DB::table('users')->find($user_id);
//        $user =DB::table('users')->select()->where('id',$user_id)->get();
//        dd($user);
        if (empty($user)) {
            dd('in manage Candidate show view USER NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }

        $package = DB::table('packages')->select('*')->get();
        $package_currency = DB::table('package_currencys')->select('*')->get();
        $package_max_user = DB::table('package_max_users')->select('*')->get();
//        $package_details = DB::table('package_details')->select('*')->get();
//        dd($package);
//        return view('employee.pricingPlaneEditPage', compact('user','package','package_currency','package_max_user'));
        return view('employee.pricingPlaneEditPage', [ 'user' =>$user , 'packages' => $package ,
            'package_currencys' => $package_currency , 'package_max_users' =>$package_max_user] );

    }

    public function save_pricingPlaneEditPage(Request $request,$id)
    {
        $user_id = decrypt($id);
//        $package_id = decrypt($package_id);

        $user =DB::table('users')->find($user_id);
        $package_id = \request()->get('package_name')  ;
//        dd($package_id);

        $package =DB::table('packages')->select()->where('id',$package_id)->first();
//        dd($package->id);
//        $package =DB::table('packages')->select('id')->where('user_id', $user->id);


        if (empty($user)) {
            dd('in manage Candidate show view USER NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }
        $validator = Validator::make($request->all(),[
//            'package_description' => 'image|dimensions:max_width=250,max_height=250|mimes:jpeg,png|nullable',
            'package_name' => 'required',
            'package_description' => 'string|max:255|nullable',
            'currency' => 'required',
            'monthly_rate' => 'required',
            'yearly_rate' => 'required',
            'max_users' => 'required',
             ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

//        dd($request->get('name'));
//        dd('done');

        $feature_list = array();
        $feature_lists = $request->get('name');
//        dd($feature_lists);


        $p_id = $package->id;
//        dd($p_id);
        $package_description = $request->input('package_description');
        $currency = $request->input('currency');
        $monthly_rate = $request->input('monthly_rate');
        $yearly_rate = $request->input('yearly_rate');
        $max_users = $request->input('max_users');
//        $newpassword = $request->input('new_password');

        $product_details = DB::table('package_details')->insert(array(
            'package_id' => $p_id,
            'package_description' => $package_description,
            'currency' => $currency,
            'monthly_rate' => $monthly_rate,
            'yearly_rate' => $yearly_rate,
            'max_users' => $max_users,
        ));

        $p = DB::table('package_details')->latest('id')->first();


//        dd($p->);
        $pta_nai_id = $p->id;
//        $package_details_id = DB::table('package_details')->find($product_details->id);
//            ->select('package_id')
//            ->where('package_id', $p_id)
//            ->first();
//        dd($package_details_id);
//        $id_package_details =  $package_details_id->id;
        foreach ($feature_lists as $feature_list )
        {
            DB::table('package_feature_lists')->insert(array(
                'package_details_id' => $pta_nai_id,
                'feature_name' => $feature_list

            ));
        }
//        return view('employee.pricing', compact('user','p_id'));
        return \redirect()->action('EmployeeController@pricing', encrypt($user->id));

    }

    public function managePricing($id)
    {
        $user_id = decrypt($id);
//
////        dd($request->id);
////        $user_id = Crypt::decrypt($id);
//        $id_user =DB::table('users')->find($user_id);
        $user_found =DB::table('users')->find($user_id);
//        dd($user_found);
        if (empty($user_found)) {
//            dd('in manage job show view USER NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }

        $packages = DB::table('packages')->select()->where('user_id', $user_found->id)->get();

        return view('employee.managePricing', compact('packages'));
    }

    public function managePricingEdit($id)
    {
        $package_id = decrypt( $id);
//            dd($user_id);
        $packages = DB::table('packages')->select()->where('id', $package_id)->get();
        $package_details = DB::table('package_details')->select()->where('package_id', $package_id)->get();
//            ->join('users', 'candidate_applied_jobs.user_id', '=', 'users.id')

//        dd($package_details);
//        foreach ($package_details as $package_detail)
//        {
            $package_feature_lists = DB::table('package_feature_lists')->select('*')->get();
//        }
//            ->join('package_details','packages.id','package_details.package_id' )
//            ->join('package_feature_lists','package_details.id','package_feature_lists.package_details_id')
//            ->where('id', $package_id)
//            ->get();
//        dd($packages);
//        dd($package_feature_lists);

//        return view('employee.managePricingEdit',compact('packages' ,'package_details','package_feature_lists'));
        return view('employee.managePricingEdit',['packages' => $packages ,'package_details' =>$package_details,'package_feature_lists'=>$package_feature_lists]);

    }

    public function checkout($id)
    {
        $user =DB::table('users')->find($id);
        if (empty($user)) {
            dd('in manage Candidate show view USER NOT FOUND');
//            return redirect('/employee/editprofile');
            return redirect()->back()->with('message', 'User not found');
        }
        return view('employee.checkout', compact('user'));
    }

    function changestatus(request $request){
        $user_id = $request->user_id;
        $job_id = $request->job_id;
        $status = $request->status;

        $statusUpdate = DB::table('candidate_applied_jobs')->where('user_id', $user_id)->where('job_id', $job_id)
                            ->update( array(
                                'status' => $status,
                                )
                            );


        $record = array('user_id' => $user_id, 'job_id' => $job_id, 'status' => $status);

        echo json_encode('Status Updated');
    }

    function changeJobstatus(request $request){
        $user_id = $request->user_id;
        $job_id = $request->job_id;
        $status = $request->status;

//        dd($job_id);
        $statusUpdate = DB::table('jobs')->where('id', $job_id)
                            ->update( array(
                                'status' => $status,
                                )
                            );


        $record = array('user_id' => $user_id, 'job_id' => $job_id, 'status' => $status);

        echo json_encode('Status Updated');
    }

    public function email(Request $request, $id)
    {
        $data = array('name'=>"yeh to hoga bhai");

            Mail::send(['text'=>'mail'], $data, function($message) {
//            $message->to('ali_naeem89@live.com', 'Tutorials Point')->subject
            $message->to('umairpervaizbutt@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');

//            $message->from('umairpervaizbutt@gmail.com','Virat Gandhi');
            $message->from('yehtohoga605@gmail.com','yeh to hoga bhai ');
//            die();
        });

//        echo "Basic Email Sent. Check your inbox.";

//        dd('in');
//        $user_id = decrypt($id);
//
//        dd($user_id);
//        dd('in');
        return \redirect()->back();
    }

//    function actionindex()
//    {
//        return view('employee.managejob');
//    }

        // function downloadCvFormatter($id){
        //         // a pdf will be saved
        //         Browsershot::url(route('cv', $id))->save('cv.pdf');
        // }

    function cv($id)
        {
            $candidate = DB::table('users')->find($id);

            $candidate_abouts = DB::table('candidate_abouts')->select()->where('user_id', $candidate->id)->first();
            $candidate_educations = DB::table('candidate_educations')->select()->where('user_id', $candidate->id)->first();
            $candidate_experiences = DB::table('candidate_experiences')->select()->where('user_id', $candidate->id)->first();

            $candidate_professional_skills = DB::table('candidate_professional_skills')->select()->where('user_id', $candidate->id)->first();
            $candidate_special_qualifications = DB::table('candidate_special_qualifications')->select()->where('user_id', $candidate->id)->first();
            $candidate_portfolios = DB::table('candidate_portfolios')->select()->where('user_id', $candidate->id)->first();
            $candidate_personal_informations = DB::table('candidate_personal_informations')->select()->where('user_id', $candidate->id)->first();
            $skills = DB::table('skills')->get();
            $user9 = DB::table('candidate_skills')->select()->where('user_id', $candidate->id)->first();

            $candidateSkills = DB::table('candidate_skills')
            ->where('user_id', $id)
            ->get();
            $candidateEducations = DB::table('candidate_educations')
            ->where('user_id', $id)
            ->get();
            $candidateExperiences = DB::table('candidate_experiences')
            ->where('user_id', $id)
            ->get();
            $candidateProfessionalSkills = DB::table('candidate_professional_skills')
            ->where('user_id', $id)
            ->get();
            $candidateSpecialQualifications = DB::table('candidate_special_qualifications')
            ->where('user_id', $id)
            ->get();

            // $pdf = PDF::loadView('cvexample', compact('candidateSpecialQualifications','candidateProfessionalSkills','candidateExperiences','candidateEducations','candidateSkills', 'candidate_abouts','candidate_educations', 'candidate_experiences','candidate_professional_skills','candidate_special_qualifications','candidate_portfolios','candidate_personal_informations','skills','user9'));
            // return $pdf->download('cv.pdf', $pdf);

            return view('cvexample',compact('candidateSpecialQualifications','candidateProfessionalSkills','candidateExperiences','candidateEducations','candidateSkills','candidate_abouts','candidate_educations','candidate_experiences','candidate_professional_skills','candidate_special_qualifications','candidate_personal_informations','skills','user9'));
        }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('jobs')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('job_location', 'like', '%'.$query.'%')
                    ->orWhere('type', 'like', '%'.$query.'%')
                    ->orWhere('endingDate', 'like', '%'.$query.'%')
//                    ->orWhere('PostalCode', 'like', '%'.$query.'%')
//                    ->orWhere('Country', 'like', '%'.$query.'%')
                    ->orderBy('id', 'asc')
                    ->get();

            }
            else
            {
                $data = DB::table('jobs')
                    ->orderBy('id', 'asc')
                    ->get();
            }
            $job_id = $job->id;
//
            $count_total_application = DB::table('candidate_applied_jobs')->where('job_id', $job_id)->count();
            echo ($count_total_application);
            $total_row = $data->count();
            $i = 0;
            if($total_row > 0)
            {

                foreach($data as $row)
                {
                    $i++;
                    $output .= '
        <tr>
        <td style="display: none"><input type="hidden" name="userid'.$i.'" id="userid'.$i.'" value="'.$row->user_id.'" ></td>
        <td style="display: none"><input type="hidden" name="jobid'.$i.'" id="jobid'.$i.'" value="'.$row->id.'" ></td>
        <td class="title">
                                        <h5><a href="{{route(\'postjobview\',encrypt($job->id) )}}">'.$row->title.'</a></h5>
                                        <div class="info">
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>'.$row->job_location.'</a></span>
                                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>'.$row->type.'</a></span>
                                        </div>
                                    </td>

         <td>'.$row->job_location.'</td>
         <td>'.$row->endingDate.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
//                'table'  => $output,
                'total_data'  => $total_row
            );

//            return view('employee.managejob',$total_row);

            echo json_encode($data);
        }
    }

    public function deleteJob($id){
        $idJob = decrypt($id);

        DB::table('jobs')->where('id', $idJob)
        ->delete();

        return redirect()->back()->with('success', "Job Deleted Succesfully");
    }

    public function paymentmethod(Request $request,$packageId)
    {
        $packageId = decrypt($packageId);

        $exist = 0;
        $existRecord = '';

        $record =  DB::table('employee_packages as ep')->select('ep.jobs_limit')
        ->where('user_id', Auth::user()->id)
        ->where('status', 1)
        ->first();


        if(isset($record)){
                $exist = 1;
                $jobsLimit = $record->jobs_limit;

                $existRecord =  DB::table('employee_packages as ep')->select('*')
                ->where('ep.user_id', Auth::user()->id)
                ->where('ep.jobs_count', '<' , $jobsLimit)
                ->where('ep.status', 1)
                ->first();
        }

        if($exist == 1){
                if($existRecord != "" || !empty($existRecord)){
                        if($existRecord->package_id == $packageId){
                                return redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning', 'You have already Purchased this Package');
                        }
                }

        }


        $errorURL = route('pricing', encrypt(Auth::user()->id));

        $successURL = route('paymentSuccess');

        $package_info = DB::table('packages as P')
        ->select('*')
        ->join('package_details as PD', 'P.id', '=', 'PD.package_id')
        ->where('P.id', $packageId)
        ->get();

        $package = array();

        foreach ($package_info as $key => $value) {
                $package['id'] = $value->package_id;
                $package['package_detail_id'] = $value->id;
                $package['package_name'] = $value->package_name;
                $package['package_description'] = $value->package_description;
                $package['currency'] = $value->currency;
                $package['monthly_rate'] = $value->monthly_rate;
                $package['yearly_rate'] = $value->yearly_rate;
                $package['job_limit_monthly'] = $value->job_limit_monthly;
                $package['job_limit_yearly'] = $value->job_limit_yearly;
                $package['cv_limit_monthly'] = $value->cv_limit_monthly;
                $package['cv_limit_yearly'] = $value->cv_limit_yearly;
        }

        $user_info = DB::table('users')->where('id', '=', Auth::user()->id)->first();


        $total_price = $package['monthly_rate'];
        $jobLimit = $package['job_limit_monthly'];
        $cvLimit = $package['cv_limit_monthly'];

        $username='apiaccount@myfatoorah.com';
        $password='api12345*';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,'https://apidemo.myfatoorah.com/Token');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password','username' => $username,'password' =>$password)));
        $result = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);
        $json = json_decode($result, true);
        if(isset($json['access_token']) && !empty($json['access_token'])){
            $access_token= $json['access_token'];
        }else{
            $access_token='';
        }
        if(isset($json['token_type']) && !empty($json['token_type'])){
            $token_type= $json['token_type'];
        }else{
            $token_type='';
        }

        if(isset($json['access_token']) && !empty($json['access_token']))
        {
            if($user_info->phoneNo == null ||  $user_info->phoneNo == ' ')
            {
                return redirect()->back()->with('warning','Please complete your profile in order to place purchase');
            }
            else {
                $t = time();
                $name = $user_info->name;
                $post_string = '{
                "InvoiceValue": 10,
                "CustomerName": "' . $name . '",
                "CustomerBlock": "qweqw",
                "CustomerStreet": "asdasdsa",
                "CustomerAvenue": "wrwerw",
                "CustomerHouseBuildingNo": "34234",
                "CustomerFloor": "asdasdad",
                "CustomerFlat": "qwqweqwe",
                "CustomerDeliveryInstructions":"asdasdasd",
                "CustomerCivilId": "123456789124",
                "CustomerAddress": "Payment Address",
                "CustomerReference": "' . $t . '",
                "DisplayCurrencyIsoAlpha": "KWD",
                "CountryCodeId": "+965",
                "CustomerMobile": "' . $user_info->phoneNo . '",
                "CustomerEmail": "' . $user_info->email . '",
                "DisplayCurrencyId": 3,
                "SendInvoiceOption": 1,
               "InvoiceItemsCreate": [
                  {
                    "ProductId": null,
                    "ProductName": "' . $package['package_name'] . '",
                    "Quantity": 1,
                    "UnitPrice": "' . $total_price . '"
                  }
                ],
               "CallBackUrl":  "' . $successURL . '",
                "Language": 2,
                "ExpireDate": "2022-12-31T13:30:17.812Z",
                "ApiCustomFileds": "' . $package['id'] . ',' . $jobLimit . ',' . $cvLimit . '",
                "ErrorUrl": "' . $errorURL . '"
              }';

                $soap_do = curl_init();
                curl_setopt($soap_do, CURLOPT_URL, "https://apidemo.myfatoorah.com/ApiInvoices/CreateInvoiceIso");
                curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
                curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($soap_do, CURLOPT_POST, true);
                curl_setopt($soap_do, CURLOPT_POSTFIELDS, $post_string);
                curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Content-Length: ' . strlen($post_string), 'Accept: application/json', 'Authorization: Bearer ' . $access_token));
                $result1 = curl_exec($soap_do);
                $err = curl_error($soap_do);

                $json1 = json_decode($result1, true);

                $RedirectUrl = $json1['RedirectUrl'];
                $ref_Ex = explode('/', $RedirectUrl);
                $referenceId = $ref_Ex[4];
                curl_close($soap_do);
                echo '<script type="text/javascript">
                        window.location="' . $RedirectUrl . '";
                </script>';
            }
        }
        else{
                return redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning', 'Something Went Wrong, Please Try again later.');
        }

    }

    public function paymentSuccess(Request $request){
        $username='apiaccount@myfatoorah.com';
        $password='api12345*';
            //call back to same index page after payment page redirect
        if(isset($_GET['paymentId'])){
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL,'https://apidemo.myfatoorah.com/Token');
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password','username' => $username,'password' => $password)));
                $result = curl_exec($curl);
                $error= curl_error($curl);
                $info = curl_getinfo($curl);
                curl_close($curl);
                $json = json_decode($result, true);
                $access_token= $json['access_token'];
                $token_type= $json['token_type'];
                if(isset($_GET['paymentId']))
                {
                    $id=$_GET['paymentId'];
                }
                $password= 'MYFQapp112200';
                $url = 'https://apidemo.myfatoorah.com/ApiInvoices/Transaction/'.$id;
                $soap_do1 = curl_init();
                curl_setopt($soap_do1, CURLOPT_URL,$url );
                curl_setopt($soap_do1, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($soap_do1, CURLOPT_TIMEOUT, 10);
                curl_setopt($soap_do1, CURLOPT_RETURNTRANSFER, true );
                curl_setopt($soap_do1, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($soap_do1, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($soap_do1, CURLOPT_POST, false );
                curl_setopt($soap_do1, CURLOPT_POST, 0);
                curl_setopt($soap_do1, CURLOPT_HTTPGET, 1);
                curl_setopt($soap_do1, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Accept: application/json','Authorization: Bearer '.$access_token));
                $result_in = curl_exec($soap_do1);
                $err_in = curl_error($soap_do1);
                $file_contents = htmlspecialchars(curl_exec($soap_do1));

                // dd($file_contents);
                curl_close($soap_do1);
                $getRecorById = json_decode($result_in, true);


                $finalResult = array();
                $finalResult['InvoiceId'] = $getRecorById['InvoiceId'];
                $finalResult['InvoiceReference'] = $getRecorById['InvoiceReference'];
                $finalResult['CreatedDate'] = $getRecorById['CreatedDate'];
                $finalResult['ExpireDate'] = $getRecorById['ExpireDate'];
                $finalResult['InvoiceValue'] = $getRecorById['InvoiceValue'];
                $finalResult['Comments'] = $getRecorById['Comments'];
                $finalResult['CustomerName'] = $getRecorById['CustomerName'];
                $finalResult['CustomerMobile'] = $getRecorById['CustomerMobile'];
                $finalResult['CustomerEmail'] = $getRecorById['CustomerEmail'];
                $finalResult['TransactionDate'] = $getRecorById['TransactionDate'];
                $finalResult['PaymentGateway'] = $getRecorById['PaymentGateway'];
                $finalResult['ReferenceId'] = $getRecorById['ReferenceId'];
                $finalResult['TrackId'] = $getRecorById['TrackId'];
                $finalResult['TransactionId'] = $getRecorById['TransactionId'];
                $finalResult['PaymentId'] = $getRecorById['PaymentId'];
                $finalResult['AuthorizationId'] = $getRecorById['AuthorizationId'];
                $finalResult['OrderId'] = $getRecorById['OrderId'];
                $finalResult['TransactionStatus'] = $getRecorById['TransactionStatus'];
                $finalResult['Error'] = $getRecorById['Error'];
                $finalResult['PaidCurrency'] = $getRecorById['PaidCurrency'];
                $finalResult['PaidCurrencyValue'] = $getRecorById['PaidCurrencyValue'];
                $finalResult['TransationValue'] = $getRecorById['TransationValue'];
                $finalResult['CustomerServiceCharge'] = $getRecorById['CustomerServiceCharge'];
                $finalResult['DueValue'] = $getRecorById['DueValue'];
                $finalResult['Currency'] = $getRecorById['Currency'];
                $finalResult['ApiCustomFileds'] = $getRecorById['ApiCustomFileds'];
                $finalResult['PackageName'] = $getRecorById['InvoiceItems'][0]['ProductName'];

                // return $finalResult;
                $package_info = explode(',',$finalResult['ApiCustomFileds']);

                if($finalResult['TransactionStatus'] != 2){
                        redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning', 'Payment Status is Unsuccessfull, Please Try again later.');
                }

                DB::table('employee_packages')->where('user_id' , Auth::user()->id)->update(array(
                        'status' => 0,
                ));

                DB::table('employee_packages')->insert(array(

                        'user_id' => Auth::user()->id,
                        'package_id' => $package_info[0],

                        'payment_id' => $finalResult['TransactionId'],
                        'invoice_id' => $finalResult['InvoiceId'],
                        'order_id' => $finalResult['OrderId'],
                        'authorization_id' => $finalResult['AuthorizationId'],

                        'package_name' => $finalResult['PackageName'],
                        'currency' => $finalResult['Currency'],
                        'amount_paid' => $finalResult['DueValue'],
                        'payment_gateway' => $finalResult['PaymentGateway'],

                        'customer_name' => $finalResult['CustomerName'],
                        'customer_email' => $finalResult['CustomerEmail'],
                        'customer_phone' => $finalResult['CustomerMobile'],

                        'jobs_limit' => $package_info[1],
                        'cv_limit' => $package_info[2],

                ));

                $finalResult = DB::table('employee_packages')
                ->where('user_id', Auth::user()->id)
                ->where('status', 1)
                ->first();

                return view('employee.payment-complete', compact('finalResult'));
        }
        else{
                return redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning', 'Something Went Wrong, Please Try again later.');
        }


    }

    public function paymentHistory(Request $request){
        $invoices = DB::table('employee_packages')
        ->where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'Desc')
        ->get();

        return view('employee.paymentHistory', compact('invoices'));
    }

    public function invoicePage(Request $request, $id){
            $invoiceId = decrypt($id);
            $invoice = DB::table('employee_packages')->find($invoiceId);

            if($invoice->user_id != Auth::user()->id){
                return redirect()->route('pricing', encrypt(Auth::user()->id))->with('warning', 'Something Went Wrong.');
            }

            return view('employee.paymentInvoice', compact('invoice'));
    }

}
