@extends('candidates.layouts.master')

@section('title')
    Path | Timeline
@endsection

@section('css')
@endsection

@section('main-content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">List of jobs</h5>
                </div>
            </div>
        </div>

    @foreach($matchedJobs as $job)

        <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <!--begin::Details-->
                                <div class="d-flex mb-9">
                                    <!--begin: Pic-->
                                    <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                        @php
                                            $jobImage = DB::table('users')
                                                                    ->where('id', $job->user_id)->first();
                                            $jobLocation = DB::table('countries')->where('id', $job->job_location)->first();
                                        @endphp
                                        <div class="symbol symbol-50 symbol-lg-120">
                                            @if($jobImage->avatar != null)
                                                <img src=" {{asset('images/'.$jobImage->avatar)}}" alt="image" />
                                            @else
                                                <img  src="{{asset('public/candidate/dist/assets/media/noimage.png')}}" alt="image" />
                                            @endif
                                        </div>
                                        <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                            <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                                        </div>
                                    </div>
                                    <!--end::Pic-->
                                    <!--begin::Info-->
                                    <div class="flex-grow-1">
                                        <!--begin::Title-->
                                        <div class="d-flex justify-content-between flex-wrap mt-1">
                                            <div class="d-flex mr-3">
                                                <a href="{{route('jobDetail', encrypt($job->id))}}">
                                                   <span style="cursor: pointer" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$job->title}}</span>
                                                </a>
                                                <i class="flaticon2-correct text-success font-size-h5"></i>
                                            </div>
                                            <div class="my-lg-0 my-3">
                                                @php $appliedJobs = DB::table('candidate_applied_jobs')->where('job_id', $job->id)->where('user_id', Auth::user()->id)->first(); @endphp
                                                @if(isset($appliedJobs))   <a style="cursor: no-drop" class="btn btn-sm btn-danger font-weight-bolder text-uppercase mr-3">Applied @endif</a>

                                            </div>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Content-->
                                        <div class="d-flex flex-wrap justify-content-between mt-1">
                                            <div class="d-flex flex-column flex-grow-1 pr-8">
                                                <div class="d-flex flex-wrap mb-4">
                                                    <a class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                        <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$jobImage->email}}</a>
{{--                                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">--}}
{{--                                                        <i class="flaticon2-phone mr-2 font-size-lg"></i></a>--}}
                                                    <a class="text-dark-50 text-hover-primary font-weight-bold">
                                                        <i class="flaticon2-placeholder mr-2 font-size-lg"></i>{{$jobLocation->name}}</a>
                                                </div>
                                                <span class="font-weight-bold text-dark-50">{!! htmlspecialchars_decode($job->description) !!}</span>
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Details-->
                                <div class="separator separator-solid"></div>
                                <!--begin::Items-->
                                <div class="d-flex align-items-center flex-wrap mt-8">

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                    <span class="mr-4">
                                        <i class="flaticon-time display-4 text-muted font-weight-bold"></i>
                                    </span>
                                        <div class="d-flex flex-column text-dark-75">
                                            <span class="font-weight-bolder font-size-sm">Start date</span>
                                            <span class="font-weight-bolder font-size-h5">
                                              <span class="text-dark-50 font-weight-bold"></span>{{\Carbon\Carbon::parse($job->date)->format('d M Y')}}</span>
                                        </div>
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                    <span class="mr-4">
                                        <i class="flaticon-danger display-4 text-muted font-weight-bold"></i>
                                    </span>
                                        <div class="d-flex flex-column text-dark-75">
                                            <span class="font-weight-bolder font-size-sm">End date</span>
                                            <span class="font-weight-bolder font-size-h5">
                                               <span class="text-dark-50 font-weight-bold"></span>{{\Carbon\Carbon::parse($job->expireDate)->format('d M Y')}}
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                        <span class="mr-4">
                                            <i class="flaticon-analytics display-4 text-muted font-weight-bold"></i>
                                        </span>
                                        <div class="d-flex flex-column text-dark-75">
                                            <span class="font-weight-bolder font-size-sm">Experience</span>
                                            <span class="font-weight-bolder font-size-h5">
                                              <span class="text-dark-50 font-weight-bold"></span>
                                                @if ($job->experience == 2)
                                                    Less than one year
                                                @elseif($job->experience == 3)
                                                    1 Year
                                                @elseif($job->experience == 4)
                                                    2 Years
                                                @elseif($job->experience == 5)
                                                    3 Years
                                                @elseif($job->experience == 6)
                                                    4 Years
                                                @elseif($job->experience == 7)
                                                    5+ Years
                                                @else
                                                    No Experience
                                                @endif
                                             </span>
                                        </div>
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                    <span class="mr-4">
                                        <i class="flaticon-information display-4 text-muted font-weight-bold"></i>
                                    </span>
                                        <div class="d-flex flex-column text-dark-75">
                                            @php $field = DB::table('employee_bussiness_categories')->where('id', $job->category)->first(); @endphp
                                            <span class="font-weight-bolder font-size-sm">Field Of expertise</span>
                                            <span class="font-weight-bolder font-size-h5">
                                                {{$field->category}}
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--begin::Items-->
                            </div>
                        </div>
                        <!--end::Card-->

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
    @endforeach
    <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap" style="position: relative;top: 0;bottom: 0;left: 0; right: 0; width: 200px; height: 100px; margin: auto;">
            <div class="d-flex flex-wrap mr-3">
                {{$matchedJobs->links()}}
            </div>
        </div>
        <!--end:: Pagination-->
    </div>







{{--        <div class="d-flex flex-column-fluid">--}}
{{--            <!--begin::Container-->--}}
{{--            <div class="container">--}}
{{--                <!--begin::Row-->--}}
{{--                <div class="row">--}}
{{--                    @foreach($matchedJobs as $job)--}}
{{--                        @php--}}
{{--                            $jobImage = DB::table('users')--}}
{{--                                                    ->where('id', $job->user_id)->first();--}}
{{--                            $jobLocation = DB::table('countries')->where('id', $job->job_location)->first();--}}
{{--                        @endphp--}}
{{--                        <div class="col-xl-4">--}}
{{--                            <!--begin::Card-->--}}
{{--                            <div class="card card-custom gutter-b card-stretch">--}}
{{--                                <!--begin::Body-->--}}
{{--                                <div class="card-body">--}}
{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <!--begin::Pic-->--}}
{{--                                        <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle">--}}
{{--                                            <img src="{{asset('images/'.$jobImage->avatar)}}" alt="image" />--}}
{{--                                        </div>--}}
{{--                                        <!--end::Pic-->--}}
{{--                                        <!--begin::Info-->--}}
{{--                                        <div class="d-flex flex-column mr-auto">--}}
{{--                                            <!--begin: Title-->--}}
{{--                                            <div class="d-flex flex-column mr-auto">--}}
{{--                                                <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$job->title}}</a>--}}
{{--                                                <span class="text-muted font-weight-bold">{{$jobLocation->name}}</span>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Title-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Info-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                    <!--begin::Description-->--}}
{{--                                    <div class="mb-10 mt-5 font-weight-bold">{!! htmlspecialchars_decode($job->description) !!}</div>--}}
{{--                                    <!--end::Description-->--}}
{{--                                    <!--begin::Data-->--}}
{{--                                    <div class="d-flex mb-5">--}}
{{--                                        <div class="d-flex align-items-center mr-7">--}}
{{--                                            <span class="font-weight-bold mr-4">Start</span>--}}
{{--                                            <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{\Carbon\Carbon::parse($job->date)->format('d M y')}}</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="font-weight-bold mr-4">End</span>--}}
{{--                                            <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{\Carbon\Carbon::parse($job->expireDate)->format('d M y')}}</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Data-->--}}
{{--                                    @php $appliedJobs = DB::table('candidate_applied_jobs')->where('job_id', $job->id)->where('user_id', Auth::user()->id)->first(); @endphp--}}
{{--                                    <a @if(isset($appliedJobs)) style="cursor: no-drop" class="btn btn-block btn-sm btn-danger font-weight-bolder text-uppercase py-4"--}}
{{--                                       @else href="{{route('jobApply', $job->id)}}" class="btn btn-block btn-sm btn-light-success font-weight-bolder text-uppercase py-4"--}}
{{--                                        @endif >--}}
{{--                                        @if(isset($appliedJobs)) Applied @else Apply @endif--}}
{{--                                    </a>--}}

