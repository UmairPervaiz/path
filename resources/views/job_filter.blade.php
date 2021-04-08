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

<div class="alice-bg padding-top-60 section-padding-bottom">
    <div class="section-padding-bottom alice-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs job-tab" id="myTab" role="tablist">
                        <li class="nav-item">
                                <a class="nav-link " id="recent-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="true">Searched Result</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                            <div class="row">
                                @if (count($total_jobs) <= 0 )
                                        <h4 style="margin-left: 470px">No Jobs Found</h4>
                                @else
                                    @foreach($total_jobs as $total_job)
                                        <div class="col-lg-6">
                                            @php
                                                $avatar = DB::table('users')
                                                                    ->select('avatar')
                                                                    ->where('id',$total_job->user_id)
                                                                    ->first();
                                            @endphp
                                            <div class="job-list half-grid">
                                                <div class="thumb">
                                                    <a href="{{route('jobDetails', encrypt($total_job->id))}}">
                                                        <img src="{{ asset('images/'.$avatar->avatar) }}" class="img-fluid" alt="">
                                                    </a>
                                                </div>
                                                <div class="body">
                                                    <div class="content">
                                                        <h4><a href="{{route('jobDetails', encrypt($total_job->id))}}">{{$total_job->title}}</a></h4>
                                                        <div class="info">
                                                            <span class="company"><a href="{{route('jobDetails', encrypt($total_job->id))}}"><i class="fa fa-briefcase"></i> {{$total_job->companyName}}</a></span>
                                                            <span class="office-location"><a href="{{route('jobDetails', encrypt($total_job->id))}}"><i class="fa fa-map-pin"></i> {{$total_job->job_location}}</a></span>
                                                            <span class="job-type temporary"><a href="{{route('jobDetails', encrypt($total_job->id))}}"><i class="fa fa-clock"></i> {{$total_job->type}}</a></span>
                                                        </div>
                                                    </div>
                                                    <div class="more">
                                                        <div class="buttons">
                                                            <a href="#" class="button">Apply Now</a>
                                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                                        </div>
                                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
