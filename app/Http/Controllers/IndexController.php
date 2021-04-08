<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function job_details($id)
    {
        $jobId = decrypt($id);

        $job_id =DB::table('jobs')->find($jobId);

        if (empty($job_id)) {
            return redirect()->back();
        }

        $job = DB::table('jobs')->select()->where('id', $job_id->id)->first();
        $user = DB::table('users')->select()->where('id', $job_id->user_id)->first();
//        $user_candidate = DB::table('users')->select()->where('id', $user_id)->first();

        DB::table('jobs')->where('id', $jobId)->update(array(
            'count' => $job_id->count + 1 ,
        ));

        return view('job_details',compact('job','user'));
    }

    public function job_details_check()
    {
        return redirect()->back()->with('warning', 'Login to Apply');
    }

    public function job_search(Request $request)
    {
//        dd($request->all());

        if ($request->keyword == null && $request->location == null && $request->category == null)
        {
            $total_jobs = DB::table('jobs')
                            ->where('status', '=','Active')
                            ->where('endingDate','>=', Carbon::now())
                            ->where('title', 'like', '%' . $request->keyword .'%')
                            ->where('job_location', $request->location)
                            ->where('category', $request->category)
                            ->get();
//            dd($total_jobs);
            return view('job_filter',compact('total_jobs'));
        }
        if ($request->keyword != null && $request->location == null && $request->category == null)
        {
            $total_jobs = DB::table('jobs')
                            ->where('status', '=','Active')
                            ->where('endingDate','>=', Carbon::now())
                            ->where('title', 'like', '%' . $request->keyword .'%')
                            ->get();
            return view('job_filter',compact('total_jobs'));
        }
        if ($request->keyword == null && $request->location != null && $request->category == null)
        {
            $total_jobs = DB::table('jobs')
                            ->where('status', '=','Active')
                            ->where('endingDate','>=', Carbon::now())
                            ->where('job_location', $request->location)
                            ->get();
            return view('job_filter',compact('total_jobs'));
        }
        if ($request->keyword == null && $request->location == null && $request->category != null)
        {
            $total_jobs = DB::table('jobs')
                            ->where('status', '=','Active')
                            ->where('endingDate','>=', Carbon::now())
                            ->where('category', $request->category)
                            ->get();
            return view('job_filter',compact('total_jobs'));
        }
        if ($request->keyword != null && $request->location != null && $request->category == null)
        {
            $total_jobs = DB::table('jobs')
                            ->where('status', '=','Active')
                            ->where('endingDate','>=', Carbon::now())
                            ->where('title', 'like', '%' . $request->keyword .'%')
                            ->where('job_location', $request->location)
                            ->get();
            return view('job_filter',compact('total_jobs'));
        }
        if ($request->keyword != null && $request->location == null && $request->category != null)
        {
            $total_jobs = DB::table('jobs')
                            ->where('status', '=','Active')
                            ->where('endingDate','>=', Carbon::now())
                            ->where('title', 'like', '%' . $request->keyword .'%')
                            ->where('category', $request->category)
                            ->get();
            return view('job_filter',compact('total_jobs'));
        }
        if ($request->keyword == null && $request->location != null && $request->category != null)
        {
            $total_jobs = DB::table('jobs')
                            ->where('status', '=','Active')
                            ->where('endingDate','>=', Carbon::now())
                            ->where('job_location', $request->location)
                            ->where('category', $request->category)
                            ->get();
            return view('job_filter',compact('total_jobs'));
        }
        if ($request->keyword != null && $request->location != null && $request->category != null)
        {
            $total_jobs = DB::table('jobs')
                            ->where('status', '=','Active')
                            ->where('endingDate','>=', Carbon::now())
                            ->where('title', 'like', '%' . $request->keyword .'%')
                            ->where('job_location', $request->location)
                            ->where('category', $request->category)
                            ->get();
            return view('job_filter',compact('total_jobs'));
        }

//        $total_jobs = DB::table('jobs')
//                        ->where('status', '=','Active')
//                        ->where('title', 'like', '%' . $request->keyword .'%')
//                        ->orWhere('job_location', $request->location)
//                        ->orWhere('category', $request->category)
//                        ->get();
//dd($total_jobs);
//        return view('job_filter',compact('total_jobs'));
    }

}
