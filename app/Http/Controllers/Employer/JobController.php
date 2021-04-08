<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function Sodium\increment;

class JobController extends Controller
{
    public function create()
    {
        $countries = DB::table('countries')->get();
        $salaries = DB::table('job_salary_ranges')->get();
        $qualifications = DB::table('job_qualifications')->get();
        $experiences = DB::table('job_experiences')->get();
        $candidateLocations = DB::table('job_candidate_locations')->get();
        $categories = DB::table('employee_bussiness_categories')->get();
        $skills = DB::table('skills')->get();
        $nationalities = DB::table('nationalities')->select()->get();
        $careerLevels = DB::table('job_career_levels')->select()->get();

        $exist = 0;

        $record =  DB::table('employee_packages')
            ->where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->first();

        if(!empty($record)){
            $exist = 1;
        }


        if($exist == 0){
            return redirect()->route('purchase')->with('error','Please purchase a package before posting a job.');
        }
        else
        {
            if($record->jobs_count >= $record->jobs_limit){
                return redirect()->route('purchase')->with('error','You have reached your job posting limit, Please Update your Package.');
            }
        }

        return view('employer.pages.manageJobs.create', compact('countries','salaries','qualifications',
                          'experiences','candidateLocations','categories','skills','nationalities','careerLevels'));
    }

    public function saveJob(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'string|max:255|required',
            'salary' => 'required',
            'job_location' => 'required',
            'candidate_nationality' => 'required',
            'qualification' => 'required',
            'career_level' => 'required',
            'experience' => 'required',
            'type' => 'required',
            'skills' => 'required',
            'gender' => 'required',
            'candidate_location' => 'required',
            'category' => 'required',
            'date' => 'required|date',
            'endingDate' => 'required|date|after_or_equal:date',
            'description' => 'required',
            'responsibilities' => 'required',
            'education' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $exist = 0;

        $record =  DB::table('employee_packages')
            ->where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->first();

        if(!empty($record)){
            $exist = 1;
        }


        if($exist == 0){
            return redirect()->route('purchase')->with('error','Please purchase a package before posting a job.');
        }
        else{
            if($record->jobs_count >= $record->jobs_limit){
                return redirect()->route('purchase')->with('error','You have reached your job posting limit, Please Update your Package.');
            }
        }

        $skills = implode(',', $request->skills);

        DB::table('jobs')->insert(array(
            'user_id' => Auth::user()->id,
            'status' => 0,
            'approval_status' => 0,
            'title' => $request->title,
            'salary' => $request->salary,
            'job_location' => $request->job_location,
            'candidate_nationality' => $request->candidate_nationality,
            'qualification' => $request->qualification,
            'career_level' => $request->career_level,
            'experience' => $request->experience,
            'type' => $request->type,
            'skills' => $skills,
            'gender' => $request->gender,
            'candidate_location' => $request->candidate_location,
            'category' => $request->category,
            'date' => $request->date,
            'endingDate' => $request->endingDate,
            'description' => $request->description,
            'responsibilities' => $request->responsibilities,
            'education' => $request->education,
        ));

        DB::table('employee_packages')->where('id', $record->id)->update(array(
            'jobs_count' => $record->jobs_count + 1,
        ));

        return redirect()->route('manageJobs')->with('success','Job posted wait for admin response');
    }

    public function manageJob()
    {
        $jobs = DB::table('jobs')->where('user_id', Auth::user()->id)->orderBy('id','DESC')->paginate(6);

        return view('employer.pages.manageJobs.manageJobs', compact('jobs'));
    }

    public function viewJob($id)
    {
        $skills = DB::table('skills')->get();
        $job = DB::table('jobs')->where('id', decrypt($id))->first();

        return view('employer.pages.manageJobs.view', compact('job','skills'));
    }

