<?php $rootPath ="../";?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PATH</title>

    <!-- Bootstrap CSS -->
    @include('common.libraries');
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashboard.css')}}">

    <style>
        .headerSeparator{
            width:100%; height:60px;
        }

    </style>
</head>
<body>


@include('common.header-candidate')
<div class="headerSeparator"></div>


<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb-area">
                    <h1>{{Auth::user()->name}}'s  Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{Auth::user()->name}}'s Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6">
{{--                <div class="breadcrumb-form">--}}
{{--                    <form action="#">--}}
{{--                        <input type="text" placeholder="Enter Keywords">--}}
{{--                        <button><i data-feather="search"></i></button>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
        <div class="row no-gliters">
            <div class="col">
                <div class="dashboard-container">
                    <div class="dashboard-content-wrapper">
                        <div class="dashboard-section user-statistic-block">
                            <div class="user-statistic">
                                <i data-feather="command"></i>
                                @php
                                $user_id = Auth::user()->id;

                                $job_count =  DB::table('jobs')->where('user_id', $user_id)->count();
                                @endphp
                                <h3>{{$job_count}}</h3>
                                <span>Total Job Posted</span>
                            </div>
                            <div class="user-statistic">
                                <i data-feather="file-text"></i>
                                <h3>{{$count}}</h3>
                                <span>Application Submit</span>
                            </div>
                            <div class="user-statistic">
                                <i data-feather="users"></i>
                                <h3>{{$totalJobCount}}</h3>
                                <span>Total Job Views</span>
                            </div>
                        </div>
{{--                        <div class="dashboard-section dashboard-view-chart">--}}
{{--                            <canvas id="view-chart" width="400" height="200"></canvas>--}}
{{--                        </div>--}}
                        <div class="manage-job-container dashboard-section dashboard-recent-activity">
                            <h4 class="title">List of Jobs </h4>
                            <table class="table">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif


                                @if ($message = Session::get('warning'))
                                    <div class="alert alert-warning alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <thead>
                                <tr>
                                    <th style="text-align:center">Job Title</th>
                                    <th>Applications</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Views</th>

                                    <th class="action" style="text-align:center">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($jobs != '')
                                    @foreach($jobs as $job)

                                        <tr class="job-items">
                                            <td class="title">
                                                <h5><a href="{{route('postjobview',encrypt($job->id) )}}">{{($job->title)}}</a></h5>
                                                <div class="info">
                                                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$job->job_location}}</a></span>
                                                    <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>{{($job->type)}}</a></span>
                                                </div>
                                            </td>
                                            <td class="application"><a href="{{url('employee/manageCandidate', [encrypt(Auth::user()->id), 'job_id' => encrypt($job->id)] )}}">
                                                    @php
                                                        $job_id = $job->id;

                                                         $count_total_application = DB::table('candidate_applied_jobs')->where('job_id', $job_id)->count();
                                                    @endphp
                                                    {{$count_total_application}} Application(s)
                                                </a></td>
                                            <td class="deadline">{{$job->endingDate}}</td>
                                            <td class="status active">{{$job->status}}</td>
                                            <td class="deadline">{{$job->count}}</td>

                                            <td class="action">
                                                <a href="{{route('postjobview',encrypt($job->id) )}}" class="preview" title="Preview"><i data-feather="eye"></i></a>
                                                <a href="{{route('postJobEdit', encrypt($job->id) )}}" class="edit" title="Edit"><i data-feather="edit"></i></a>
                                                <a href="{{route('deleteJob', encrypt($job->id))}}" class="remove" title="Delete"><i data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
{{--                            <div class="activity-list">--}}
{{--                                <i class="fas fa-bolt"></i>--}}
{{--                                <div class="content">--}}
{{--                                    <h5>Your Resume Updated!</h5>--}}
{{--                                    <span class="time">5 hours ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="close-activity">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="activity-list">--}}
{{--                                <i class="fas fa-arrow-circle-down"></i>--}}
{{--                                <div class="content">--}}
{{--                                    <h5>Someone downloaded your resume.</h5>--}}
{{--                                    <span class="time">11 hours ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="close-activity">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="activity-list">--}}
{{--                                <i class="fas fa-check-square"></i>--}}
{{--                                <div class="content">--}}
{{--                                    <h5>You applied for Project Manager @homeland</h5>--}}
{{--                                    <span class="time">11 hours ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="close-activity">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="activity-list">--}}
{{--                                <i class="fas fa-check-square"></i>--}}
{{--                                <div class="content">--}}
{{--                                    <h5>You applied for Project Manager @homeland</h5>--}}
{{--                                    <span class="time">5 hours ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="close-activity">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="activity-list">--}}
{{--                                <i class="fas fa-user"></i>--}}
{{--                                <div class="content">--}}
{{--                                    <h5>You changed password successfuly</h5>--}}
{{--                                    <span class="time">2 days ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="close-activity">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="activity-list">--}}
{{--                                <i class="fas fa-heart"></i>--}}
{{--                                <div class="content">--}}
{{--                                    <h5>Someone bookmarked you</h5>--}}
{{--                                    <span class="time">3 days ago</span>--}}
{{--                                </div>--}}
{{--                                <div class="close-activity">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                            @include('common.side_bar_employ')
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
                            <div class="col-md-6">
                                <div class="footer-logo">
                                    <a href="#">
                                        <img src="{{asset('asset/images/footer-logo.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-social">
                                    <ul class="social-icons">
                                        <li><a href="#"><i data-feather="facebook"></i></a></li>
                                        <li><a href="#"><i data-feather="twitter"></i></a></li>
                                        <li><a href="#"><i data-feather="linkedin"></i></a></li>
                                        <li><a href="#"><i data-feather="instagram"></i></a></li>
                                        <li><a href="#"><i data-feather="youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5 order-lg-2">
                                <div class="footer-app-download">
{{--                                    <a href="#" class="apple-app">Apple Store</a>--}}
{{--                                    <a href="#" class="android-app">Google Play</a>--}}
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
<script src="{{asset('asset/js/jquery.min.js')}}"></script>
<script src="{{asset('asset/js/popper.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/js/feather.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.nstSlider.min.js')}}"></script>
<script src="{{asset('asset/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('asset/js/visible.js')}}"></script>
<script src="{{asset('asset/js/jquery.countTo.js')}}"></script>
<script src="{{asset('asset/js/chart.js')}}"></script>
<script src="{{asset('asset/js/plyr.js')}}"></script>
<script src="{{asset('asset/js/tinymce.min.js')}}"></script>
<script src="{{asset('asset/js/slick.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('dashboard/js/dashboard.js')}}"></script>
<script src="{{asset('dashboard/js/datePicker.js')}}"></script>
<script src="{{asset('dashboard/js/upload-input.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('js/map.js')}}"></script>
</body>
</html>
