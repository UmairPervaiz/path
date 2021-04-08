@extends('employer.layouts.master')

@section('title')
    Path | Candidate's CV
@endsection

@section('css')
@endsection

@section('main-content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
                <div style="text-align: end; margin-bottom: 10px">
                    <a onclick="window.print()" class="btn btn-success font-weight-bolder"><i class="la la-print"></i> Print</a>
                    <a href="{{url()->previous()}}" class="btn btn-primary font-weight-bolder"><i class="la la-backspace"></i> Go Back</a>
                </div>
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <!--begin::Details-->
                    <div class="d-flex mb-9">
                        <!--begin: Pic-->
                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                            <div class="symbol symbol-50 symbol-lg-120">
                                @if($candidate->avatar != null)
                                    <img src=" {{ asset('images/'.$candidate->avatar) }}" alt="image" />
                                @else
                                    <img  src="{{asset('public/employer/dist/assets/media/noimage.png')}}" alt="image" />
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
                                    <span style="cursor: pointer" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$candidate->name}}</span>
                                    <a href="#">
                                        <i class="flaticon2-correct text-success font-size-h5"></i>
                                    </a>
                                </div>
                                <div class="my-lg-0 my-3">
{{--                                    <a href="#" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">ask</a>--}}
{{--                                    <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">hire</a>--}}
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <div class="d-flex flex-wrap justify-content-between mt-1">
                                <div class="d-flex flex-column flex-grow-1 pr-8">
                                    <div class="d-flex flex-wrap mb-4">
                                        <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$candidate->email}}</a>
                                        <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <i class="flaticon2-phone mr-2 font-size-lg"></i>{{$candidate->phoneNo}}</a>
                                        <a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
                                            @php $location = DB::table('countries')->where('id', $candidate->location)->first(); @endphp
                                            <i class="flaticon2-placeholder mr-2 font-size-lg"></i>{{$location->name}}</a>
                                    </div>
                                    <span class="font-weight-bold text-dark-50">{{$candidate->about}}</span>
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
                                <i class="flaticon-avatar display-4 text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Gender</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold"></span>{{$candidate->gender}}</span>
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
                                    @php
                                        use Carbon\Carbon;
                                        $experiences = DB::table('candidate_experiences')
                                            ->where('user_id', $candidate->user_id)
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
                                    @endphp
                                <span class="text-dark-50 font-weight-bold"></span>
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
                                        No Experience
                                    @endif
                                </span>
                            </div>
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-book display-4 text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Latest Degree</span>
                                <span class="font-weight-bolder font-size-h5">
                                    @php
                                        $candidateDegree = DB::table('candidate_educations')
                                            ->where('user_id', $candidate->user_id)
                                            ->max('degree');
                                        $degree = DB::table('job_qualifications')->where('id', $candidateDegree)->first();
                                    @endphp
                                <span class="text-dark-50 font-weight-bold"></span>
                                    {{$degree->name}}
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
                                <span class="font-weight-bolder font-size-sm">Field Of expertise</span>
                                <span class="font-weight-bolder font-size-h5">
                                    @php $fields = explode(',', $candidate->field_of_expertise);
                                            $expertises = DB::table('employee_bussiness_categories')->whereIn('id', $fields)->get();
                                    @endphp
                                        <span class="text-dark-50 font-weight-bold"></span>
                                    @foreach($expertises as $expertise) {{$expertise->category}}
                                    @if (!$loop->last)
                                        {{" , "}}
                                    @endif
                                    @endforeach</span>
                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
							<span class="mr-4">
                                <i class="flaticon-earth-globe display-4 text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Country of Interest</span>
                                <span class="font-weight-bolder font-size-h5">
                                    @php $countries = explode(',', $candidate->country_of_interest);
                                            $countryOfInterests = DB::table('countries')->whereIn('id', $countries)->get();
                                    @endphp
                                        <span class="text-dark-50 font-weight-bold"></span>
                                    @foreach($countryOfInterests as $countryOfInterest) {{$countryOfInterest->name}}
                                    @if (!$loop->last)
                                        {{" , "}}
                                    @endif
                                    @endforeach</span>
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
@endsection

@section('script')
@endsection
