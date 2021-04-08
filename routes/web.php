<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $timeCheck = Carbon::now();
    $locations = DB::table('countries')->get();
    $active_jobs = DB::table('jobs') ->where('status', '=', 1)->where('approval_status', '=', '1')->where('expireDate','>=', Carbon::now())->count();
    $total_jobs = DB::table('jobs') ->where('approval_status', '=', 1)->where('expireDate','>=', Carbon::now())->orderBy('id','DESC')->get();
    $job_categories = DB::table('employee_bussiness_categories')->get();
    $total_candidates = DB::table('model_has_roles')->where('role_id', '=',3)->count();
    $total_companies_count = DB::table('model_has_roles')->where('role_id', '=',2)->count();
    $total_companies = DB::table('model_has_roles')->where('role_id', '=',2)->get();
    return view('welcome', compact('job_categories','locations','active_jobs',
                      'total_jobs','total_candidates','total_companies_count','total_companies','timeCheck'));
})->name('welcome');

Route::get('/candidate-registeration', 'Register\CandidateRegistrationController@registerView')->name('candidate-register');
Route::get('/employer-registeration', 'Register\EmployerRegistrationController@registerView')->name('employer-register');

Route::get('/clear', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/loginUser', 'AuthenticationController@login')->name('userLogin');
Route::post('/registerUser', 'RegisterController@register')->name('userRegister');

Route::get('/job-details/{id}', 'IndexController@job_details')->name('jobDetails');
Route::get('/job-details', 'IndexController@job_details_check')->name('jobDetailsCheck');
Route::post('/job-search', 'IndexController@job_search')->name('job_search');

Route::get('/cv', function () {
    return view('cvexample');
});
//Route::prefix('employee')->group(function (){
//    Route::middleware(['employer'])->group(function () {
//
//        Route::get('/dashboard/{id}', 'EmployeeController@dashboard')->name('employeedashboard');
//        Route::get('/editprofile/{id}', 'EmployeeController@editprofile')->name('editprofile');
//        Route::post('/editprofile/{id}', 'EmployeeController@save_editprofile');
//        Route::get('/managejob/{id}', 'EmployeeController@managejob')->name('managejob');
//        Route::get('/postjob/{id}', 'EmployeeController@postjob')->name('postjob');
//        Route::post('/postjob/{id}', 'EmployeeController@save_postjob');
//        Route::get('/postjobview/{id}', 'EmployeeController@postjobview')->name('postjobview');
//        Route::get('/postJobEdit/{id}', 'EmployeeController@postJobEdit')->name('postJobEdit');
//        Route::post('/postJobEdit/{id}', 'EmployeeController@update_postJob');
//
//        Route::get('/manageCandidate/{id}/{job_id}', 'EmployeeController@manageCandidate')->name('manageCandidate');
//        Route::get('/candidateResumeView/{candidate_id}/{user_id}', 'EmployeeController@candidateResumeView')->name('CandidateResumeView');
//        Route::get('/shortListedResume/{id}', 'EmployeeController@shortListedResume')->name('shortListedResume');
//        Route::get('/message/{id}', 'EmployeeController@message')->name('message');
//        Route::get('/pricing/{id}/', 'EmployeeController@pricing')->name('pricing');
//
//        Route::get('/pricingNew', 'EmployeeController@pricingNew')->name('pricingNew');
//
//        Route::get('/pricingPlaneEditPage/{id}', 'EmployeeController@pricingPlaneEditPage')->name('pricingPlaneEditPage');
//        Route::get('/managePricing/{id}', 'EmployeeController@managePricing')->name('managePricing');
//        Route::get('/managePricingEdit/{id}', 'EmployeeController@managePricingEdit')->name('managePricingEdit');
//        Route::post('/pricingPlaneEditPage/{id}', 'EmployeeController@save_pricingPlaneEditPage');
//
//        Route::get('/checkout/{id}', 'EmployeeController@checkout')->name('checkout ');
//        // Ajax Call To schange Status
//        Route::post('/changestatus', 'EmployeeController@changestatus')->name('changestatus');
//        Route::post('/changeJobstatus', 'EmployeeController@changeJobstatus')->name('changeJobstatus');
//        //ajax call to email candidate
//        Route::get('/live_search/action', 'EmployeeController@action')->name('live_search.action');
//        Route::get('/emailFunction/{id}', 'EmployeeController@email')->name('email_function');
//        Route::get('/cv/{id}', 'EmployeeController@cv')->name('cv');
//
//
//        Route::post('/payment-proceed/{id}', 'EmployeeController@paymentmethod')->name('paymentmethod');
//
//        Route::get('/delete-job/{id}', 'EmployeeController@deleteJob')->name('deleteJob');
//
//        Route::get('/payment-success1', 'EmployeeController@paymentSuccess')->name('paymentSuccess');
//
//        Route::get('/payment-history', 'EmployeeController@paymentHistory')->name('payHistory');
//
//        Route::get('/payment-invoice/{id}', 'EmployeeController@invoicePage')->name('invoicePage');
//
//    });
//});

Route::get('/pagination', 'PaginationController@index');

Route::get('/pagination/fetch_data', 'PaginationController@fetch_data');

//Route::prefix('candidate')->group(function (){
//    Route::middleware(['candidate'])->group(function () {
//        Route::group(['middleware' => 'common'], function(){
//            Route::get('/dashboard/{id}', 'CandidateController@dashboard')->name('candidatedashboardd');
//            Route::get('/edit_profile/{id}', 'CandidateController@edit_profile')->name('edit_profile');
//            Route::post('/edit_profile/{id}', 'CandidateController@save_edit_profile');
//            Route::get('/edit_resume/{id}', 'CandidateController@edit_resume')->name('edit_resume');
//            Route::get('/edit_about_us/{id}', 'CandidateController@edit_about_us')->name('edit_about_us');
//            Route::post('/edit_about_us/{id}', 'CandidateController@save_edit_about_us');
//
//            Route::post('/skills/{id}', 'CandidateController@save_skills')->name('skills');
//            Route::get('post/{id}/click', 'YourController@clickPost');
//
//
//            Route::post('/edit_personal_details/{id}', 'CandidateController@save_edit_personal_details')->name('edit_personal_details');
//            Route::post('/edit_education_background/{id}', 'CandidateController@save_edit_education_background')->name('edit_education_background');
//            Route::post('/edit_work_experience/{id}', 'CandidateController@save_edit_work_experience')->name('edit_work_experience');
//            Route::post('/edit_self_qualification/{id}', 'CandidateController@save_edit_self_qualification')->name('edit_self_qualification');
//            Route::post('/edit_professional_skills/{id}', 'CandidateController@save_edit_professional_skills')->name('edit_professional_skills');
//            Route::post('/edit_portfolio/{id}', 'CandidateController@save_edit_portfolio')->name('edit_portfolio');
//            Route::get('/bookmarks/{id}', 'CandidateController@bookmarks')->name('bookmarks');
//            Route::get('/applied_job/{id}', 'CandidateController@applied_job')->name('applied_job');
//            Route::get('/ignored_applied_job/{id}', 'CandidateController@ignored_applied_job')->name('ignored_applied_job');
//            Route::get('/interesting_applied_job/{id}', 'CandidateController@interesting_applied_job')->name('interesting_applied_job');
//            Route::get('/interview_applied_job/{id}', 'CandidateController@interview_applied_job')->name('interview_applied_job');
//            Route::get('/hired_applied_job/{id}', 'CandidateController@hired_applied_job')->name('hired_applied_job');
//            Route::get('/search/{id}', 'CandidateController@search')->name('search');
//            Route::get('/job_details/{id}/{user_id}', 'CandidateController@job_details')->name('job_details');
////            Route::get('/changeJobstatus/{id}/{user_id}', 'CandidateController@applyJob')->name('applyJob');
//
//            Route::post('/destory/{id}/{user_id}', 'CandidateController@destroy')->name('destroy');
//
//            Route::post('frameworks',   'CandidateController@store')->name('frameworks.store');
//
//            Route::post('search-country/company',   'CandidateController@searchCountryCompany')->name('searchCountryCompany');
//
//            Route::post('search-job/advance',   'CandidateController@searchAdvanceJob')->name('searchAdvanceJob');
//
//            Route::get('/account-statistics/{id}',   'CandidateController@accountStatistics')->name('accountStatistics');
//
//            Route::get('/delete/applied-job/{id}',   'CandidateController@deleteAppliedJob')->name('deleteAppliedJob');
//
//            Route::get('/delete/candidate-portfolio/{id}',   'CandidateController@candidatePortfolioDelete')->name('candidatePortfolioDelete');
//        });
//    });
//});

Route::prefix('admin')->group(function (){
    Route::get('/', 'Backend\AuthController@login')->name('adminLogin');
    Route::post('/admin-login', 'Backend\AuthController@loginPost')->name('adminLoginPost');

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', 'Backend\DashboardController@dashboard')->name('adminDashboard');
        Route::post('filterCountry', 'Backend\DashboardController@filterCountry')->name('filterCountryDashboard');
        Route::post('profile-update', 'Backend\AuthController@adminUpdateProfile')->name('adminUpdateProfile');

        Route::group(['prefix' => 'countries'], function () {
            Route::get('/', 'Backend\CountryController@listCountries')->name('listCountries');
            Route::get('/create', 'Backend\CountryController@createCountry')->name('createCountry');
            Route::post('/store', 'Backend\CountryController@storeCountry')->name('storeCountry');
            Route::get('/edit/{id}', 'Backend\CountryController@editCountry')->name('editCountry');
            Route::post('/update', 'Backend\CountryController@updateCountry')->name('updateCountry');
            Route::post('/delete', 'Backend\CountryController@deleteCountry')->name('deleteCountry');
        });

        Route::group(['prefix' => 'cities'], function () {
            Route::get('/', 'Backend\CityController@listCities')->name('listCities');
            Route::get('/create', 'Backend\CityController@createCity')->name('createCity');
            Route::post('/store', 'Backend\CityController@storeCity')->name('storeCity');
            Route::get('/edit/{id}', 'Backend\CityController@editCity')->name('editCity');
            Route::post('/update', 'Backend\CityController@updateCity')->name('updateCity');
            Route::post('/delete', 'Backend\CityController@deleteCity')->name('deleteCity');
        });

        Route::group(['prefix' => 'candidates'], function () {
            Route::get('/', 'Backend\CandidateController@list')->name('listCandidate');
        });

        Route::group(['prefix' => 'statistics'], function () {
            Route::get('/', 'Backend\StatisticController@list')->name('listStatistics');
            Route::post('filterCountry', 'Backend\StatisticController@filterCountry')->name('filterCountry');
        });

        Route::group(['prefix' => 'employee-business-categories'], function () {
            Route::get('/', 'Backend\EmployeeBusinessCategoryController@listCategories')->name('listCategories');
            Route::get('/create', 'Backend\EmployeeBusinessCategoryController@createCategory')->name('createCategory');
            Route::post('/store', 'Backend\EmployeeBusinessCategoryController@storeCategory')->name('storeCategory');
            Route::get('/edit/{id}', 'Backend\EmployeeBusinessCategoryController@editCategory')->name('editCategory');
            Route::post('/update', 'Backend\EmployeeBusinessCategoryController@updateCategory')->name('updateCategory');
            Route::post('/delete', 'Backend\EmployeeBusinessCategoryController@deleteCategory')->name('deleteCategory');
        });

        Route::group(['prefix' => 'candidate-job-locations'], function () {
            Route::get('/', 'Backend\JobCandidateLocationController@listLocations')->name('listLocations');
            Route::get('/create', 'Backend\JobCandidateLocationController@createLocation')->name('createLocation');
            Route::post('/store', 'Backend\JobCandidateLocationController@storeLocation')->name('storeLocation');
            Route::get('/edit/{id}', 'Backend\JobCandidateLocationController@editLocation')->name('editLocation');
            Route::post('/update', 'Backend\JobCandidateLocationController@updateLocation')->name('updateLocation');
            Route::post('/delete', 'Backend\JobCandidateLocationController@deleteLocation')->name('deleteLocation');
        });

        Route::group(['prefix' => 'job-career-levels'], function () {
            Route::get('/', 'Backend\JobCareerLevelController@listCareerLevels')->name('listCareerLevels');
            Route::get('/create', 'Backend\JobCareerLevelController@createCareerLevel')->name('createCareerLevel');
            Route::post('/store', 'Backend\JobCareerLevelController@storeCareerLevel')->name('storeCareerLevel');
            Route::get('/edit/{id}', 'Backend\JobCareerLevelController@editCareerLevel')->name('editCareerLevel');
            Route::post('/update', 'Backend\JobCareerLevelController@updateCareerLevel')->name('updateCareerLevel');
            Route::post('/delete', 'Backend\JobCareerLevelController@deleteCareerLevel')->name('deleteCareerLevel');
        });

        Route::group(['prefix' => 'job-qualifications'], function () {
            Route::get('/', 'Backend\JobQualificationController@listQualifications')->name('listQualifications');
            Route::get('/create', 'Backend\JobQualificationController@createQualification')->name('createQualification');
            Route::post('/store', 'Backend\JobQualificationController@storeQualification')->name('storeQualification');
            Route::get('/edit/{id}', 'Backend\JobQualificationController@editQualification')->name('editQualification');
            Route::post('/update', 'Backend\JobQualificationController@updateQualification')->name('updateQualification');
            Route::post('/delete', 'Backend\JobQualificationController@deleteQualification')->name('deleteQualification');
        });

        Route::group(['prefix' => 'job-salary-ranges'], function () {
            Route::get('/', 'Backend\JobSalaryRangeController@listSalaryRanges')->name('listSalaryRanges');
            Route::get('/create', 'Backend\JobSalaryRangeController@createSalaryRange')->name('createSalaryRange');
            Route::post('/store', 'Backend\JobSalaryRangeController@storeSalaryRange')->name('storeSalaryRange');
            Route::get('/edit/{id}', 'Backend\JobSalaryRangeController@editSalaryRange')->name('editSalaryRange');
            Route::post('/update', 'Backend\JobSalaryRangeController@updateSalaryRange')->name('updateSalaryRange');
            Route::post('/delete', 'Backend\JobSalaryRangeController@deleteSalaryRange')->name('deleteSalaryRange');
        });

        Route::group(['prefix' => 'job-types'], function () {
            Route::get('/', 'Backend\JobTypeController@listJobTypes')->name('listJobTypes');
            Route::get('/create', 'Backend\JobTypeController@createJobType')->name('createJobType');
            Route::post('/store', 'Backend\JobTypeController@storeJobType')->name('storeJobType');
            Route::get('/edit/{id}', 'Backend\JobTypeController@editJobType')->name('editJobType');
            Route::post('/update', 'Backend\JobTypeController@updateJobType')->name('updateJobType');
            Route::post('/delete', 'Backend\JobTypeController@deleteJobType')->name('deleteJobType');
        });

        Route::group(['prefix' => 'languages'], function () {
            Route::get('/', 'Backend\LanguageController@listLanguages')->name('listLanguages');
            Route::get('/create', 'Backend\LanguageController@createLanguage')->name('createLanguage');
            Route::post('/store', 'Backend\LanguageController@storeLanguage')->name('storeLanguage');
            Route::get('/edit/{id}', 'Backend\LanguageController@editLanguage')->name('editLanguage');
            Route::post('/update', 'Backend\LanguageController@updateLanguage')->name('updateLanguage');
            Route::post('/delete', 'Backend\LanguageController@deleteLanguage')->name('deleteLanguage');
        });

        Route::group(['prefix' => 'nationalities'], function () {
            Route::get('/', 'Backend\NationalityController@listNationalities')->name('listNationalities');
            Route::get('/create', 'Backend\NationalityController@createNationality')->name('createNationality');
            Route::post('/store', 'Backend\NationalityController@storeNationality')->name('storeNationality');
            Route::get('/edit/{id}', 'Backend\NationalityController@editNationality')->name('editNationality');
            Route::post('/update', 'Backend\NationalityController@updateNationality')->name('updateNationality');
            Route::post('/delete', 'Backend\NationalityController@deleteNationality')->name('deleteNationality');
        });

        Route::group(['prefix' => 'job-skills'], function () {
            Route::get('/', 'Backend\SkillController@listJobSkills')->name('listJobSkills');
            Route::get('/create', 'Backend\SkillController@createJobSkill')->name('createJobSkill');
            Route::post('/store', 'Backend\SkillController@storeJobSkill')->name('storeJobSkill');
            Route::get('/edit/{id}', 'Backend\SkillController@editJobSkill')->name('editJobSkill');
            Route::post('/update', 'Backend\SkillController@updateJobSkill')->name('updateJobSkill');
            Route::post('/delete', 'Backend\SkillController@deleteJobSkill')->name('deleteJobSkill');
        });

        Route::group(['prefix' => 'manage-users'], function () {
            Route::get('/', 'Backend\UserController@listUsers')->name('listUsers');
            Route::get('/create', 'Backend\UserController@createUser')->name('createUser');
            Route::post('/store', 'Backend\UserController@storeUser')->name('storeUser');
            Route::get('/edit/{id}', 'Backend\UserController@editUser')->name('editUser');
            Route::get('/view/{id}', 'Backend\UserController@viewUser')->name('viewUser');
            Route::post('/update', 'Backend\UserController@updateUser')->name('updateUser');
            Route::post('/delete', 'Backend\UserController@deleteUser')->name('deleteUser');
        });

        Route::group(['prefix' => 'manage-packages'], function () {
            Route::get('/', 'Backend\PackageController@list')->name('listPackages');
            Route::get('/create', 'Backend\PackageController@create')->name('createPackage');
            Route::post('/store', 'Backend\PackageController@store')->name('storePackage');
            Route::get('/edit/{id}', 'Backend\PackageController@edit')->name('editPackage');
            Route::get('/view/{id}', 'Backend\PackageController@view')->name('viewPackage');
            Route::post('/update/{id}', 'Backend\PackageController@update')->name('updatePackage');
            Route::post('/delete', 'Backend\PackageController@delete')->name('deletePackage');
        });

        Route::group(['prefix' => 'manage-advertisement'], function () {
            Route::get('/', 'Backend\AdvertiseController@list')->name('listAdvertise');
            Route::get('/create', 'Backend\AdvertiseController@create')->name('createAdvertise');
            Route::post('/store', 'Backend\AdvertiseController@store')->name('storeAdvertise');
            Route::get('/edit/{id}', 'Backend\AdvertiseController@edit')->name('editAdvertise');
            Route::get('/view/{id}', 'Backend\AdvertiseController@view')->name('viewAdvertise');
            Route::post('/update/{id}', 'Backend\AdvertiseController@update')->name('updateAdvertise');
            Route::post('/delete', 'Backend\AdvertiseController@delete')->name('deleteAdvertise');
            Route::post('/delete/image', 'Backend\AdvertiseController@deleteImage')->name('deleteAdvertiseImage');
            Route::post('/status', 'Backend\AdvertiseController@status')->name('statusAdvertise');
        });

        Route::group(['prefix' => 'manage-job-approval'], function () {
            Route::get('/list', 'Backend\JobApprovalController@list')->name('listJobApproval');
            Route::post('/job/status', 'Backend\JobApprovalController@status')->name('jobStatus');
            Route::get('/job-detail/{id}', 'Backend\JobApprovalController@job_details')->name('employerJobDetail');
        });

        Route::group(['prefix' => 'financial'], function () {
            Route::get('/list', 'Backend\FinancialController@list')->name('listFinancial');
            Route::get('/filter', 'Backend\FinancialController@filterSales')->name('salesFilter');
//            Route::post('/job/status', 'Backend\FinancialController@status')->name('jobStatus');
            Route::post('filterCountry', 'Backend\FinancialController@filterCountry')->name('filterCountryFinancial');
        });

    });
});

