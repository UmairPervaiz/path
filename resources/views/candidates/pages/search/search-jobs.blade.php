{{--@if (isset($jobs ?? ''))--}}
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
                        <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$job->title}}</a>
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
                    <span class="font-weight-bold mr-4">Due</span>
                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{\Carbon\Carbon::parse($job->endingDate)->format('d M y')}}</span>
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

        </div>
        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap" style="position: relative;top: 0;bottom: 0;left: 0; right: 0; width: 200px; height: 100px; margin: auto;">
            <div class="d-flex flex-wrap mr-3">

                     {{$jobs->links()}}
{{--                {!! $data->links() !!}--}}
            </div>
        </div>
        <!--end::Pagination-->
    </div>
</div>

{{--@endif--}}
@if (count($jobs) == 0)
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
