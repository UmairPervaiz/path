@extends('employer.layouts.master')

@section('title')
    Path | Manage Jobs
@endsection

@section('css')
@endsection

@section('main-content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Manage Jobs</h5>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label"> List of Jobs
                                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-separate table-head-custom table-checkable" id="myCustomTable">
                            <thead>
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Country</th>
                                <th style="text-align: center">Deadline</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Applications</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($jobs as $job)
                                @php
                                    $totalApplications = DB::table('candidate_applied_jobs')->where('job_id', $job->id)->get();
                                    $jobLocation = DB::table('countries')->where('id', $job->job_location)->first();
                                @endphp
                                <tr>
                                    <td style="text-align: center">{{$job->id}}</td>
                                    <td style="text-align: center">{{$job->title}}</td>
                                    <td style="text-align: center">{{$jobLocation->name}}</td>
                                    <td style="text-align: center; width: 55px;"><span style="width: 158px;"><span class="label label-lg font-weight-bold  label-light-info label-inline">{{\Carbon\Carbon::parse($job->endingDate)->format('d M y')}}</span></span></td>
                                    <td style="text-align: center; width: 110px">
                                        <select name="status" data-class="{{$job->id}}" class="form-control status" required>
                                            <option @if($job->status == 1) selected @endif value = 1>Active</option>
                                            <option @if($job->status == 0) selected @endif value = 0>In-Active</option>
                                        </select>
                                    <td style="text-align: center">
                                        <a href="{{route('manageCandidates', encrypt($job->id))}}">{{count($totalApplications)}} Application(s)</a></td>
                                    <td style="text-align: center">
                                        <a href="{{route('viewJob', encrypt($job->id))}}"><i class="la la-eye text-info mr-5"></i></a>
                                        <a href="{{route('editJob', encrypt($job->id))}}"><i class="la la-pencil-alt text-success mr-5"></i></a>
{{--                                        <a style="cursor: pointer" onclick="deleteFunction('{{$job->id}}') "><i class="la la-trash text-danger mr-5"></i></a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.status').on('change', function ()
        {
            let job_id = $(this).data('class');
            let status_id = $(this).val();

            $.ajax({
                method: "POST",
                url: "{{route('employerJobStatus')}}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'job_id': job_id,
                    'status_id': status_id,
                },
                success: function (response) {
                    if (response.status === 1) {
                        swal("Successfully Updated", {
                            icon: "success",
                        });
                    } else {
                        swal("Error While Updating", {
                            icon: "error",
                        });
                    }
                }
            });
        });
    </script>
@endsection