Route::prefix('sub-admin')->group(function (){

    Route::middleware(['subAdmin'])->group(function () {
        Route::get('dashboard', 'Backend\SubAdminController@dashboard')->name('subAdminDashboard');
        Route::post('profile-update', 'Backend\AuthController@subAdminUpdateProfile')->name('subAdminUpdateProfile');

        Route::group(['prefix' => 'manage-users'], function () {
            Route::get('/', 'Backend\SubAdminController@listUsers')->name('subAdminListUsers');
            Route::get('/create', 'Backend\SubAdminController@createUser')->name('subAdminCreateUser');
            Route::post('/store', 'Backend\SubAdminController@storeUser')->name('subAdminStoreUser');
            Route::get('/edit/{id}', 'Backend\SubAdminController@editUser')->name('subAdminEditUser');
            Route::get('/view/{id}', 'Backend\SubAdminController@viewUser')->name('subAdminViewUser');
            Route::post('/update', 'Backend\SubAdminController@updateUser')->name('subAdminUpdateUser');
            Route::post('/delete', 'Backend\SubAdminController@deleteUser')->name('subAdminDeleteUser');
        });

        Route::group(['prefix' => 'candidates'], function () {
            Route::get('/', 'Backend\SubAdminController@candidateList')->name('subAdminListCandidate');
        });

        Route::group(['prefix' => 'manage-job-approval'], function () {
            Route::get('/list', 'Backend\SubAdminController@jobApprovalList')->name('subAdminListJobApproval');
            Route::post('/job/status', 'Backend\SubAdminController@jobApprovalStatus')->name('subAdminJobStatus');
            Route::get('/job-details/{id}', 'Backend\SubAdminController@job_details')->name('employerJobDetailSubAdmin');
        });

        Route::group(['prefix' => 'financial'], function () {
            Route::get('/list', 'Backend\SubAdminController@financialList')->name('subAdminListFinancial');
//            Route::post('/job/status', 'Backend\SubAdminController@financialStatus')->name('subAdminJobStatus');
        });

        Route::group(['prefix' => 'statistics'], function () {
            Route::get('/', 'Backend\SubAdminController@statisticsList')->name('subAdminListStatistics');
//            Route::post('filterCountry', 'Backend\SubAdminController@filterCountry')->name('filterCountry');
        });

        Route::group(['prefix' => 'manage-advertisement'], function () {
            Route::get('/', 'Backend\SubAdminController@advertiseList')->name('subAdminListAdvertise');
            Route::get('/create', 'Backend\SubAdminController@advertiseCreate')->name('subAdminCreateAdvertise');
            Route::post('/store', 'Backend\SubAdminController@advertiseStore')->name('subAdminStoreAdvertise');
            Route::get('/edit/{id}', 'Backend\SubAdminController@advertiseEdit')->name('subAdminEditAdvertise');
            Route::get('/view/{id}', 'Backend\SubAdminController@advertiseView')->name('subAdminViewAdvertise');
            Route::post('/update/{id}', 'Backend\SubAdminController@advertiseUpdate')->name('subAdminUpdateAdvertise');
            Route::post('/delete', 'Backend\SubAdminController@advertiseDelete')->name('subAdminDeleteAdvertise');
            Route::post('/delete/image', 'Backend\SubAdminController@advertiseDeleteImage')->name('subAdminDeleteAdvertiseImage');
            Route::post('/status', 'Backend\SubAdminController@adevertiseStatus')->name('subAdminStatusAdvertise');
        });

    });

});


