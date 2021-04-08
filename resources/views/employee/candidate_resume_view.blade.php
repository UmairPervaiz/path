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
{{--                    <h1>Edit Resume</h1>--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">Edit Resume</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
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
                        <div class="logo-area" style="display: flex">
                            <a href="#"><img src="{{asset('asset/images/logo-2.png')}}" alt=""></a>
                        </div>
                        <h3 style="color: 	#cc494a; text-align: center ">CV</h3>

                        <div class="about-details details-section dashboard-section">
                            <h4><i data-feather="align-left"></i>About Me</h4>
                            <p>{{ old('about', isset($candidate_abouts) ? $candidate_abouts->about : '' )}}</p>
                            <div class="information-and-contact">
                                @if($candidate_abouts != '')
                                    <div class="information" style="background: #FFFFFF	">
                                        <h4>Information</h4>
                                        <ul>
                                            <li><span>Category:</span> {{old('category', isset($candidate_abouts) ? $candidate_abouts->category : '')}}</li>
                                            <li><span>Location:</span> {{ old('location', isset($candidate_abouts) ? $candidate_abouts->location : '')}}</li>
                                            <li><span>Career Level:</span> {{old('status', isset($candidate_abouts) ? $candidate_abouts->career_level : '')}}</li>
                                            <li><span>Experience:</span> {{old('experience', isset($candidate_abouts) ? $candidate_abouts->experience : '') }}</li>
                                            <li><span>Salary:</span> {{old('salary', isset($candidate_abouts) ? $candidate_abouts->salary : '')}}</li>
                                            <li><span>Gender:</span> {{old('gender', isset($candidate_abouts) ? $candidate_abouts->gender : '')}}</li>
                                            <li><span>Age:</span> {{old('age', isset($candidate_abouts) ? $candidate_abouts->age : '')}}</li>
                                            <li><span>Qualification:</span> {{old('qualification', isset($candidate_abouts) ? $candidate_abouts->qualification : '')}}</li>
                                        </ul>
                                    </div>
                                @endif
                            </div>


                            <div class="modal fade" id="modal-about-me" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="align-left"></i>About Me</h4>
                                            </div>

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="content">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="#" method="post">
                            @csrf
                            <div class="skill-and-profile dashboard-section">
                                <div class="skill">
                                    <label>Skills:</label>
                                        @foreach ($candidateSkills as $item)
                                            <a href="#">{{$item->skill }}</a>
                                        @endforeach
                                </div>

                            </div>
                        </form>

                        <div class="edication-background details-section dashboard-section" style="margin-top: 20px">
                            <h4><i data-feather="book"></i>Education Background</h4>
                            <br>

                            @foreach ($candidateEducations as $item)
                                <div class="education-label">
                                    <span class="study-year">{{$item->period}}</span>
                                    <h5>{{$item->title}}<span>{{$item->institution}}</span></h5>
                                    <p>{{$item->description}}</p>
                                </div>
                            @endforeach

                        </div>

                        <div class="experience dashboard-section details-section" style="margin-top: 20px">
                            <h4><i data-feather="briefcase"></i>Work Experiance</h4>
                            <br>
                            @foreach ($candidateExperiences as $item)
                                <div class="experience-section">
                                    <span class="service-year">Starting Date: {{ \Carbon\Carbon::parse($item->starting_date)->format('l, M d, Y') }}</span><br>
                                    <span class="service-year">Ending Date: {{ \Carbon\Carbon::parse($item->ending_date)->format('l, M d, Y') }}</span>
                                    <h5>{{$item->title}}<span> {{$item->company}}</span></h5>
                                    <p>{{$item->description}}</p>
                                </div>
                            @endforeach


                        </div>
                        <div class="professonal-skill dashboard-section details-section" style="margin-top: 20px">
                            <h4><i data-feather="feather"></i>Professional Skill</h4>
                                <br>
                            @foreach ($candidateProfessionalSkills as $item)
                                <p>{{$item->description}}</p>
                                <div class="progress-group">
                                    <div class="progress-item">
                                        <div class="progress-head">
                                            <p class="progress-on">{{$item->skill_name}}</p>
                                        </div>
                                        <div class="progress-body">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                            </div>
                                            <p class="progress-to">{{$item->percentage}}%</p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach

                        </div>
                        <div class="special-qualification dashboard-section details-section" style="margin-top: 20px">
                            <h4><i data-feather="gift"></i>Special Qualification</h4>
                            <br>
                            <ul>
                                @foreach ($candidateSpecialQualifications as $item)
                                    <li>{{$item->qualification_name}}</li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="portfolio dashboard-section details-section">
                            <h4><i data-feather="gift"></i>Portfolio</h4>
                            <br>
                            <div class="portfolio-slider owl-carousel">
                                @foreach ($candidatePortfolios as $item)
                                    <div class="portfolio-item">
                                        @if($item->avatar != null)
                                            <img src="{{ asset('images/'.$item->avatar) }}" class="img-fluid" alt="">
                                        @else
                                            <img src="" class="img-fluid" alt="">
                                        @endif
                                        <div class="overlay">
                                            <a href="{{ asset('images/'.$item->avatar) }}" target="_blank"><i data-feather="eye"></i></a>
                                            <a href="{{$item->link}}" target="_blank"><i data-feather="link"></i></a>
                                            {{-- <a href="{{route('candidatePortfolioDelete', $item->id)}}" ><i data-feather="trash"></i></a> --}}

                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <br>

                        <div class="personal-information dashboard-section  details-section" style="margin-top: 20px">
                            <h4><i data-feather="user-plus"></i>Personal Deatils</h4>
                            <ul>
                                <li><span>First Name:</span> {{old('firstName', isset($candidate_personal_informations) ? $candidate_personal_informations->firstName : '')}}</li>
                                <li><span>Last Name:</span> {{old('lastName', isset($candidate_personal_informations) ? $candidate_personal_informations->lastName : '')}}</li>
                                    <li><span>Full Name:</span> {{old('full_name', isset($candidate_personal_informations) ? $candidate_personal_informations->full_name : '') }}</li>
                                    <li><span>Father's Name:</span> {{old('father_name', isset($candidate_personal_informations) ? $candidate_personal_informations->father_name : '')}}</li>
                                    <li><span>Mother's Name:</span> {{old('mother_name', isset($candidate_personal_informations) ? $candidate_personal_informations->mother_name : '')}}</li>
                                    <li><span>Date of Birth:</span> {{old('DOB', isset($candidate_personal_informations) ? $candidate_personal_informations->DOB : '') }}</li>
                                    <li><span>Nationality:</span> {{old('nationality', isset($candidate_personal_informations) ? $candidate_personal_informations->nationality : '') }} </li>
                                    <li><span>Gender:</span> {{old('gender', isset($candidate_personal_informations) ? $candidate_personal_informations->gender : '')}} </li>
                                <li><span>Marital Status:</span> {{old('maritalStatus', isset($candidate_personal_informations) ? $candidate_personal_informations->maritalStatus : '')}} </li>
                                <li><span>Dependents:</span> {{old('dependents', isset($candidate_personal_informations) ? $candidate_personal_informations->dependents : '')}} </li>
                                    <li><span>Age:</span> {{old('age', isset($candidate_personal_informations) ? $candidate_personal_informations->age : '') }}</li>
                                    <li><span>Address:</span> {{old('address', isset($candidate_personal_informations) ? $candidate_personal_informations->address : '')}}</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
{{--<div class="call-to-action-bg padding-top-90 padding-bottom-90">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="call-to-action-2">--}}
{{--                    <div class="call-to-action-content">--}}
{{--                        <h2>For Find Your Dream Job or Candidate</h2>--}}
{{--                        <p>Add resume or post a job. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.</p>--}}
{{--                    </div>--}}
{{--                    <div class="call-to-action-button">--}}
{{--                        <a href="add-resume.php" class="button">Add Resume</a>--}}
{{--                        <span>Or</span>--}}
{{--                        <a href="post-job.php" class="button">Post A Job</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Call to Action End -->--}}

{{--<!-- Footer -->--}}
{{--<footer class="footer-bg">--}}
{{--    <div class="footer-top border-bottom section-padding-top padding-bottom-40">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="footer-logo">--}}
{{--                        <a href="#">--}}
{{--                            <img src="{{asset('asset/images/footer-logo.png')}}" class="img-fluid" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="footer-social">--}}
{{--                        <ul class="social-icons">--}}
{{--                            <li><a href="#"><i data-feather="facebook"></i></a></li>--}}
{{--                            <li><a href="#"><i data-feather="twitter"></i></a></li>--}}
{{--                            <li><a href="#"><i data-feather="linkedin"></i></a></li>--}}
{{--                            <li><a href="#"><i data-feather="instagram"></i></a></li>--}}
{{--                            <li><a href="#"><i data-feather="youtube"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="footer-widget-wrapper padding-bottom-60 padding-top-80">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-2 col-sm-6">--}}
{{--                    <div class="footer-widget footer-shortcut-link">--}}
{{--                        <h4>Information</h4>--}}
{{--                        <div class="widget-inner">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">About Us</a></li>--}}
{{--                                <li><a href="#">Contact Us</a></li>--}}
{{--                                <li><a href="#">Privacy Policy</a></li>--}}
{{--                                <li><a href="#">Terms &amp; Conditions</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2 col-sm-6">--}}
{{--                    <div class="footer-widget footer-shortcut-link">--}}
{{--                        <h4>Job Seekers</h4>--}}
{{--                        <div class="widget-inner">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Create Account</a></li>--}}
{{--                                <li><a href="#">Career Counseling</a></li>--}}
{{--                                <li><a href="#">My PATH</a></li>--}}
{{--                                <li><a href="#">FAQ</a></li>--}}
{{--                                <li><a href="#">Video Guides</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2 col-sm-6">--}}
{{--                    <div class="footer-widget footer-shortcut-link">--}}
{{--                        <h4>Employers</h4>--}}
{{--                        <div class="widget-inner">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Create Account</a></li>--}}
{{--                                <li><a href="#">Products/Service</a></li>--}}
{{--                                <li><a href="#">Post a Job</a></li>--}}
{{--                                <li><a href="#">FAQ</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-5 offset-lg-1 col-sm-6">--}}
{{--                    <div class="footer-widget footer-newsletter">--}}
{{--                        <h4>Newsletter</h4>--}}
{{--                        <p>Get e-mail updates about our latest news and Special offers.</p>--}}
{{--                        <form action="#" class="newsletter-form form-inline">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" class="form-control" placeholder="Email address...">--}}
{{--                            </div>--}}
{{--                            <button class="btn button primary-bg">Submit<i class="fas fa-caret-right"></i></button>--}}
{{--                            <p class="newsletter-error">0 - Please enter a value</p>--}}
{{--                            <p class="newsletter-success">Thank you for subscribing!</p>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="footer-bottom-area">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="footer-bottom border-top">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-4 col-lg-5 order-lg-2">--}}
{{--                                <div class="footer-app-download">--}}
{{--                                    <a href="#" class="apple-app">Apple Store</a>--}}
{{--                                    <a href="#" class="android-app">Google Play</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-4 col-lg-4 order-lg-1">--}}
{{--                                <p class="copyright-text">Copyright <a href="#">PATH</a> 2018, All right reserved</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-4 col-lg-3 order-lg-3">--}}
{{--                                <div class="back-to-top">--}}
{{--                                    <a href="#">Back to top<i class="fas fa-angle-up"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
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

