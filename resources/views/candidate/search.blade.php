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
<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb-area">
                    <h1>Search</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('candidatedashboardd', Auth::user()->id)}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
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
                        <div class="dashboard-bookmarked">
                            <h4 class="bookmark-title">Advanced search</h4>
                            <form class="form-horizontal form-bordered form-bordered">

                                <div class="row form-group">

                                    <div class="col-lg-11 ">
                                        <div class="row">

                                            {{-- <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="formGroupExampleInput">Matched</label>
                                                    <select data-plugin-selectTwo class="form-control populate">
                                                        <option value="">-- All --</option>
                                                        <option value="Information technology">Matched Only</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="formGroupExampleInput">Industry</label>
                                                    <select data-plugin-selectTwo class="form-control populate" id="industry">
                                                        <option selected value="">-- All --</option>
                                                        @foreach ($industries as $item)
                                                            <option value="{{$item->category}}">{{$item->category}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="col-lg-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-12">Country</label>
                                                    <div class="col-lg-12">

                                                        <select id="country" name="country" class="form-control populate">
                                                            <option selected value=" ">-- Please Select --</option>
                                                            @foreach ($countries as $item)
                                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="companyName">Company</label>
                                                    <select data-plugin-selectTwo class="form-control populate" id="companyName">
                                                        <option selected value="">-- All --</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-12">Educational Level</label>
                                                    <div class="col-lg-12">
                                                        <select class="form-control populate" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200, "includeSelectAllOption": true }' id="ms_example5">
                                                            <option value="lessHigh">No Preference</option>
                                                            <option value="HighSchool">High School</option>
                                                            <option value="BachelorDegree">Bachelor Degree</option>
                                                            <option value="Lebanon">Masters</option>
                                                            <option value="Egypt">PHD or higher</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-9">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-12">Tags and Skills 2</label>
                                                    <div class="col-lg-12">
                                                        <input name="tags" id="tags-input" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" value="Designer,Graphic Designer,Creative" />

                                                    </div>
                                                </div>
                                            </div> --}}



                                        </div>
                                    </div>
                                    <div class="col-lg-1 ">
                                        <a onclick="SearchJobs()" class="btn btn-primary" style="position:absolute; bottom:0;">Refine</a>
                                    </div>
                                </div>




                            </form>
                            <div id="jobs_div">
                                @include('candidate.jobs_view_list')
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
        $("#country").change(function (e) {
            var option = '';
            $('#companyName').prop('disabled', true);
            $.ajax({
                url: "{{ route('searchCountryCompany') }}",
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    country_name: $('#country').val(),
                },
                success: function(result){
                    $('#companyName').prop('disabled', false);
                     $('#companyName').empty();
                     $('#companyName').append(' <option selected value="">-- All --</option>');
                     result.companies.forEach(function (item, index) {
                           option = "<option value='" + item.companyname + "'>" + item.companyname + "</option>"
                           $('#companyName').append(option);
                     });
                },
                error: function(result){
                    console.log('error');
                }
            });



        });
    </script>

    <script>
        function SearchJobs(){
            $.ajax({
                url: "{{ route('searchAdvanceJob') }}",
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    industry: $('#indu stry').val(),
                    country: $('#country').val(),
                    companyName: $('#companyName').val(),

                },
                success: function(result){
                    $("#jobs_div").html(result);
                },
                error: function(result){
                    console.log('error');
                }
            });
        }
    </script>
</body>
</html>
