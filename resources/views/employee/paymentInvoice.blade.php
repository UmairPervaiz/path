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
                    <h1>Invoice</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
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

                        <div class="about-details details-section dashboard-section">
                            <h4><i data-feather="align-left"></i>Invoice Information</h4>
                            <br>
                            <div class="information-and-contact">
                                <div class="information">
                                    <h4>Package Detail</h4>
                                    <p>You have purchased "{{ $invoice->package_name }}" on "{{ $invoice->created_at }}".</p>
                                    <br>
                                    <ul>
                                        <li><span>Invoice #:</span> {{ $invoice->invoice_id }}</li>
                                        <li><span>Order #:</span> {{ $invoice->order_id }}</li>
                                        <li><span>Buyer Name:</span> {{ $invoice->customer_name }}</li>
                                        <li><span>Buyer Email:</span> {{ $invoice->customer_email }}</li>
                                        <li><span>Buyer Phone:</span> {{ $invoice->customer_phone }}</li>
                                        <li><span>Payment Method:</span> {{ $invoice->payment_gateway }}</li>
                                        <li><span>Paid in Currency:</span> {{ $invoice->currency }}</li>
                                        <li><span>Paid Amount:</span> {{ $invoice->amount_paid }}</li>
                                        <li><span>Job Posting Limit:</span> {{ $invoice->jobs_limit }}</li>
                                        <li><span>Used Posting Limit:</span> {{ $invoice->jobs_count }}</li>
                                    </ul>
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="dashboard-sidebar">
                        <div class="user-info">
                            <div class="thumb">
                                @if(Auth::user()->avatar !=null)
                                    <img class="img-fluid" src="{{ asset('images/'.Auth::user()->avatar) }}" alt="">

                                    @else
                                <img src="{{asset('dashboard/images/user-1.jpg')}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="user-body">
                                <h5>{{Auth::user()->name}}</h5>
                                <span>{{Auth::user()->email}}</span>
                            </div>
                        </div>
                        <div class="profile-progress">
                            <div class="progress-item">
                                <div class="progress-head">
                                    {{-- <p class="progress-on">Profile</p> --}}
                                </div>
                                <div class="progress-body">
                                    {{-- <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$profilePercentage}}" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                    </div>
                                    <p class="progress-to">{{$profilePercentage}}%</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><i class="fas fa-home"></i><a href="{{url('employee/dashboard',encrypt(Auth::user()->id))}}">Dashboard</a></li>
                                    <li><i class="fas fa-user"></i><a href="{{url('employee/editprofile', encrypt(Auth::user()->id))}}">Edit Profile</a></li>
                                <li><i class="fas fa-briefcase"></i><a href="{{url('employee/managejob', encrypt(Auth::user()->id))}}">Manage Jobs</a></li>
{{--                                <li><i class="fas fa-users"></i><a href="{{url('employee/manageCandidate', encrypt(Auth::user()->id))}}">Manage Candidates</a></li>--}}
                                {{--  <li><i class="fas fa-heart"></i><a href="{{url('employee/shortListedResume', encrypt(Auth::user()->id))}}">Shortlisted Resumes</a></li>  --}}
                                <li><i class="fas fa-plus-square"></i><a href="{{url('employee/postjob', encrypt(Auth::user()->id))}}">Post New Job</a></li>
                                {{--  <li><i class="fas fa-comment"></i><a href="{{url('employee/message', encrypt(Auth::user()->id))}}">Message</a></li>  --}}
                                <li class="active"><i class="fas fa-calculator"></i><a href="{{url('employee/pricing', encrypt(Auth::user()->id))}}">Pricing Plans</a></li>
                                {{-- <li><i class="fas fa-calculator"></i><a href="{{url('employee/pricingPlaneEditPage', encrypt(Auth::user()->id))}}">Pricing Plans Edit Page</a></li> --}}
                                {{-- <li><i class="fas fa-calculator"></i><a href="{{url('employee/managePricing', encrypt(Auth::user()->id))}}">Pricing Plans Edit View Page</a></li> --}}
                            </ul>
                            <ul class="delete">
                                {{--  <li><i class="fas fa-power-off"></i><a href="#">Logout</a></li>  --}}
                                <li><i class="fas fa-power-off"></i><a href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>
                                {{--  <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Profile</a></li>  --}}
                            </ul>
                            <!-- Modal -->
                            <div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4><i data-feather="trash-2"></i>Delete Account</h4>
                                            <p>Are you sure! You want to delete your profile. This can't be undone!</p>
                                            <form action="#">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Enter password">
                                                </div>
                                                <div class="buttons">
                                                    <button class="delete-button">Save Update</button>
                                                    <button class="" data-dismiss="modal">Cancel</button>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" checked="">
                                                    <label class="form-check-label">You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="call-to-action-bg padding-top-90 padding-bottom-90">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="call-to-action-2">
                    <div class="call-to-action-content">
                        <h2>For Find Your Dream Job or Candidate</h2>
                        <p>Add resume or post a job. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.</p>
                    </div>
                    <div class="call-to-action-button">
                        <a href="add-resume.php" class="button">Add Resume</a>
                        <span>Or</span>
                        <a href="post-job.php" class="button">Post A Job</a>
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

