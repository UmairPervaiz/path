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
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashboard.css')}}">
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

@include('common.header-candidate')

<div class="headerSeparator"></div>
<!-- Main 3 Boxs -->
<div class="alice-bg padding-top-70 padding-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-md-4 main3 activated">
                <a href="{{url('candidate/dashboard', Auth::user()->id)}}"><div class=""><i class="fa fa-star"></i> Home</div></a>
            </div>
            <div class="col-md-4 main3">
                <a href="{{url('candidate/search', Auth::user()->id)}}"><div><i class="fa fa-search"></i> Search For Job</div></a>
            </div>
            <div class="col-md-4 main3">
                <a href="{{route('candidatedashboardd', Auth::user()->id)}}"><div><i class="fa fa-home"></i> Dashboard</div></a>

            </div>
        </div></div>
</div>
<!-- End 3 Boxs -->


<div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
        <div class="row no-gliters">
            <div class="col">
                <div class="dashboard-container">
                    <div class="dashboard-content-wrapper">
                        <div class="dashboard-bookmarked">
                            <h4 class="bookmark-title">Recommended Jobs for you</h4>
                            <div class="bookmark-area">
                                @foreach($jobs as $job)
                                <div class="job-list">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('images/job/company-logo-1.png')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="{{url('candidate/job_details', [ 'id'=>$job->id, 'user_id'=> $user_found])}}">{{$job->title}}</a></h4>
                                            <div class="info">
                                                <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$job->job_location}}</a></span>
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i> {{$job->salary}}</a></span>
{{--                                                <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>--}}
                                            </div>
                                        </div>
                                        <div class="more">
                                            <div class="buttons">
                                                <a href="#" class="button">Apply Now</a>
                                                <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                            </div>
                                            <a href="#" class=""><i class=""></i></a>
{{--                                            <a href="#" style="display: none" type="hidden" class="bookmark-remove"><i class="fas fa-times"></i></a>--}}
                                            <p class="deadline">Deadline: {{$job->endingDate}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                            @include("common.side_bar_candidate")
                </div>
            </div>
        </div>
    </div>
</div>



<?php
//require_once $rootPath.'common/footer.php';
//$dashboard=1;
//require_once $rootPath.'common/footerLibraries.php';
//?>

@include('common.footer')
@include('common.footerLibraries')
</body>
</html>
