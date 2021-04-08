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
                    <h1>Candidates Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Candidates Dashboard</li>
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
                        <form action="{{route('edit_profile', $user->id)}}" method="post" class="dashboard-form">
                            @csrf
                            <div class="dashboard-section upload-profile-photo">
                                <div class="update-photo">
                                    <img class="image" src="{{asset('dashboard/images/user-1.jpg')}}" alt="">
                                </div>
                                <div class="file-upload">
                                    <input type="file" class="file-input">Change Avatar
                                </div>
                            </div>
                            <div class="dashboard-section basic-info-input">


                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif



                                <h4><i data-feather="user-check"></i>Basic Info</h4>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="full_name" class="form-control" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" disabled class="form-control" placeholder="username" value="{{ Auth::user()->name }} ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" disabled class="form-control" placeholder="email@example.com" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="tel" maxlength="11" minlength="11" name="phoneNo" class="form-control" pattern="[0-9]{4}[0-9]{7}" placeholder="03001234567" >
                                        {{--                                        <input type="tel" maxlength="11" minlength="11"  name="phoneNo" placeholder="03001234567" pattern="[0-9]{4}[0-9]{7}" value="">--}}
                                        <small>Format: 03151234567</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" placeholder="Washington D.C" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Indestry Expertise</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="industry_expertise" class="form-control" placeholder="UI & UX Designer" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">About Me</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="about_me" placeholder="Introduce Yourself"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-section basic-info-input">
                                <h4><i data-feather="lock"></i>Change Password</h4>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Retype Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="new_password_confirmation" class="form-control" placeholder="Retype Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button class="button">Save Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                    <p class="progress-on">Profile</p>
                                </div>
                                <div class="progress-body">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$profilePercentage}}" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                    </div>
                                    <p class="progress-to">{{$profilePercentage}}%</p>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><i class="fas fa-home"></i><a href="{{url('candidate/dashboard')}}">Dashboard</a></li>
                                <li class="active"><i class="fas fa-user"></i><a href="{{url('candidate/edit_profile', Auth::user()->id)}}">Edit Profile</a></li>
                                <!--                    <li><i class="fas fa-file-alt"></i><a href="resume.php">Resume</a></li>-->
                                <li><i class="fas fa-edit"></i><a href="{{url('candidate/edit_resume', Auth::user()->id)}}">Edit Resume</a></li>
                                <li><i class="fas fa-heart"></i><a href="bookmarks.php">Bookmarked</a></li>
                                <li><i class="fas fa-check-square"></i><a href="applied-jobs.php">Applied Job</a></li>
                                <li><i class="fas fa-search"></i><a href="search.php">search</a></li>
                                <!--                    <li><i class="fas fa-comment"></i><a href="support-message_NO_NEED.php">Message</a></li> -->
                                <li ><i class="fas fa-search"></i><a href="{{route('accountStatistics', Auth::user()->id)}}">Account Statistics</a></li>
                            
                            </ul>
                            <ul class="delete">
                                <li><i class="fas fa-power-off"></i><a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a></li>
                                {{-- <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Profile</a></li> --}}
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
                                                    <button class="">Cancel</button>
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
<!-- Call to Action End -->

<!-- Footer -->
<footer class="footer-bg">
    <div class="footer-top border-bottom section-padding-top padding-bottom-40">
        <div class="container">
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
            </div>
        </div>
    </div>
    <div class="footer-widget-wrapper padding-bottom-60 padding-top-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget footer-shortcut-link">
                        <h4>Information</h4>
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget footer-shortcut-link">
                        <h4>Job Seekers</h4>
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#">Create Account</a></li>
                                <li><a href="#">Career Counseling</a></li>
                                <li><a href="#">My PATH</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Video Guides</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget footer-shortcut-link">
                        <h4>Employers</h4>
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#">Create Account</a></li>
                                <li><a href="#">Products/Service</a></li>
                                <li><a href="#">Post a Job</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-sm-6">
                    <div class="footer-widget footer-newsletter">
                        <h4>Newsletter</h4>
                        <p>Get e-mail updates about our latest news and Special offers.</p>
                        <form action="#" class="newsletter-form form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email address...">
                            </div>
                            <button class="btn button primary-bg">Submit<i class="fas fa-caret-right"></i></button>
                            <p class="newsletter-error">0 - Please enter a value</p>
                            <p class="newsletter-success">Thank you for subscribing!</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
