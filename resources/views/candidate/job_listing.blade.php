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
                    <h1>Job Listing</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Job Listing</li>
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



<!-- Job Listing -->
<div class="alice-bg section-padding-bottom">
    <div class="container">
        <div class="row no-gutters">
            <div class="col">
                <div class="job-listing-container">
                    <div class="filtered-job-listing-wrapper">
                        <div class="job-view-controller-wrapper">
                            <div class="job-view-controller">
                                <div class="controller list active">
                                    <i data-feather="menu"></i>
                                </div>
                                <div class="controller grid">
                                    <i data-feather="grid"></i>
                                </div>
                                <div class="job-view-filter">
                                    <select class="selectpicker">
                                        <option value="" selected>Most Recent</option>
                                        <option value="california">Top Rated</option>
                                        <option value="las-vegas">Most Popular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="showing-number">
                                <span>Showing 1–12 of 28 Jobs</span>
                            </div>
                        </div>
                        <div class="job-filter-result">
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-8.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Restaurant Team Member - Crew </a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span>
                                            <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-9.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Nutrition Advisor</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-10.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">UI Designer</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                                            <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-3.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Land Development Marketer</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington</a></span>
                                            <span class="job-type freelance"><a href="#"><i data-feather="clock"></i>Freelance</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-10.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">UI Designer</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                                            <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-3.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Land Development Marketer</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington</a></span>
                                            <span class="job-type freelance"><a href="#"><i data-feather="clock"></i>Freelance</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-1.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Designer Required</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-2.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Project Manager</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                                            <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-8.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Restaurant Team Member - Crew </a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Las Vegas</a></span>
                                            <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-9.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Nutrition Advisor</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-1.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Designer Required</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{asset('images/job/company-logo-2.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="content">
                                        <h4><a href="job-details.php">Project Manager</a></h4>
                                        <div class="info">
                                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                                            <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                                        </div>
                                    </div>
                                    <div class="more">
                                        <div class="buttons">
                                            <a href="#" class="button">Apply Now</a>
                                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                                        </div>
                                        <p class="deadline">Deadline: Oct 31, 2018</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-list text-center">
                            <nav class="navigation pagination">
                                <div class="nav-links">
                                    <a class="prev page-numbers" href="#"><i class="fas fa-angle-left"></i></a>
                                    <a class="page-numbers" href="#">1</a>
                                    <span aria-current="page" class="page-numbers current">2</span>
                                    <a class="page-numbers" href="#">3</a>
                                    <a class="page-numbers" href="#">4</a>
                                    <a class="next page-numbers" href="#"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="job-filter-wrapper">
                        <div class="selected-options same-pad">
                            <div class="selection-title">
                                <h4>You Selected</h4>
                                <a href="#">Clear All</a>
                            </div>
                            <ul class="filtered-options">
                            </ul>
                        </div>
                        <div class="job-filter-dropdown same-pad category">
                            <select class="selectpicker">
                                <option value="" selected>Category</option>
                                <option value="california">Accounting / Finance</option>
                                <option value="california">Education</option>
                                <option value="california">Design &amp; Creative</option>
                                <option value="california">Health Care</option>
                                <option value="california">Engineer &amp; Architects</option>
                                <option value="california">Marketing &amp; Sales</option>
                                <option value="california">Garments / Textile</option>
                                <option value="california">Customer Support</option>
                                <option value="california">Digital Media</option>
                                <option value="california">Telecommunication</option>
                            </select>
                        </div>
                        <div class="job-filter-dropdown same-pad location">
                            <select class="selectpicker">
                                <option value="" selected>Location</option>
                                <option value="california">Chicago</option>
                                <option value="california">New York City</option>
                                <option value="california">San Francisco</option>
                                <option value="california">Washington</option>
                                <option value="california">Boston</option>
                                <option value="california">Los Angeles</option>
                                <option value="california">Seattle</option>
                                <option value="california">Las Vegas</option>
                                <option value="california">San Diego</option>
                            </select>
                        </div>
                        <div data-id="job-type" class="job-filter job-type same-pad">
                            <h4 class="option-title">Job Type</h4>
                            <ul>
                                <li class="full-time"><i data-feather="clock"></i><a href="#" data-attr="Full Time">Full Time</a></li>
                                <li class="part-time"><i data-feather="clock"></i><a href="#" data-attr="Part Time">Part Time</a></li>
                                <li class="freelance"><i data-feather="clock"></i><a href="#" data-attr="Freelance">Freelance</a></li>
                                <li class="temporary"><i data-feather="clock"></i><a href="#" data-attr="Temporary">Temporary</a></li>
                            </ul>
                        </div>
                        <div data-id="experience" class="job-filter experience same-pad">
                            <h4 class="option-title">Experience</h4>
                            <ul>
                                <li><a href="#" data-attr="Fresh">Fresh</a></li>
                                <li><a href="#" data-attr="Less than 1 year">Less than 1 year</a></li>
                                <li><a href="#" data-attr="2 Year">2 Year</a></li>
                                <li><a href="#" data-attr="3 Year">3 Year</a></li>
                                <li><a href="#" data-attr="4 Year">4 Year</a></li>
                                <li><a href="#" data-attr="5 Year">5 Year</a></li>
                                <li><a href="#" data-attr="Avobe 5 Years">Avobe 5 Years</a></li>
                            </ul>
                        </div>
                        <div class="job-filter same-pad">
                            <h4 class="option-title">Salary Range</h4>
                            <div class="price-range-slider">
                                <div class="nstSlider" data-range_min="0" data-range_max="10000"
                                     data-cur_min="0"    data-cur_max="6130">
                                    <div class="bar"></div>
                                    <div class="leftGrip"></div>
                                    <div class="rightGrip"></div>
                                    <div class="grip-label">
                                        <span class="leftLabel"></span>
                                        <span class="rightLabel"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="post" class="job-filter post same-pad">
                            <h4 class="option-title">Date Posted</h4>
                            <ul>
                                <li><a href="#" data-attr="Last hour">Last hour</a></li>
                                <li><a href="#" data-attr="Last 24 hour">Last 24 hour</a></li>
                                <li><a href="#" data-attr="Last 7 days">Last 7 days</a></li>
                                <li><a href="#" data-attr="Last 14 days">Last 14 days</a></li>
                                <li><a href="#" data-attr="Last 30 days">Last 30 days</a></li>
                            </ul>
                        </div>
                        <div data-id="gender" class="job-filter same-pad gender">
                            <h4 class="option-title">Gender</h4>
                            <ul>
                                <li><a href="#" data-attr="Male">Male</a></li>
                                <li><a href="#" data-attr="Female">Female</a></li>
                            </ul>
                        </div>
                        <div data-id="qualification" class="job-filter qualification same-pad">
                            <h4 class="option-title">Qualification</h4>
                            <ul>
                                <li><a href="#" data-attr="Matriculation">Matriculation</a></li>
                                <li><a href="#" data-attr="Intermidiate">Intermidiate</a></li>
                                <li><a href="#" data-attr="Gradute">Gradute</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Job Listing End -->

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
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/feather.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nstSlider.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/visible.js')}}"></script>
<script src="{{asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset('assets/js/chart.js')}}"></script>
<script src="{{asset('assets/js/plyr.js')}}"></script>
<script src="{{asset('assets/js/tinymce.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('js/map.js')}}"></script>
</body>
</html>