    public function jobStatus(Request $request)
    {
        $job = DB::table('jobs')->where('id',$request->job_id)->first();

        if(empty($job)) {
            return response()->json(['status' => 0]);
        }

        DB::table('jobs')->where('id', $job->id)->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => 1]);
    }

    public function edit($id)
    {
        $countries = DB::table('countries')->get();
        $salaries = DB::table('job_salary_ranges')->get();
        $qualifications = DB::table('job_qualifications')->get();
        $experiences = DB::table('job_experiences')->get();
        $candidateLocations = DB::table('job_candidate_locations')->get();
        $categories = DB::table('employee_bussiness_categories')->get();
        $skills = DB::table('skills')->get();
        $nationalities = DB::table('nationalities')->select()->get();
        $careerLevels = DB::table('job_career_levels')->select()->get();

        $job = DB::table('jobs')->where('id', decrypt($id))->first();

        return view('employer.pages.manageJobs.edit', compact('job', 'countries','salaries','qualifications',
            'experiences','candidateLocations','categories','skills','nationalities','careerLevels'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'string|max:255|required',
            'salary' => 'required',
            'job_location' => 'required',
            'candidate_nationality' => 'required',
            'qualification' => 'required',
            'career_level' => 'required',
            'experience' => 'required',
            'type' => 'required',
            'skills' => 'required',
            'gender' => 'required',
            'candidate_location' => 'required',
            'category' => 'required',
//            'date' => 'required|date',
            'endingDate' => 'required|date|after_or_equal:date',
            'description' => 'required',
            'responsibilities' => 'required',
            'education' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $skills = implode(',', $request->skills);

        DB::table('jobs')
            ->where('id', decrypt($id))
            ->update(array(
            'title' => $request->title,
            'salary' => $request->salary,
            'job_location' => $request->job_location,
            'candidate_nationality' => $request->candidate_nationality,
            'qualification' => $request->qualification,
            'career_level' => $request->career_level,
            'experience' => $request->experience,
            'type' => $request->type,
            'skills' => $skills,
            'gender' => $request->gender,
            'candidate_location' => $request->candidate_location,
            'category' => $request->category,
//            'date' => $request->date,
            'endingDate' => $request->endingDate,
            'description' => $request->description,
            'responsibilities' => $request->responsibilities,
            'education' => $request->education,
        ));

        return redirect()->route('manageJobs')->with('success','Job updated successfully');

    }

    public function delete(Request $request)
    {
        $job = DB::table('jobs')->where('id',$request->id)->first();

        if(empty($job)) {
            return response()->json(['status' => 0]);
        }

        DB::table('candidate_applied_jobs')->where('job_id',$request->id)->delete();
        DB::table('jobs')->where('id',$request->id)->delete();

        return response()->json(['status' => 1]);
    }

    public function manageCandidate($id)
    {
        $jobs = DB::table('jobs')->where('id', decrypt($id))->first();
        $candidate_jobs = DB::table('candidate_applied_jobs')->where('job_id', $jobs->id)->get();

        return view('employer.pages.manageCandidate.manageCandidate', compact('jobs','candidate_jobs'));
    }

    public function jobFeedback(Request $request)
    {
        $job = DB::table('candidate_applied_jobs')
            ->where('job_id',$request->job_id)
            ->where('user_id',$request->candidate_id)
            ->first();

        if(empty($job)) {
            return response()->json(['status' => 0]);
        }

        DB::table('candidate_applied_jobs')->where('id', $job->id)->update([
            'application_status' => $request->status_id,
        ]);

        return response()->json(['status' => 1]);
    }

    public function CV($id)
    {
        $candidate = DB::table('users')
            ->join('candidate_abouts','users.id','=','candidate_abouts.user_id')
            ->where('users.id',decrypt($id))
            ->first();

        DB::table('cv_counters')->where('user_id', decrypt($id))->increment('count');

        return view('employer.pages.manageCandidate.candidateCV', compact('candidate'));
    }

    public function purchase()
    {
        $packages = DB::table('packages')->get();

        $exist = 0;
        $existRecord = '';

        $record =  DB::table('employee_packages')
            ->where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->first();
//dd($record);
        if(!empty($record)){
            $jobsLimit = $record->jobs_limit;
            $exist = 1;
//dd($jobsLimit);
            $existRecord =  DB::table('employee_packages')
                ->where('user_id', Auth::user()->id)
                ->where('jobs_count', '=' , $jobsLimit)
                ->where('status', 1)
                ->first();
//dd($existRecord);
        }

        return view('employer.pages.purchase.purchase',compact('packages','exist','existRecord'));
    }

    public function paymentHistory()
    {
        $employeePackages = DB::table('employee_packages')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'Desc')
            ->get();

        return view('employer.pages.payment.history',compact('employeePackages'));
    }

    public function payment($packageId)
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

            $existRecord =  DB::table('employee_packages as ep')
                ->select('*')
                ->where('ep.user_id', Auth::user()->id)
                ->where('ep.jobs_count', '<=' , $jobsLimit)
                ->where('ep.status', 1)
                ->first();
        }

        if($exist == 1){
            if($existRecord != "" || !empty($existRecord)){
                if($existRecord->package_id == $packageId){
                    return redirect()->back()->with('error', 'You have already Purchased this Package');
                }
            }
        }

        $errorURL = route('purchase', encrypt(Auth::user()->id));

        $successURL = route('paymentSuccessful');

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
            $package['rate'] = $value->rate;
            $package['job_limit'] = $value->job_limit;
            $package['cv_limit'] = $value->cv_limit;
        }

        $user_info = DB::table('users')->where('id', '=', Auth::user()->id)->first();


        $total_price = $package['rate'];
        $jobLimit = $package['job_limit'];
        $cvLimit = $package['cv_limit'];

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
                return redirect()->back()->with('error','Please complete your profile in order to place purchase');
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
            return redirect()->route('purchase', encrypt(Auth::user()->id))->with('error', 'Something Went Wrong, Please Try again later.');
        }

    }

    public function paymentSuccess()
    {
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

//             return $finalResult;
            $package_info = explode(',',$finalResult['ApiCustomFileds']);

            if($finalResult['TransactionStatus'] != 2){
                redirect()->route('purchase', encrypt(Auth::user()->id))->with('error', 'Payment Status is Unsuccessful, Please Try again later.');
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
            return redirect()->route('purchase', encrypt(Auth::user()->id))->with('error', 'Something Went Wrong, Please Try again later.');
        }


    }

    public function invoice($id)
    {
        $invoiceId = decrypt($id);
        $invoices = DB::table('employee_packages')->find($invoiceId);

        if($invoices->user_id != Auth::user()->id){
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }

        return view('employer.pages.invoice.invoice', compact('invoices'));
    }

}
