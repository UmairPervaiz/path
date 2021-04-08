@extends('candidates.layouts.master')

@section('title')
    Path | Search Jobs
@endsection

@section('css')
@endsection

@section('main-content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Job Search</h5>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid">

            <div class="container">

                <form method="POST" action="{{route('jobs')}}">
                    @csrf
                    <div class="form-group row col-lg-12">

                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control selectpicker" id="country" name="country_id" data-size="7" data-live-search="true">
                                <option selected disabled value=" ">Select Country</option>
{{--                                <option data-divider="true" label="Label"></option>$countryId--}}
{{--                                <option value=" ">All</option>--}}
                                <option data-divider="true" label="Label"></option>
                                @foreach($countries as $country)
                                    @if (isset($countryId))
                                        <option {{($countryId == $country->id) ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                    @else
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control selectpicker" id="industry" name="industry_id" data-size="7" data-live-search="true">
                                <option selected disabled value=" ">Select Industry</option>
{{--                                <option data-divider="true" label="Label"></option>--}}
{{--                                <option value=" ">All</option>--}}
                                <option data-divider="true" label="Label"></option>
                                @foreach($industries as $industry)
                                    @if (isset($industryId))
                                        <option {{($industryId == $industry->id) ? 'selected' : ''}} value="{{$industry->id}}">{{$industry->category}}</option>
                                    @else
                                        <option value="{{$industry->id}}">{{$industry->category}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control selectpicker" id="company" name="company_name" data-size="7" data-live-search="true" required>
                                <option selected disabled value="">Select Company name</option>
{{--                                <option data-divider="true" label="Label"></option>--}}
{{--                                <option value=" ">All</option>--}}
                                <option data-divider="true" label="Label"></option>
                                @foreach($companies as $company)
                                    @if (isset($companyName))
                                    <option {{($companyName == $company->name) ? 'selected' : ''}} value="{{$company->name}}">{{$company->name}}</option>
                                        @else
                                    <option value="{{$company->name}}">{{$company->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-9 col-sm-12" style="margin-top: 10px">
                            <div style="text-align: end">
{{--                                <a onclick="searchFunction()" class="btn btn-primary mr-2" >Filter</a>--}}
                                <button type="submit" class="btn btn-primary mr-2" >Filter</button>
                            </div>
                        </div>
                    </div>
                </form>

                @if (isset($jobs ))
                    <div id="search-jobs">
{{--                    @include('candidates.pages.search.search-jobs')--}}
                        <div id="load" class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <!--begin::Row-->
                                <div class="row">
                                    @foreach($jobs as $job)
                                        @php
                                            $jobLocation = DB::table('countries')->where('id', $job->job_location)->first();
                                        @endphp
                                        <div class="col-xl-4">
                                            <!--begin::Card-->
                                            <div class="card card-custom gutter-b card-stretch">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Info-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Pic-->
                                                        <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle">
                                                            <img src="{{asset('images/'.$job->avatar)}}" alt="image" />
                                                        </div>
                                                        <!--end::Pic-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column mr-auto">
                                                            <!--begin: Title-->
                                                            <div class="d-flex flex-column mr-auto">
                                                                <a class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$job->title}}</a>
                                                                <span class="text-muted font-weight-bold">{{$jobLocation->name}}</span>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Description-->
                                                    <div class="mb-10 mt-5 font-weight-bold">{!! htmlspecialchars_decode($job->description) !!}</div>
                                                    <!--end::Description-->
                                                    <!--begin::Data-->
                                                    <div class="d-flex mb-5">
                                                        <div class="d-flex align-items-center mr-7">
                                                            <span class="font-weight-bold mr-4">Start</span>
                                                            <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{\Carbon\Carbon::parse($job->date)->format('d M y')}}</span>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span class="font-weight-bold mr-4">End</span>
                                                            <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{\Carbon\Carbon::parse($job->expireDate)->format('d M y')}}</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Data-->
                                                    @php $appliedJobs = DB::table('candidate_applied_jobs')->where('job_id', $job->job_id)->where('user_id', Auth::user()->id)->first(); @endphp
                                                    <a @if(isset($appliedJobs)) style="cursor: no-drop" class="btn btn-block btn-sm btn-danger font-weight-bolder text-uppercase py-4"
                                                       @else href="#" class="btn btn-block btn-sm btn-light-success font-weight-bolder text-uppercase py-4"
                                                        @endif >
                                                        @if(isset($appliedJobs)) Applied @else Apply @endif
                                                    </a>

                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end:: Card-->
                                        </div>
                                    @endforeach
                                        @if (!isset($jobs))
                                            <div class="d-flex flex-column-fluid">
                                                <!--begin::Container-->
                                                <div class="container">
                                                    <!--begin::Row-->
                                                    <div class="row" style="justify-content: center">
                                                        <h2 class="font-weight-bolder text-uppercase py-4">No Jobs Found!</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                </div>
                                <!--begin::Pagination-->
{{--                                <div class="d-flex justify-content-between align-items-center flex-wrap" style="position: relative;top: 0;bottom: 0;left: 0; right: 0; width: 200px; height: 100px; margin: auto;">--}}
{{--                                    <div class="d-flex flex-wrap mr-3">--}}

{{--                                        {{$jobs->links()}}--}}
{{--                                                        {!! $jobs->links() !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <!--end::Pagination-->
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>

@endsection

@section('script')
    <script>
        function searchFunction() {
            // alert($('#country').val() + $('#industry').val() + $('#company').val());

            // if ($('#country').val() == null && $('#industry').val() == null && $('#company').val() == null)
            if ($('#company').val() == null)
            {
                alert('Please select Company Name from dropdown');
            }
            else {
            $.ajax({
                url: "{{route('jobs')}}",
                method: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    country_id: $('#country').val(),
                    industry_id: $('#industry').val(),
                    company_name: $('#company').val(),
                },
                success: function(jobs) {
                    $("#search-jobs").html('');
                    // $("#search-jobs").html(data.options);
                    $("#search-jobs").html(jobs);
                    $('#js-example-basic-multiple').select2();
                    $('.js-example-basic-multiple1').select2();
                }
            });
            }
        }
    </script>
@endsection
