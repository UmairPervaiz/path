<?php $rootPath ="../";?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PATH</title>

    <!-- Bootstrap CSS -->
    @include('common.libraries')


    <style>
        .main3 {
            padding:5px;


            color:#fff;
        }
        .main3 div {
            margin:20px;
            padding:20px;
            background-color: #273238;
            text-align: center;
            border-radius: 5px;
            font-weight: 700;
            font-size: 22px;
        }
        .main3 div i{
            font-size: 25px;
        }
        .main3   a{
            display: block;
        }
        .main3.activated div{
            background-color: #f04d42;
            color:#fff;

        }
        .main3:hover div{
            background-color: #f04d42;
            color:#fff;
        }
        .headerSeparator{
            width:100%; height:60px;
        }

    </style>
</head>
<body>

<header class="header-2" style="position:fixed; top:0; width:100%;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-top">
                    <div class="logo-area">
                        <a href="{{route('welcome')}}"><img src="{{asset('asset/images/logo-2.png')}}" alt=""></a>
                    </div>
                    <div class="header-top-toggler">
                        <div class="header-top-toggler-button"></div>
                    </div>
                    <div class="top-nav">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="headerSeparator"></div>

<!-- Candidates Details -->
<div class="alice-bg padding-top-60 section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="job-listing-details">
                    <div class="job-title-and-info">
                        <div class="title">
                            <div class="thumb">
                                @php
                                    $avatar = DB::table('users')
                                                        ->select('avatar')
                                                        ->where('id',$job->user_id)
                                                        ->first();
                                @endphp
                                <img src="{{ asset('images/'.$avatar->avatar) }}" class="img-fluid" alt="">
                            </div>
                            <div class="title-body">
                                <h4>{{($job->title)}}</h4>
                                <div class="info">
                                    <span class="company"><a href="#"><i class="fa fa-briefcase"></i> {{($job->companyName)}}</a></span>
                                    <span class="office-location"><a href="#"><i class="fa fa-map-pin"></i> {{($job->job_location)}}</a></span>
                                    <span class="job-type full-time"><a href="#"><i class="fa fa-clock"></i> {{($job->type)}}</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="buttons">
                            @guest()
                                <a class="apply" href="{{route('jobDetailsCheck')}}">Apply Online</a>
                            @endguest
                            @auth()
                                @php
                                        $userCandidate = DB::table('model_has_roles')
                                                                ->where('model_id', Auth::user()->id)
                                                                ->where('role_id', 3)
                                                                ->first();
                                @endphp
                                @if (isset($userCandidate))
                                        @php
                                            $dataCheck = DB::table('candidate_applied_jobs')->select()->where('user_id', Auth::user()->id)->where('job_id', $job->id)->first();
                                        @endphp
                                        @if(isset($dataCheck))
                                            <a class="apply">Applied</a>
                                        @else
                                            <a class="apply" href="{{route('applyJob', ['id'=> $job->id, 'user_id'=>Auth::user()->id])}}">Apply Online</a>
                                        @endif
{{--                                        <a class="apply" href="{{route('applyJob', ['id'=> $job->id, 'user_id'=> Auth::user()->id])}}">Apply Online</a>--}}
                                @endif
                            @endauth
                        </div>

                    </div>
                    <div class="details-information section-padding-60">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="description details-section">
                                    <h4><i data-feather="align-left"></i>Job Description</h4>
                                    <p>{!! htmlspecialchars_decode($job->description) !!}</p>
                                </div>
                                <div class="responsibilities details-section">
                                    <h4><i data-feather="zap"></i>Responsibilities</h4>
                                    <ul>
                                        {!! htmlspecialchars_decode($job->responsibilities) !!}
                                    </ul>
                                </div>
                                <div class="edication-and-experience details-section">
                                    <h4><i data-feather="book"></i>Education + Experience</h4>
                                    <ul>
                                        {!! htmlspecialchars_decode($job->education) !!}
                                    </ul>
                                </div>
                                <div class="job-apply-buttons">
                                    @guest()
                                        <a class="apply" href="{{route('jobDetailsCheck')}}">Apply Online</a>
                                    @endguest
                                    @auth()
                                        @php
                                            $userCandidate = DB::table('model_has_roles')
                                                                    ->where('model_id', Auth::user()->id)
                                                                    ->where('role_id', 3)
                                                                    ->first();
                                        @endphp
                                        @if (isset($userCandidate))
                                                @php
                                                    $dataCheck = DB::table('candidate_applied_jobs')->select()->where('user_id', Auth::user()->id)->where('job_id', $job->id)->first();
                                                @endphp
                                                @if(isset($dataCheck))
                                                    <a class="apply">Applied</a>
                                                @else
                                                    <a class="apply" href="{{route('applyJob', ['id'=> $job->id, 'user_id'=>Auth::user()->id])}}">Apply Online</a>
                                                @endif
{{--                                            <a class="apply" href="{{route('applyJob', ['id'=> $job->id, 'user_id'=> Auth::user()->id])}}">Apply Online</a>--}}
                                        @endif
                                    @endauth
                                </div>
                            </div>
                            <div class="col-xl-4 offset-xl-1 col-lg-4">
                                <div class="information-and-share">
                                    <div class="job-summary">
                                        <h4>Job Summary</h4>
                                        <ul>
                                            <li><span>Published on:</span> {{($job->date)}}</li>
                                            <li><span>Application Deadline:</span> {{$job->endingDate}}</li>
                                            <li><span>Posted by:</span> {{$user->name}}</li>
                                            <li><span>Vacancy:</span> {{($job->vacancy)}}</li>
                                            <li><span>Employment Status:</span> {{($job->type)}}</li>
                                            <li><span>Experience:</span> {{($job->experience)}}</li>
                                            <li><span>Job Location:</span> {{($job->job_location)}}</li>
                                            <li><span>Salary:</span> {{($job->salary)}}</li>
                                            <li><span>Gender:</span> {{($job->gender)}}</li>
                                        </ul>
                                    </div>
                                    <div class="share-job-post">
                                        <span class="share"><i class="fas fa-share-alt"></i>Share:</span>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#" class="add-more"><span class="ti-plus"></span></a>
                                    </div>
                                    <div class="buttons">
                                        <a href="#" class="button print"><i data-feather="printer"></i>Print Job</a>
                                        <a href="#" class="button report"><i data-feather="flag"></i>Report Job</a>
                                    </div>
                                    <div class="job-location">
                                        <h4>Job Location</h4>
                                        <div id="map-area">
                                            <div class="cp-map" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <div class="company-information details-section">
                                <h4><i data-feather="briefcase"></i>About the Company</h4>
                                <ul>
                                    <li><span>Company Name:</span> {{($job->companyName)}}</li>
                                    <li><span>Address:</span> {{$user->address}}</li>
                                    <li><span>Website:</span> <a href="#">{{($job->webAddress)}}</a></li>
                                    <li><span>Company Profile:</span></li>
                                    <li>{{($job->companyProfile)}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Candidates Details End -->

<!-- Footer -->
<footer class="footer-bg">
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-bottom border-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 order-lg-2">
                                <div class="footer-app-download">
                                    <a href="#" class="apple-app">Apple Store</a>
                                    <a href="#" class="android-app">Google Play</a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 order-lg-1">
                                <p class="copyright-text">Copyright <a href="#">PATH</a> 2018, All right reserved</p>
                            </div>
                            <div class="col-xl-4 col-lg-3 order-lg-3">
                                <div class="back-to-top">
                                    <a href="#">Back to top<i class="fas fa-angle-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/feather.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nstSlider.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/visible.js')}}"></script>
<script src="{{asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset('assets/js/chart.js')}}"></script>
<script src="{{asset('assets/js/plyr.js')}}"></script>
<script src="{{asset('assets/js/tinymce.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('js/map.js')}}"></script>

</body>
</html>
