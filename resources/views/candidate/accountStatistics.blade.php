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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{--    multi dropdown --}}
    <link href="https://cdn.syncfusion.com/ej2/material.css" rel="stylesheet">

{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">--}}

    <style>
        body{
            touch-action:none;
        }
    </style>
{{--    <iframe width="158" height="49" scrolling="no" role="presentation" src="https://mdbootstrap.com/api/snippets/embed/2156660" frameborder="0" allowtransparency></iframe>--}}
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



        /*!** demo styling *!*/
        /*body {*/
        /*    padding: 10px;*/
        /*    font: 16px/1.21 'Helvetica Neue',helvetica,arial,sans-serif;*/
        /*}*/
        /*fieldset {*/
        /*    padding: 10px;*/
        /*    border: none;*/
        /*}*/
        /*label {*/
        /*    display: inline-block;*/
        /*    width: 3.5em;*/
        /*    text-align: right;*/
        /*    padding: 0 5px;*/
        /*}*/
        /*input {*/
        /*    display: inline-block;*/
        /*    padding: 2px;*/
        /*    margin: 2px 0;*/
        /*    background: #FFF;*/
        /*    border: 1px solid #CCC;*/
        /*    width: 16em;*/
        /*    font: inherit;*/
        /*    border-radius: 2px;*/
        /*    box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);*/
        /*}*/
        /*input:focus, .tags-input.focus {*/
        /*    border-color: #59F;*/
        /*    outline: none;*/
        /*}*/


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
                    <h1>Account Statistics</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('candidatedashboardd', Auth::user()->id)}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account Statistics</li>
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

                        <div class="about-details details-section dashboard-section">
                            <h4><i data-feather="align-left"></i>Account Statistics</h4>
                            <br>
                            <div class="information-and-contact">
                                <div class="information">
                                    <h4>Information</h4>
                                    <ul>
                                        <li><span>CV Views:</span> {{ $cvCount }}</li>
                                        <li><span>Matched Jobs Total:</span> {{ count($matchedJobs) }} <a href="{{route('search', Auth::user()->id)}}">View</a> </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="special-qualification dashboard-section details-section">
                            <h4><i data-feather="gift"></i>Applied Jobs</h4>
                            <br>
                            <ul>
                                @foreach ($jobs as $item)
                                    <li><a href="{{url('candidate/job_details', [ 'id'=>$item->id, 'user_id'=> Auth::user()->id])}}">{{$item->title}}</a></li>
                                @endforeach
                            </ul>

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

<script>
    // $(document).ready(function(){
    //     $("input[type='checkbox']").change(function(){
    //         if($(this).val()==="Other")
    //         // if($(this).id === 4)
    //         {
    //             $("#field_of_expertise").show();
    //         }
    //         else
    //         {
    //             $("#field_of_expertise").hide();
    //         }
    //     });
    // });

    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });

</script>