Route::prefix('employer')->group(function (){
//    Route::get('/', 'Employer\AuthController@login')->name('employerLogin');
//    Route::get('/register', 'Employer\AuthController@register')->name('employerRegister');
//    Route::post('/employer-register', 'Employer\AuthController@registerPost')->name('employerRegisterPost');
    Route::post('/register', 'Register\EmployerRegistrationController@register')->name('employerRegister');
    Route::post('/company-check', 'Register\EmployerRegistrationController@companyCheck')->name('employerCompanyCheck');
    Route::post('/employer-data', 'Register\EmployerRegistrationController@employerData')->name('employerData');
    Route::post('/register-post', 'Register\EmployerRegistrationController@store')->name('employerRegisteration');
    Route::post('/employer-login', 'Employer\AuthController@loginPost')->name('employerLoginPost');

    Route::middleware(['employer'])->group(function () {
        Route::get('dashboard', 'Employer\DashboardController@dashboard')->name('employerDashboard');
        Route::get('profile', 'Employer\ProfileController@profile')->name('employerProfile');
        Route::post('profile', 'Employer\ProfileController@saveProfile');
        Route::post('profile-update', 'Employer\AuthController@employerUpdateProfile')->name('employerUpdateProfile');  // profile updated from right-side bar
        Route::get('manage-job', 'Employer\JobController@manageJob')->name('manageJobs');
        Route::get('manage-candidate/{id}', 'Employer\JobController@manageCandidate')->name('manageCandidates');
        Route::post('job-feedback', 'Employer\JobController@jobFeedback')->name('jobFeedback');
        Route::get('candidate-cv/{id}', 'Employer\JobController@CV')->name('candidateCV');
        Route::get('create-job', 'Employer\JobController@create')->name('createJob');
        Route::post('create-job', 'Employer\JobController@saveJob');
        Route::get('update-job/{id}', 'Employer\JobController@edit')->name('editJob');
        Route::post('update-job/{id}', 'Employer\JobController@update');
        Route::get('view-job/{id}', 'Employer\JobController@viewJob')->name('viewJob');
        Route::post('delete-job', 'Employer\JobController@delete')->name('deleteJob');
        Route::get('purchase', 'Employer\JobController@purchase')->name('purchase');
        Route::get('purchase-history', 'Employer\JobController@purchaseHistory')->name('purchaseHistory');
        Route::get('payment-history', 'Employer\JobController@paymentHistory')->name('paymentHistory');
        Route::get('invoice/{id}', 'Employer\JobController@invoice')->name('invoice');
        Route::post('payment/{id}', 'Employer\JobController@payment')->name('payment');
        Route::get('/payment-success', 'EmployeeController@paymentSuccess')->name('paymentSuccessful');
        Route::post('job-status', 'Employer\JobController@jobStatus')->name('employerJobStatus');
    });
});

