<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
{
    public function create()
    {
        $countries = DB::table('countries')->get();
        $genders = DB::table('job_genders')->get();
        $maritalStatus = DB::table('candidate_marital_status')->get();
        $categories = DB::table('employee_bussiness_categories')->get();
        $careerLevels = DB::table('job_career_levels')->select()->get();
        $salaries = DB::table('job_salary_ranges')->get();
        $degreeLevels = DB::table('job_qualifications')->get();
        $languages = DB::table('languages')->get();
        $personalInfo = DB::table('candidate_personal_informations')->where('user_id', Auth::user()->id)->first();
        $professionalInfo = DB::table('candidate_abouts')->where('user_id', Auth::user()->id)->first();
        $educationInfos = DB::table('candidate_educations')->where('user_id', Auth::user()->id)->get();
        $experienceInfos = DB::table('candidate_experiences')->where('user_id', Auth::user()->id)->get();
        $candidate_skills = DB::table('candidate_skills')->where('user_id', Auth::user()->id)->first();
        $skills = DB::table('skills')->get();

        return view('candidates.pages.resume.create',
            compact('countries','genders','maritalStatus','categories','careerLevels',
                            'salaries','degreeLevels','languages','personalInfo','professionalInfo',
                            'educationInfos','experienceInfos','candidate_skills','skills'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'firstName' => 'string|max:255|required',
            'lastName' => 'string|max:255|required',
            'DOB' => 'required|date',
            'nationality' => 'required',
            'gender' => 'required',
            'maritalStatus' => 'required',
            'address' => 'required',
            'phoneNo' => 'required',
            'field_of_expertise' => 'required',
            'location' => 'required',
            'country_of_interest' => 'required',
            'career_level' => 'required',
            'salary' => 'required',
            'expected_salary' => 'required',
            'qualification' => 'required',
            'language' => 'required',
//            'degree' => 'required',
//            'field_of_study' => 'required',
//            'institution' => 'required',
            'starting_date' => 'date',
            'ending_date' => 'date|after_or_equal:starting_date',
//            'description' => 'string|required|max:255',
//            'company' => 'string|max:256',
//            'company_location' => 'required',
//            'position' => 'string|max:256',
            'experience_starting_date' => 'date',
            'experience_ending_date' => 'date|after_or_equal:experience_starting_date',
//            'experience_description' => 'string|max:255',
            'skills' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        for ($i = 0; $i < count($request->candidate_educations); $i++)
        {
            if(isset($request->candidate_educations[$i]['ending_date']))
            {
                $check  = $request->candidate_educations[$i]['starting_date'] <= $request->candidate_educations[$i]['ending_date'];

                if ($check == false) {
                    return redirect()->back()->with('error','Check TO DATE FIELD in Education part, should be greater than FROM DATE FIELD');
                }
            }
        }

        for ($i = 0; $i < count($request->candidate_experiences); $i++)
        {
            if (isset($request->candidate_experiences[$i]['experience_ending_date']))
            {
                $check  = $request->candidate_experiences[$i]['experience_starting_date'] <= $request->candidate_experiences[$i]['experience_ending_date'];

                if ($check == false) {
                    return redirect()->back()->with('error','Check TO DATE FIELD in Experience part, should be greater than FROM DATE FIELD');
                }
            }
        }


        $personalCheck = DB::table('candidate_personal_informations')->where('user_id', Auth::user()->id)->first();

        if (isset($personalCheck))
        {
            DB::table('candidate_personal_informations')
                ->where('user_id', $personalCheck->user_id)
                ->update([
                    'firstName' => $request->input(['firstName']),
                    'lastName' => $request->input(['lastName']),
                    'DOB' => $request->input(['DOB']),
                    'nationality' => $request->input(['nationality']),
                    'gender' => $request->input(['gender']),
                    'maritalStatus' => $request->input(['maritalStatus']),
                    'address' => $request->input(['address']),
                ]);
        }
        else {
            DB::table('candidate_personal_informations')
                ->insert([
                    'user_id' => Auth::user()->id,
                    'firstName' => $request->input(['firstName']),
                    'lastName' => $request->input(['lastName']),
                    'DOB' => $request->input(['DOB']),
                    'nationality' => $request->input(['nationality']),
                    'gender' => $request->input(['gender']),
                    'maritalStatus' => $request->input(['maritalStatus']),
                    'address' => $request->input(['address']),
                ]);
        }

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'phoneNo' => $request->input(['phoneNo']),
                'phoneNo2' => $request->input(['phoneNo2']),
                'companyPhoneNo' => $request->input(['companyPhoneNo']),
            ]);

        $professionalInfoCheck = DB::table('candidate_abouts')->where('user_id', Auth::user()->id)->first();

        $countryOfInterest  = implode(',', $request->input(['country_of_interest']));
        $fieldOfExperts  = implode(',', $request->input(['field_of_expertise']));

        if (isset($professionalInfoCheck))
        {
            $languages = implode(',', $request->input(['language']));
            DB::table('candidate_abouts')
                ->where('user_id', $professionalInfoCheck->user_id)
                ->update([
                    'field_of_expertise' => $fieldOfExperts,
                    'location' => $request->input(['location']),
                    'country_of_interest' => $countryOfInterest,
                    'career_level' => $request->input(['career_level']),
                    'salary' => $request->input(['salary']),
                    'expected_salary' => $request->input(['expected_salary']),
                    'qualification' => $request->input(['qualification']),
                    'language' => $languages,
                ]);
        }
        else {
            $languages = implode(',', $request->input(['language']));

            DB::table('candidate_abouts')
                ->insert([
                    'user_id' => Auth::user()->id,
                    'field_of_expertise' => $fieldOfExperts,
                    'location' => $request->input(['location']),
                    'country_of_interest' => $countryOfInterest,
                    'career_level' => $request->input(['career_level']),
                    'salary' => $request->input(['salary']),
                    'expected_salary' => $request->input(['expected_salary']),
                    'qualification' => $request->input(['qualification']),
                    'language' => $languages,
                ]);
        }
            DB::table('candidate_educations')
                ->where('user_id', Auth::user()->id)
                ->delete();

        for ($i = 0; $i < count($request->candidate_educations); $i++)
            {
                if (isset($request->candidate_educations[$i]['ending_date']))
                {
                    DB::table('candidate_educations')
                        ->insert([
                            'user_id' => Auth::user()->id,
                            'degree' => $request->candidate_educations[$i]['degree'],
                            'field_of_study' => $request->candidate_educations[$i]['field_of_study'],
                            'institution' => $request->candidate_educations[$i]['institution'],
                            'starting_date' => $request->candidate_educations[$i]['starting_date'],
                            'ending_date' => $request->candidate_educations[$i]['ending_date'],
                            'description' => $request->candidate_educations[$i]['description'],
                        ]);
                }
                else{
                    DB::table('candidate_educations')
                        ->insert([
                            'user_id' => Auth::user()->id,
                            'degree' => $request->candidate_educations[$i]['degree'],
                            'field_of_study' => $request->candidate_educations[$i]['field_of_study'],
                            'institution' => $request->candidate_educations[$i]['institution'],
                            'starting_date' => $request->candidate_educations[$i]['starting_date'],
                            'ending_date' => null,
                            'description' => $request->candidate_educations[$i]['description'],
                        ]);
                }

            }

        if (count($request->candidate_experiences) > 0)
        {
//            $experienceCheck = DB::table('candidate_experiences')->where('user_id', Auth::user()->id)->first();
//dd('in');
            DB::table('candidate_experiences')
                ->where('user_id', Auth::user()->id)
                ->delete();

//            if (isset($experienceCheck))
//            {
            for ($i = 0; $i < count($request->candidate_experiences); $i++)
            {
                if (isset($request->candidate_experiences[$i]['experience_ending_date']))
                {
                    DB::table('candidate_experiences')
                        ->insert([
                            'user_id' => Auth::user()->id,
                            'company' => $request->candidate_experiences[$i]['company'],
                            'company_location' => $request->candidate_experiences[$i]['company_location'],
                            'position' => $request->candidate_experiences[$i]['position'],
                            'experience_starting_date' => $request->candidate_experiences[$i]['experience_starting_date'],
                            'experience_ending_date' => $request->candidate_experiences[$i]['experience_ending_date'],
                            'experience_description' => $request->candidate_experiences[$i]['experience_description'],
                        ]);
                }
                else{
                    DB::table('candidate_experiences')
                        ->insert([
                            'user_id' => Auth::user()->id,
                            'company' => $request->candidate_experiences[$i]['company'],
                            'company_location' => $request->candidate_experiences[$i]['company_location'],
                            'position' => $request->candidate_experiences[$i]['position'],
                            'experience_starting_date' => $request->candidate_experiences[$i]['experience_starting_date'],
                            'experience_ending_date' => null,
                            'experience_description' => $request->candidate_experiences[$i]['experience_description'],
                        ]);

                }

            }
//            }
//            else {
//                DB::table('candidate_experiences')
//                    ->insert([
//                        'user_id' => Auth::user()->id,
//                        'company' => $request->input(['company']),
//                        'company_location' => $request->input(['company_location']),
//                        'position' => $request->input(['position']),
//                        'experience_starting_date' => $request->input(['experience_starting_date']),
//                        'experience_ending_date' => $request->input(['experience_ending_date']),
//                        'experience_description' => $request->input(['experience_description']),
//                    ]);
//            }
        }

        $skillsInfoCheck = DB::table('candidate_skills')->where('user_id', Auth::user()->id)->first();

        $skills =  implode(',', $request->skills);

        if (isset($skillsInfoCheck))
        {
            DB::table('candidate_skills')
                ->where('user_id', $skillsInfoCheck->user_id)
                ->update([
                    'skill' => $skills,
                ]);
        }

        else
            {
                DB::table('candidate_skills')
                    ->insert([
                        'user_id' => Auth::user()->id,
                        'skill' => $skills,
                    ]);
            }


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

        return redirect()->route('candidateDashboard')->with('success', 'Resume updated successfully!');
    }
}
