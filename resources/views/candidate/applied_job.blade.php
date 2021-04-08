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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashboard.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb-area">
                    <h1>Applied Jobs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('candidatedashboardd', Auth::user()->id)}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Applied Jobs</li>
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
                        <div class="dashboard-applied">
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
                            <h4 class="apply-title">Total {{count($jobs)}} Jobs Applied</h4>
                            <div class="dashboard-apply-area">

{{--                                <div class="about-details dashboard-section" >--}}
{{--                                    <br>--}}
{{--                                    <div class="information-and-contact">--}}
{{--                                        <div class="information">--}}
{{--                                            <h4>Information</h4>--}}
{{--                                            <ul>--}}
{{--                                                <li><span>CV Views:</span> </li>--}}
{{--                                                <li><span>Matched Jobs Total:</span>  <a href="{{route('search', Auth::user()->id)}}">View</a> </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row">
                                    <div class="col-md-6 main3">
                                        @php
                                                        $ignoredJobs = DB::table('candidate_applied_jobs')
                                                        ->where('user_id', Auth::user()->id)
                                                        ->where('status', 'Ignored')
                                                        ->count();
                                         @endphp
                                        <a href="{{url('candidate/ignored_applied_job', Auth::user()->id)}}"><div><i class="fa fa-thumbs-down"></i> Ignored Jobs <br> <span>{{isset($ignoredJobs) ? $ignoredJobs : 0}}</span></div></a>
                                    </div>
                                    <div class="col-md-6 main3">
                                        @php
                                                        $InterestingJobs = DB::table('candidate_applied_jobs')
                                                        ->where('user_id', Auth::user()->id)
                                                        ->where('status', 'Interesting')
                                                        ->count();
                                        @endphp
                                        <a href="{{url('candidate/interesting_applied_job', Auth::user()->id)}}"><div><i class="fa fa-flag"></i> Interesting Jobs <br> <span>{{isset($InterestingJobs) ? $InterestingJobs : 0}}</span></div></a>
                                    </div>
                                    <div class="col-md-6 main3">
                                        @php
                                                        $InterviewedJobs = DB::table('candidate_applied_jobs')
                                                        ->where('user_id', Auth::user()->id)
                                                        ->where('status', 'Interview')
                                                        ->count();
                                        @endphp
                                        <a href="{{url('candidate/interview_applied_job', Auth::user()->id)}}"><div><i class="fa fa-suitcase"></i> Interview Jobs <br> <span>{{isset($InterviewedJobs) ? $InterviewedJobs : 0 }}</span></div></a>
                                    </div>
                                    <div class="col-md-6 main3">
                                        @php
                                                        $HiredJobs = DB::table('candidate_applied_jobs')
                                                        ->where('user_id', Auth::user()->id)
                                                        ->where('status', 'Hired')
                                                        ->count();
                                        @endphp
                                        <a href="{{url('candidate/hired_applied_job', Auth::user()->id)}}"><div><i class="fa fa-thumbs-up"></i> Hired Jobs <br> <span>{{isset($HiredJobs) ? $HiredJobs : 0}}</span></div></a>
                                    </div>
                                </div>
                                <br>

                                <table id="myTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Company Name</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($jobs as $job)
                                            <tr class="job-items">

                                                <td class="title">
                                                    <h5><a href="{{url('candidate/job_details', [ 'id'=>$job->id, 'user_id'=> Auth::user()->id])}}">{{($job->title)}}</a></h5>
                                                </td>
                                                <td class="application">{{$job->companyname}}</td>
                                                <td class="deadline">{{$job->endingDate}}</td>
                                                <td class="application">{{$job->status}}</td>

                                                <td class="action">
                                                    <a href="{{ route('deleteAppliedJob',$job->id) }}" id="deleteCompany" data-id="{{ $job->id, $id_user->id }}"  class="bookmark-remove"><i class="fas fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    @include("common.side_bar_candidate")
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

<script>

    $(document).ready(function () {

        $("body").on("click","#deleteCompany",function(e){

            if(!confirm("Do you really want to do this?")) {
                return false;
            }

            e.preventDefault();
            let id = $(this).data("id");
            // var id = $(this).attr('data-id');
            let token = $("meta[name='csrf-token']").attr("content");
            let url = e.target;

            $.ajax(
                {
                    // url: url.href, //or you can use url: "company/"+id,
                    url: '{{url('candidate/destory/{id}/{user_id}')}}',
                    // type: 'DELETE',
                    method: 'post',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function (response){

                        $("#success").html(response.message)

                        Swal.fire(
                            'Remind!',
                            'Company deleted successfully!',
                            'success'
                        )
                    }
                });
            return false;
        });


    });

</script>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('js/map.js')}}"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "bSort" : false,
        });
    });
</script>
</body>
</html>
