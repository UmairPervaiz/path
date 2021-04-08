<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancialController extends Controller
{
    public function list()
    {
        $total_packages = DB::table('employee_packages')->count();

//        $exchangeRates = new ExchangeRate();
//        $result = $exchangeRates->exchangeRate('KD', 'USD');
//        dd($exchangeRates->currencies());

        $countries = DB::table('countries')->get();
        $packages = DB::table('employee_packages')->get();
        $topSellingCounty = DB::table('employee_packages')->orderBy('country_name', 'DESC')->take(1)->first();
        $topPurchasingEmployer = DB::table('employee_packages')->orderBy('user_id', 'DESC')->take(1)->first();
        $sales = array();

        return view('backend.pages.financial.list',compact('total_packages','countries','packages','sales','topSellingCounty','topPurchasingEmployer'));
    }

    public function filterCountry(Request $request)
    {
        if ($request->country_id == 0)
        {
            $totalPackages = DB::table('employee_packages')->count();

            $data = [$totalPackages];

            return response()->json(['values'=>$data]);
        }

        else
        {
            $totalPackages = DB::table('employee_packages')->where('country_name', $request->country_id)->count();
            $data = [$totalPackages];

            return response()->json(['values'=>$data]);
        }

    }

    public function filterSales(Request $request)
    {
        $total_packages = DB::table('employee_packages')->count();
        $countries = DB::table('countries')->get();
        $packages = DB::table('employee_packages')->get();
        $topSellingCounty = DB::table('employee_packages')->orderBy('country_name', 'DESC')->take(1)->first();
        $topPurchasingEmployer = DB::table('employee_packages')->orderBy('user_id', 'DESC')->take(1)->first();

        if ($request->has('date'))
        {
            $sales = array();
            $i = 0;

            foreach ($countries as $country){
                $count = DB::table('employee_packages')->where('country_name', $country->id)->whereDate(DB::raw('DATE(`created_at`)'), $request->date)->count();

                $sales[$i]['country'] = $country->name;
                $sales[$i]['litres'] = $count;
                $i++;
            }
            $date = $request->date;
            return view('backend.pages.financial.list',compact('total_packages','countries','packages','sales','date','topPurchasingEmployer','topSellingCounty'));
        }
        elseif ($request->has('month'))
        {
            $sales = array();
            $i = 0;
            $month = Carbon::parse($request->month)->format('m');
            foreach ($countries as $country){
                $count = DB::table('employee_packages')->where('country_name', $country->id)->whereMonth('created_at', $month)->count();

                $sales[$i]['country'] = $country->name;
                $sales[$i]['litres'] = $count;
                $i++;
            }
            $month = $request->month;
            return view('backend.pages.financial.list',compact('total_packages','countries','packages','sales','month','topPurchasingEmployer','topSellingCounty'));
        }
        elseif ($request->has('year'))
        {
            if ($request->year == 0)
            {
                $sales = array();
                $i = 0;

                foreach ($countries as $country){
                    $count = DB::table('employee_packages')->where('country_name', $country->id)->count();

                    $sales[$i]['country'] = $country->name;
                    $sales[$i]['litres'] = $count;
                    $i++;
                }
                $year = $request->year;
                return view('backend.pages.financial.list',compact('total_packages','countries','packages','sales','year','topPurchasingEmployer','topSellingCounty'));
            }
            else{
                $sales = array();
                $i = 0;

                foreach ($countries as $country){
                    $count = DB::table('employee_packages')->where('country_name', $country->id)->whereYear(DB::raw('DATE(`created_at`)'), $request->year)->count();

                    $sales[$i]['country'] = $country->name;
                    $sales[$i]['litres'] = $count;
                    $i++;
                }
                $year = $request->year;
                return view('backend.pages.financial.list',compact('total_packages','countries','packages','sales','year','topPurchasingEmployer','topSellingCounty'));
//                $sales = DB::table('employee_packages')->whereYear(DB::raw('DATE(`created_at`)'), $request->year)->get();
            }
        }
        else
            {
                $sales = DB::table('employee_packages')->get();
                return view('backend.pages.financial.list',compact('total_packages','countries','packages','sales','topPurchasingEmployer','topSellingCounty'));
            }

//        return view('backend.pages.financial.list',compact('total_packages','countries','packages','sales','date' ,'month','year'));
    }

}
