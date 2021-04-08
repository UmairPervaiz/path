<?php $rootPath ="../";?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>PATH</title>

    <!-- Bootstrap CSS -->
    @include('common.libraries')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/html5-simple-date-input-polyfill.css')}}" />
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
                    <h1>Post Job</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post Job</li>
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
                        <form action="{{route('postjob', encrypt($user->id))}}" method="post" class="dashboard-form job-post-form">
                            @csrf
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


                                <h4><i data-feather="user-check"></i>Post A Job</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Job Title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control" placeholder="Your job title here" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Job Summery</label>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="category" class="form-control" required>
                                                        <option value="">Select Category</option>
                                                        @foreach($bussiness_categories as $bussiness_categorie)
                                                        <option value="{{$bussiness_categorie->category}}">{{$bussiness_categorie->category}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
{{--                                                    <input type="text" name="job_location" class="form-control" placeholder="Job Location" required >--}}
                                                    <select name="job_location" class="form-control" required>
                                                        <option value="">Job location</option>
                                                        @foreach($locations as $location)
                                                            <option value="{{$location->name}}">{{$location->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="candidate_location" class="form-control" required>
                                                        <option value="">Candidate location</option>
                                                        @foreach($job_candidate_locations as $job_candidate_location)
                                                            <option value="{{$job_candidate_location->location}}">{{$job_candidate_location->location}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="candidate_nationality" class="form-control" required>
                                                        <option value="">Candidate nationality</option>
                                                        @foreach($nationality as $nationality)
                                                            <option value="{{$nationality->name}}">{{$nationality->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="type" class="form-control" required>
                                                        <option value="">Job Type</option>
                                                        @foreach($job_types as $job_type)
                                                            <option value="{{$job_type->name}}">{{$job_type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="career_level" class="form-control" required>
                                                        <option value="">Career level</option>
                                                        @foreach($job_career_levels as $job_career_level)
                                                            <option value="{{$job_career_level->name}}">{{$job_career_level->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="experience" class="form-control" required>
                                                        <option value="">Experience (Optional)</option>
                                                        @foreach($job_experiences as $job_experience)
                                                        <option value="{{$job_experience->year}}">{{$job_experience->year}}</option>
                                                            @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="salary" class="form-control" required>
                                                        <option value="">Salary Range</option>
                                                        @foreach($job_salary_ranges as $job_salary_range)
                                                            <option value="{{$job_salary_range->range}}">{{$job_salary_range->range}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="qualification" class="form-control" required>
                                                        <option value="">Qualification</option>
                                                        @foreach($job_qualifications as $job_qualification)
                                                            <option value="{{$job_qualification->name}}">{{$job_qualification->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="gender" class="form-control" required>
                                                        <option value="">Gender</option>
                                                        @foreach($job_genders as $job_gender)
                                                            <option value="{{$job_gender->type}}">{{$job_gender->type}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="vacancy" class="form-control" placeholder="Vacancy" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12" >
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">Select Skills</label>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <select  name="skills[]" multiple="multiple" id="skills" class=" form-control" style="width:100% ">

                                                                @foreach($skills as $skill)
                                                                    <option value="{{$skill->name}}"

                                                                    >{{$skill->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Type Skills</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">

                                                            <input type="text" name="skill_name" class="form-control"  placeholder="Add comma if Skills are more than one" value="">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group datepicker">
                                                    <label>Posting Date</label>
                                                    <input type="date" name="date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group datepicker">
                                                    <label>Deadline</label>
                                                    <input type="date" name="endingDate"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-md-3 col-form-label">Field of Expertise</label>--}}
{{--                                        <div class="col-md-9">--}}
{{--                                            @foreach($category as $category)--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    --}}{{--                                                    @foreach($category_array as $category_array)--}}
{{--                                                    <input @if (in_array($category->name , $category_array)) checked @endif  type="checkbox" id="{{$category->id}}"  name ="category[]" value="{{$category->name}}">--}}
{{--                                                    <input @if (in_array($category->name , $category_array)) checked @endif  type="checkbox" id="{{$category->id}}"  name ="category[]" value="{{$category->name}}">--}}
{{--                                                    <label >{{$category->name}}</label>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                            <input type="text" name="title" class="form-control" placeholder="Your job title here" required>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


                                <div class="row">
                                    <label class="col-md-3 col-form-label">Job Description</label>
                                    <div class="col-md-9">
                                        <textarea id="mytextarea" name="description" class="tinymce-editor tinymce-editor-1" placeholder="Description text here"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Responsibilities</label>
                                    <div class="col-md-9">
                                        <textarea id="mytextarea2" name="responsibilities" class="tinymce-editor tinymce-editor-2" placeholder="Responsibilities (Optional)" ></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Education</label>
                                    <div class="col-md-9">
                                        <textarea id="mytextarea3" name="education" class="tinymce-editor tinymce-editor-2" placeholder="Education (Optional)"></textarea>
                                    </div>
                                </div>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-md-3 col-form-label">Your Location</label>--}}
{{--                                    <div class="col-md-9">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <select name="country" class="form-control">--}}
{{--                                                        <option>Country</option>--}}
{{--                                                        <option>USA</option>--}}
{{--                                                        <option>United Kindom</option>--}}
{{--                                                        <option>Spain</option>--}}
{{--                                                        <option>France</option>--}}
{{--                                                        <option>Germany</option>--}}
{{--                                                    </select>--}}
{{--                                                    <i class="fa fa-caret-down"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <select name="city" class="form-control" id="exampleFormControlSelect11">--}}
{{--                                                        <option>City</option>--}}
{{--                                                        <option>New Work</option>--}}
{{--                                                        <option>Washington D.C</option>--}}
{{--                                                        <option>California</option>--}}
{{--                                                        <option>Las Vegas</option>--}}
{{--                                                    </select>--}}
{{--                                                    <i class="fa fa-caret-down"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="text" name="zip_code" maxlength="5" minlength="5" class="form-control" placeholder="Zip Code" >--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="text" name="your_location" class="form-control" placeholder="Your Location" >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="set-location">--}}
{{--                                                    <h5>Pin Location</h5>--}}
{{--                                                    <div id="map-area" class="contact-location">--}}
{{--                                                        <div class="cp-map" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <label class="col-md-3 col-form-label">About Company</label>--}}
{{--                                    <div class="col-md-9">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="text" name="companyName" class="form-control" placeholder="Company Name">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="text" name="webAddress" class="form-control" placeholder="Web Address">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <textarea class="form-control" name="companyProfile" placeholder="Company Profile"></textarea>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                {{-- <div class="row">
                                    <label class="col-md-3 col-form-label">Select Package</label>
                                    <div class="col-md-9">
                                        <div class="package-select">
                                            <div class="package-select-inputs">
                                                <div class="form-group">
                                                    <input class="custom-radio" type="radio" id="radio_1" name="selectPackage" value="1" checked>
                                                    <label for="radio_1">
                                                        <span class="dot"></span> <span class="package-type">Free</span> $0.00
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input class="custom-radio" type="radio" id="radio_2" name="selectPackage" value="1">
                                                    <label for="radio_2">
                                                        <span class="dot"></span> <span class="package-type">Stater</span> $22.00
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input class="custom-radio" type="radio" id="radio_3" name="selectPackage" value="1">
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
                                <div class="row">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="form-group terms">
{{--                                            <input class="custom-radio" type="checkbox" id="radio-4" name="agreement">--}}
                                            <input class="form-check-input @error('agreement') is-invalid @enderror" name="agreement" type="checkbox" id="AgreeTerms" required>

                                            <label for="radio-4">
                                                <span class="dot"></span> You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                                            </label>
                                                        @error('agreement')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ 'The agreeterms field must be checked' }}</strong>
                                                         </span>
                                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <button class="button">Post Your Job</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<script>
    // $(".Other").change(function () {
    //     //check if its checked. If checked move inside and check for others value
    //     if (this.checked && this.value === "Other") {
    //         //add a text box next to it
    //         $(this).next("label").after("<input id='other-text' placeholder='Enter subject' type='text'/>")
    //     } else {
    //         //remove if unchecked
    //         $("#other-text").remove();
    //     }
    // });

    $(document).ready(function(){
        $("input[type='checkbox']").change(function(){
            if($(this).val()==="Other")
            {
                $("#otherAnswer").show();
            }
            else
            {
                $("#otherAnswer").hide();
            }
        });
    });
</script>

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
<script src="{{asset('dashboard/js/dashboard.js')}}"></script>
<script src="{{asset('dashboard/js/datePicker.js')}}"></script>
<script src="{{asset('dashboard/js/upload-input.js')}}"></script>
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