Route::prefix('candidate')->group(function (){
//    Route::get('/', 'Candidate\AuthController@login')->name('candidateLogin');
    Route::post('/register', 'Register\CandidateRegistrationController@register')->name('candidateRegister');
    Route::post('/candidate-data', 'Register\CandidateRegistrationController@candidateData')->name('candidateData');
    Route::post('/register-post', 'Register\CandidateRegistrationController@store')->name('candidateRegisteration');
//    Route::post('/register-post', 'Candidate\AuthController@register');
    Route::post('/candidate-login', 'Candidate\AuthController@loginPost')->name('candidateLoginPost');
    Route::post('/candidate-register', 'Candidate\AuthController@registerPost')->name('candidateRegisterPost');

    Route::middleware(['candidate'])->group(function () {
        Route::get('dashboard', 'Candidate\DashboardController@dashboard')->name('candidateDashboard');
        Route::get('profile', 'Candidate\ProfileController@profile')->name('candidateProfile');
        Route::post('profile', 'Candidate\ProfileController@saveProfile');
        Route::post('profile-update', 'Candidate\AuthController@candidateUpdateProfile')->name('candidateUpdateProfile');  // profile updated from right-side bar
        Route::get('resume', 'Candidate\ResumeController@create')->name('resume');
        Route::post('resume', 'Candidate\ResumeController@store');
        Route::get('search-jobs', 'Candidate\SearchController@search')->name('searchJobs');
        Route::post('jobs', 'Candidate\SearchController@jobs')->name('jobs');
        Route::get('timeline', 'Candidate\TimelineController@timeline')->name('timeline');
        Route::get('apply-job/{id}/{user_id}', 'Candidate\TimelineController@applyjob')->name('jobApply');
        Route::post('unapply-job', 'Candidate\TimelineController@unapplyJob')->name('unapplyJob');
        Route::get('job-detail/{id}', 'Candidate\TimelineController@job_details')->name('jobDetail');
        Route::get('employer-profile/{id}', 'Candidate\TimelineController@employer_profile')->name('employerProfileView');
//        Route::get('jobs', 'Candidate\SearchController@jobs')->name('jobs');
//        Route::get('jobs/{country}/{industry}/{company}', 'Candidate\SearchController@jobs')->name('jobs');

    });

});
