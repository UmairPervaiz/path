<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paginationController extends Controller
{
    function index()
    {
        $data = DB::table('jobs')->orderBy('id', 'asc')->paginate(5);
        return view('employee.managejob', compact('data'));
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
//            alert($query);
            $query = str_replace(" ", "%", $query);
            $data = DB::table('jobs')
                ->where('id', 'like', '%'.$query.'%')
                ->orWhere('title', 'like', '%'.$query.'%')
                ->orWhere('country', 'like', '%'.$query.'%')
                ->orderBy($sort_by, $sort_type)
                ->paginate(5);
            return view('pagination_data', compact('data'))->render();
        }
    }
}
