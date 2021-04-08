<?php $rootPath ="../";?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PATH</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">

    <!-- External Css -->
    <link rel="stylesheet" href="{{asset('asset/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/et-line.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/plyr.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/flag.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/jquery.nstSlider.min.css')}}" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('asset/images/favicon')}}">
    <link rel="apple-touch-icon" href="{{asset('asset/images/apple-touch-icon')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('asset/images/icon-72x72')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('asset/images/icon-114x114')}}">



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
                    <h1>Pricing Plan</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pricing Plan</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-form">
                    <form action="#">
                        <input type="text" placeholder="Enter Keywords">
                        <button><i data-feather="search"></i></button>
                    </form>
                </div>
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
                        <div class="row">
                            <div class="col">
                                {{-- <div class="pricing-controller">
                                    <span class="duration duration-month active">Monthly</span>
                                    <div class="switch-wrap" id="switchButton"><span class="switch"></span></div>
                                    <span class="duration duration-year">Annually <span>Save 10%</span></span>
                                </div> --}}
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('payHistory')}}">Payment history</a>
                            </div>

                        </div>
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
                        <div class="row">
                            @foreach($packages as $package)
                                <div class="col-md-6">
                                    <form action="{{route('paymentmethod', encrypt($package->package_id))}}" method="POST">
                                        @csrf
                                        <div class="pricing starter">

                                            <span class="package-title">{{$package->package_name}}</span>
                                            <p class="description"> {{$package->package_description}}  <span></span></p>
                                            <div class="package-info">
                                                <h3 class="monthly-rate"><span>{{$package->currency}}{{$package->rate}}</span>/mo</h3>
{{--                                                <h3 class="yearly-rate hidden"><span>{{$package->currency}}{{$package->yearly_rate}}</span>/year</h3>--}}
                                                <p class="user-number monthly-rate">Maximum {{$package->job_limit}} Jobs<i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="When you buy Markesia you get all you see in the demo but the images"></i></p>
{{--                                                <p class="user-number yearly-rate hidden">Maximum {{$package->job_limit_yearly}} Jobs<i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="When you buy Markesia you get all you see in the demo but the images"></i></p>--}}

                                            </div>

                                            <div class="features">
                                                <h6>Features</h6>
                                                <span @if($package->package_name === 'Starter') hidden  @endif >* Includes Everything in Starter</span>
                                                <ul>
                                                    @php
                                                        $package_id = $package->id;
                                                        $feature_list = DB::table('package_feature_lists') ->where('package_details_id',$package_id)
                                                        ->select('*')
                                                        ->get();
                                                    @endphp
                                                    @foreach($feature_list as $feature_list)
                                                        <li>{{$feature_list->feature_name}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="buy-button">
                                                <input type="hidden" name="month" class="monthInput" value="monthly">

                                                @if($exist == 0)
                                                    <button type="submit" class="button primary-bg">Get Started</button>
                                                @elseif($exist == 1)
                                                    @if($existRecord == "" || empty($existRecord))
                                                        <button type="submit" class="button primary-bg">Get Started</button>
                                                    @else
                                                        <button @if($existRecord->package_id ==  $package->package_id) disabled @endif type="submit" class="button primary-bg">@if($existRecord->package_id ==  $package->package_id) Purchased @else Get Started @endif</button>
                                                    @endif
                                                @endif
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            @endforeach

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
                                        <img src="{{asset('images/footer-logo.png')}}" class="img-fluid" alt="">
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

    <script>
        $('#switchButton').click(function () {
            if($('.monthInput').val() == "monthly"){
                $('.monthInput').val('yearly');
            }
            else{
                $('.monthInput').val('monthly');
            }
        });
    </script>
</body>
</html>