{{--                                </div>--}}
{{--                                <!--end::Body-->--}}
{{--                            </div>--}}
{{--                            <!--end:: Card-->--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    @if (count($matchedJobs) == 0)--}}
{{--                        <h1 style="text-align: center">No Jobs Posted</h1>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <!--begin::Pagination-->--}}
{{--                <div class="d-flex justify-content-between align-items-center flex-wrap" style="position: relative;top: 0;bottom: 0;left: 0; right: 0; width: 200px; height: 100px; margin: auto;">--}}
{{--                    <div class="d-flex flex-wrap mr-3">--}}
{{--                        {{$matchedJobs->links()}}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end::Pagination-->--}}
{{--            </div>--}}
{{--            <!--end::Container-->--}}
{{--        </div>--}}
{{--      </div>--}}
@endsection

@section('script')
    <script>
        function deleteFunction(id) {
            swal({
                title: "Are you sure?",
                text: "Job will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            method: "POST",
                            {{--url: "{{route('deleteUser')}}",--}}
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                'id': id
                            },
                            success: function (response) {
                                if(response.status === 1){
                                    swal("Successfully Deleted", {
                                        icon: "success",
                                    });
                                    window.setTimeout(function() {
                                        location.reload();
                                    }, 1000);
                                }
                                else{
                                    swal("Error While Deleting", {
                                        icon: "error",
                                    });
                                }
                            }
                        });

                    } else {
                        swal("Your Data is safe!");
                    }
                });
        }
    </script>
@endsection
