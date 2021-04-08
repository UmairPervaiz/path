@extends('employer.layouts.master')

@section('title')
    Path | Manage Candidates
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
                            <h3 class="card-label"> List of Candidates
                                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-separate table-head-custom table-checkable" id="myCustomTable">
                            <thead>
                            <tr>
                                <th style="text-align: center"> Name</th>
                                <th style="text-align: center"> Current location</th>
                                <th style="text-align: center"> Degree</th>
                                <th  style="text-align: center" class="action">Last Company</th>
                                <th  style="text-align: center" class="action">Nationality</th>
                                <th  style="text-align: center" class="action">Age</th>
                                <th  style="text-align: center" class="action">Years of experience</th>
                                <th  style="text-align: center" class="action">University</th>
                                <th  style="text-align: center; width: 120px" class="action">Status</th>
                                <th  style="text-align: center" class="action">Email application</th>
                                <th  style="text-align: center" class="action">Note Pop up</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php use Carbon\Carbon; use Illuminate\Support\Facades\DB; @endphp
                            @foreach($candidate_jobs as $candidate_job)
                                @php
                                    $applicant  = DB::table('users')->where('id', $candidate_job->user_id)->first();
                                    $applicant_personal  = DB::table('candidate_personal_informations')->where('user_id', $candidate_job->user_id)->first();
                                    $applicant_nationality  = DB::table('countries')->where('id', $applicant_personal->nationality)->first();
                                    $applicant_about_us  = DB::table('candidate_abouts')->where('user_id', $candidate_job->user_id)->first();
                                    $current_location = DB::table('countries')->where('id', $applicant_about_us->location)->first();
                                    $applicant_education  = DB::table('candidate_educations')->where('user_id', $candidate_job->user_id)->first();
                                    $experiences = DB::table('candidate_experiences')
                                           ->where('user_id', $candidate_job->user_id)
                                           ->get();

                                       $total = 0;

                                       if (isset($experiences))
                                       {
                                           foreach ($experiences as $key=>$value)
                                           {
                                               $datetime1 = Carbon::createFromDate($value->experience_starting_date);
                                               $datetime2 = Carbon::createFromDate($value->experience_ending_date);
                                               $intervals[] = $datetime1->diffInDays($datetime2);
                                           }

                                           foreach ($intervals as $key => $value)
                                           {
                                               $total += $value;
                                           }
                                       }

                                    $candidateDegree = DB::table('candidate_educations')
                                                ->where('user_id', $candidate_job->user_id)
                                                ->max('degree');
                                    $degree = DB::table('job_qualifications')->where('id', $candidateDegree)->first();
                                @endphp
                                <tr>
                                    <td style="text-align: center">
                                       <a href="{{route('candidateCV', encrypt($applicant->id))}}">{{$applicant->name}}</a>
                                    </td>
                                    <td style="text-align: center">
                                        {{$current_location->name}}
                                    </td>
                                    <td style="text-align: center">
                                        {{$degree->name}}
                                    </td>
                                    <td style="text-align: center">
                                        N/A
                                    </td>
                                    <td style="text-align: center">
                                        {{$applicant_nationality->name}}
                                    </td>
                                    <td style="text-align: center">
                                        {{$applicant_personal->age}}
                                    </td>
                                    <td style="text-align: center">
                                        @if ($total <= 365)
                                            Less than one year
                                        @elseif($total > 365 && $total <= 730)
                                            1 Year
                                        @elseif($total > 730 && $total <= 1095)
                                            2 Years
                                        @elseif($total > 1095 && $total <= 1460)
                                            3 Years
                                        @elseif($total > 1460 && $total <= 1825)
                                            4 Years
                                        @elseif($total > 1825)
                                            5+ Years
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        {{$applicant_education->institution}}
                                    </td>
                                    <td style="text-align: center; width: 120px">
                                        <select class="form-control" id="status" data-class="{{$candidate_job->job_id}}" data-id="{{$candidate_job->user_id}}">
                                            <option value="" disabled selected>-- Status --</option>
                                            <option @if ($candidate_job->application_status == 'Shortlisted') selected @endif  value="Shortlisted">Shortlisted</option>
                                            <option @if ($candidate_job->application_status == 'Interview') selected @endif value="Interview">Interview</option>
                                            <option @if ($candidate_job->application_status == 'Hired') selected @endif value="Hired">Hired</option>
                                            <option @if ($candidate_job->application_status == 'Rejected') selected @endif value="Rejected">Rejected</option>
                                            <option @if ($candidate_job->application_status == 'Not Interested') selected @endif value="Not Interested">Not Interested</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        Email
                                    </td>
                                    <td style="text-align: center">
                                        Pop up
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
        $('#status').on('change', function ()
        {
            let job_id = $(this).data('class');
            let candidate_id = $(this).data('id');
            let status = $(this).val();
            $.ajax({
                method: "POST",
                url: "{{route('jobFeedback')}}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'job_id': job_id,
                    'status_id': status,
                    'candidate_id': candidate_id,
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
