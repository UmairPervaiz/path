<div class="bookmark-area" >
    @foreach($jobs as $job)
        <div class="job-list">
            <div class="thumb">
                <a href="#">
                    <img src="{{asset('images/job/company-logo-1.png')}}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="body">
                <div class="content">
                    <h4><a href="{{url('candidate/job_details', [ 'id'=>$job->id, 'user_id'=> Auth::user()->id])}}">{{($job->title)}}</a></h4>
                    <div class="info">
                        <span class="company"><a href="#"><i data-feather="briefcase"></i>{{($job->companyname)}}</a></span>
                        <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{($job->job_location)}}</a></span>
                        <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>{{($job->type)}}</a></span>
                    </div>
                </div>
                <div class="more">
                    <div class="buttons">
                        <a href="#" class="button">Apply Now</a>
                        <a href="#" class="favourite"><i data-feather="heart"></i></a>
                    </div>
                    {{--  <a href="#" class="bookmark-remove"><i class="fas fa-times"></i></a>  --}}
                    <p class="deadline">Deadline: {{$job->endingDate}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>