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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

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
                    <h1>Job</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Job</li>
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
                <div class="post-container">
                    <div class="post-content-wrapper">
                        <form action="#" class="job-post-form">
                            <div class="basic-info-input">
                                <h4><i data-feather="plus-circle"></i>Job credentials</h4>
                                <div id="job-title" class="form-group row">
                                    <label class="col-md-3 col-form-label">Job Title</label>
                                    <div class="col-md-9">
                                        <input type="text" disabled  name="title" class="form-control" placeholder="Your job title here" value="{{$user->title}}">
                                    </div>
                                </div>
                                <div id="job-summery" class="row">
                                    <label class="col-md-3 col-form-label">Job Summery</label>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="category" class="form-control">
                                                        <option value="">Select Category</option>
                                                        @foreach($bussiness_categories as $bussiness_categorie)
                                                            <option value="{{$bussiness_categorie->category}}" {{$job->category == $bussiness_categorie->category  ? 'selected' : ''}}>{{$bussiness_categorie->category}}</option>

                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
{{--                                                    <input type="text" disabled name="job_location" class="form-control" placeholder="Job Location" value="{{($user->job_location)}}">--}}
                                                    <select disabled name="job_location" class="form-control">
                                                        <option value="">Job location</option>
                                                        @foreach($locations as $location)
                                                            <option value="{{$location->name}}" {{$job->job_location == $location->name  ? 'selected' : ''}}>{{$location->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="candidate_location" class="form-control">
                                                        <option value="">Candidate location</option>
                                                        @foreach($job_candidate_locations as $job_candidate_location)
                                                            <option value="{{$job_candidate_location->location}}" {{$job->candidate_location == $job_candidate_location->location  ? 'selected' : ''}}>{{$job_candidate_location->location}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="candidate_nationality" class="form-control">
                                                        <option value="">Candidate nationality</option>
                                                        @foreach($nationality as $nationality)
                                                            <option value="{{$nationality->name}}" {{$job->candidate_nationality == $nationality->name  ? 'selected' : ''}}>{{$nationality->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="type" class="form-control">
                                                        <option value="">Job Type</option>
                                                        @foreach($job_types as $job_type)
                                                            <option value="{{$job_type->name}}" {{$job->type == $job_type->name  ? 'selected' : ''}}>{{$job_type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="career_level" class="form-control">
                                                        <option value="">Career level</option>
                                                        @foreach($job_career_levels as $job_career_level)
                                                            <option value="{{$job_career_level->name}}" {{$job->career_level == $job_career_level->name  ? 'selected' : ''}}>{{$job_career_level->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="experience" class="form-control">
                                                        <option value="">Experience (Optional)</option>
                                                        @foreach($job_experiences as $job_experience)
                                                            <option value="{{$job_experience->year}}" {{$job->experience == $job_experience->year  ? 'selected' : ''}}>{{$job_experience->year}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="salary" class="form-control">
                                                        <option value="">Salary Range</option>
                                                        @foreach($job_salary_ranges as $job_salary_range)
                                                            <option value="{{$job_salary_range->range}}" {{$job->salary == $job_salary_range->range  ? 'selected' : ''}}>{{$job_salary_range->range}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="qualification" class="form-control">
                                                        <option value="">Qualification</option>
                                                        @foreach($job_qualifications as $job_qualification)
                                                            <option value="{{$job_qualification->name}}" {{$job->qualification == $job_qualification->name  ? 'selected' : ''}}>{{$job_qualification->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select disabled name="gender" class="form-control">
                                                        <option value="">Gender</option>
                                                        @foreach($job_genders as $job_gender)
                                                            <option value="{{$job_gender->type}}" {{$job->gender == $job_gender->type  ? 'selected' : ''}}>{{$job_gender->type}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" disabled name="vacancy" class="form-control" placeholder="vacancy" value="{{($user->vacancy)}}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">Select Skills</label>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <select  disabled  name="skills[]" multiple="multiple" id="skills" class=" form-control" style="width:100% ">

                                                                @foreach($jobSkills as $skill)
                                                                    <option value="{{$skill->skill}}"

                                                                    selected>{{$skill->skill}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group datepicker">
                                                    <label>Posting Date</label>
                                                    <input type="date" disabled name="date" class="form-control" value="{{($user->date)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group datepicker">
                                                    <label>Deadline</label>

                                                    <input type="date" disabled name="date" class="form-control" value="{{($user->endingDate)}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="job-description" class="row">
                                    <label class="col-md-3 col-form-label">Job Description</label>
                                    <div class="col-md-9">
                                        <textarea disabled id="mytextarea"  class="tinymce-editor tinymce-editor-1" placeholder="Description text here">{{$user->description}}</textarea>
                                    </div>
                                </div>
                                <div id="response" class="row">
                                    <label class="col-md-3 col-form-label">Responsibilities</label>
                                    <div class="col-md-9">
                                        <textarea disabled id="mytextarea2"  class="tinymce-editor tinymce-editor-2" placeholder="Responsibilities (Optional)">{{$user->responsibilities}}</textarea>
                                    </div>
                                </div>
                                <div id="education" class="row">
                                    <label class="col-md-3 col-form-label">Education</label>
                                    <div class="col-md-9">
                                        <textarea id="mytextarea3" disabled class="tinymce-editor tinymce-editor-2" placeholder="Education (Optional)">{{$user->education}}</textarea>
                                    </div>
                                </div>

                                {{-- <div id="package" class="row">
                                    <label class="col-md-3 col-form-label">Select Package</label>
                                    <div class="col-md-9">
                                        <div class="package-select">
                                            <div class="package-select-inputs">
                                                <div class="form-group">
                                                    <input class="custom-radio" type="radio" id="radio_1" name="my-radio" value="1" checked>
                                                    <label for="radio_1">
                                                        <span class="dot"></span> <span class="package-type">Free</span> $0.00
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input class="custom-radio" type="radio" id="radio_2" name="my-radio" value="1">
                                                    <label for="radio_2">
                                                        <span class="dot"></span> <span class="package-type">Stater</span> $22.00
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input class="custom-radio" type="radio" id="radio_3" name="my-radio" value="1">
                                                    <label for="radio_3">
                                                        <span class="dot"></span> <span class="package-type">Advance</span> $44.00
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="payment-method">
                                                <a href="#" class="credit active"><i class="fas fa-credit-card"></i>Credit Card</a>
                                                <a href="#" class="paypal"><i class="fab fa-cc-paypal"></i>PayPal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                               {{-- <div class="row">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="form-group terms">
                                            <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition">
                                            <label for="radio-4">
                                                <span class="dot"></span> You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-md-3 col-form-label"></label>--}}
{{--                                    <div class="col-md-9">--}}
{{--                                        <button class="button">Post Your Job</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                    <div class="post-sidebar">
                        <h5><i data-feather="arrow-down-circle"></i>Navigate</h5>
                        <ul class="sidebar-menu">
                            <li><a href="{{route('postJobEdit', encrypt($job->id) )}}">Edit Job</a></li>
                            <li><a href="{{url('employee/manageCandidate', [encrypt(Auth::user()->id), 'job_id' => encrypt($job->id)] )}}">View Applications</a></li>
{{--                            <li><a href="#job-description">Job Descruption</a></li>--}}
{{--                            <li><a href="#response">Responsibilities</a></li>--}}
{{--                            <li><a href="#education">Education</a></li>--}}
{{--                            <li><a href="#others">Your Location</a></li>--}}
{{--                            <li><a href="#post-location">About Company</a></li>--}}
{{--                            <li><a href="#package">Select Package</a></li>--}}
                        </ul>
{{--                        <div class="signin-option">--}}
{{--                            <p>Have an Account ? Before submit job you need to sign in !</p>--}}
{{--                            <div class="buttons">--}}
{{--                                <a href="#" class="signin" data-toggle="modal" data-target="#exampleModalLong">Sign in</a>--}}
{{--                                <a href="#" class="register" data-toggle="modal" data-target="#exampleModalLong2">Register</a>--}}
{{--                            </div>--}}
{{--                            <!-- Modal -->--}}
{{--                            <div class="account-entry">--}}
{{--                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title"><i data-feather="user"></i>Login</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <form action="#">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <input type="email" placeholder="Email Address" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <input type="password" placeholder="Password" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="more-option">--}}
{{--                                                        <div class="form-check">--}}
{{--                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                                                            <label class="form-check-label" for="defaultCheck1">--}}
{{--                                                                Remember Me--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                        <a href="#">Forget Password?</a>--}}
{{--                                                    </div>--}}
{{--                                                    <button class="button primary-bg btn-block">Login</button>--}}
{{--                                                </form>--}}
{{--                                                <div class="shortcut-login">--}}
{{--                                                    <span>Or connect with</span>--}}
{{--                                                    <div class="buttons">--}}
{{--                                                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>--}}
{{--                                                        <a href="#" class="google"><i class="fab fa-google"></i>Google</a>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Don't have an account? <a href="#">Register</a></p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title"><i data-feather="edit"></i>Registration</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <div class="account-type">--}}
{{--                                                    <a href="#" class="candidate-acc active"><i data-feather="user"></i>Candidate</a>--}}
{{--                                                    <a href="#" class="employer-acc"><i data-feather="briefcase"></i>Employer</a>--}}
{{--                                                </div>--}}
{{--                                                <form action="#">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <input type="text" placeholder="Username" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <input type="email" placeholder="Email Address" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <input type="password" placeholder="Password" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="more-option terms">--}}
{{--                                                        <div class="form-check">--}}
{{--                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">--}}
{{--                                                            <label class="form-check-label" for="defaultCheck2">--}}
{{--                                                                I accept the <a href="#">terms & conditions</a>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <button class="button primary-bg btn-block">Register</button>--}}
{{--                                                </form>--}}
{{--                                                <div class="shortcut-login">--}}
{{--                                                    <span>Or connect with</span>--}}
{{--                                                    <div class="buttons">--}}
{{--                                                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>--}}
{{--                                                        <a href="#" class="google"><i class="fab fa-google"></i>Google</a>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Already have an account? <a href="#">Login</a></p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="footer-bg">
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
<script src="{{asset('asset/js/html5-simple-date-input-polyfill.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('js/map.js')}}"></script>



<script>
    $(document).ready( function () {

   $('#skills').select2();
    });
</script>

</body>
</html>
