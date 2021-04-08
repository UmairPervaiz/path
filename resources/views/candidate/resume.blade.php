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
                    <h1>Resume</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Resume</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-form">
                    <form action="#">
                        <input type="text" placeholder="Enter Keywords"/>
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

                        <div class="skill-and-profile dashboard-section">
                            <div class="skill">
                                <label>Skills:</label>
                                <a href="#">Design</a>
                                <a href="#">Illustration</a>
                                <a href="#">iOS</a>
                            </div>

                        </div>
                        <div class="about-details details-section dashboard-section">
                            <h4><i data-feather="align-left"></i>About Me</h4>
                            <p>Combined with a handful of model sentence structures, to generate lorem Ipsum which  It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including.</p>
                            <p>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable </p>
                            <div class="information-and-contact">
                                <div class="information">
                                    <h4>Information</h4>
                                    <ul>
                                        <li><span>Category:</span> Design & Creative</li>
                                        <li><span>Location:</span> Los Angeles</li>
                                        <li><span>Status:</span> Full-time</li>
                                        <li><span>Experience:</span> 3 year(s)</li>
                                        <li><span>Salary:</span> $32k - $36k</li>
                                        <li><span>Gender:</span> Male</li>
                                        <li><span>Age:</span> 24 Year(s)</li>
                                        <li><span>Qualification:</span> Gradute</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="edication-background details-section dashboard-section">
                            <h4><i data-feather="book"></i>Education Background</h4>
                            <div class="education-label">
                                <span class="study-year">2018 - Present</span>
                                <h5>Masters in Software Engineering<span>@ Engineering University</span></h5>
                                <p>Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage</p>
                            </div>
                            <div class="education-label">
                                <span class="study-year">2014 - 2018</span>
                                <h5>Diploma in Graphics Design<span>@ Graphic Arts Institute</span></h5>
                                <p>Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage</p>
                            </div>
                            <div class="education-label">
                                <span class="study-year">2008 - 2014</span>
                                <h5>Secondary School Certificate<span>@  Engineering High School</span></h5>
                                <p>Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage</p>
                            </div>
                        </div>
                        <div class="experience dashboard-section details-section">
                            <h4><i data-feather="briefcase"></i>Work Experiance</h4>
                            <div class="experience-section">
                                <span class="service-year">2016 - Present</span>
                                <h5>Lead UI/UX Designer<span>@ Codepassengers LTD</span></h5>
                                <p>Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage</p>
                            </div>
                            <div class="experience-section">
                                <span class="service-year">2012 - 2016</span>
                                <h5>Former Graphic Designer<span>@ Graphicreeeo CO</span></h5>
                                <p>Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage</p>
                            </div>
                        </div>
                        <div class="professonal-skill dashboard-section details-section">
                            <h4><i data-feather="feather"></i>Professional Skill</h4>
                            <p>Combined with a handful of model sentence structures, to generate lorem Ipsum which  It has survived not only five centuries, but also the leap into electronic typesetting</p>
                            <div class="progress-group">
                                <div class="progress-item">
                                    <div class="progress-head">
                                        <p class="progress-on">Photoshop</p>
                                    </div>
                                    <div class="progress-body">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                        </div>
                                        <p class="progress-to">70%</p>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-head">
                                        <p class="progress-on">HTML/CSS</p>
                                    </div>
                                    <div class="progress-body">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                        </div>
                                        <p class="progress-to">90%</p>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-head">
                                        <p class="progress-on">JavaScript</p>
                                    </div>
                                    <div class="progress-body">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                        </div>
                                        <p class="progress-to">74%</p>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-head">
                                        <p class="progress-on">PHP</p>
                                    </div>
                                    <div class="progress-body">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                        </div>
                                        <p class="progress-to">86%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="special-qualification dashboard-section details-section">
                            <h4><i data-feather="gift"></i>Special Qualification</h4>
                            <ul>
                                <li>5 years+ experience designing and building products.</li>
                                <li>Skilled at any Kind Design Tools.</li>
                                <li>Passion for people-centered design, solid intuition.</li>
                                <li>Hard Worker & Quick Lerner.</li>
                            </ul>
                        </div>
                        <div class="portfolio dashboard-section details-section">
                            <h4><i data-feather="gift"></i>Portfolio</h4>
                            <div class="portfolio-slider owl-carousel">
                                <div class="portfolio-item">
                                    <img src="{{asset('images/portfolio/thumb-3.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-item">
                                    <img src="{{asset('images/portfolio/thumb-1.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-item">
                                    <img src="{{asset('images/portfolio/thumb-2.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-item">
                                    <img src="{{asset('images/portfolio/thumb-3.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-item">
                                    <img src="{{asset('images/portfolio/thumb-2.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="personal-information dashboard-section last-child details-section">
                            <h4><i data-feather="user-plus"></i>Personal Deatils</h4>
                            <ul>
                                <li><span>Full Name:</span> Micheal N. Taylor</li>
                                <li><span>Father's Name:</span> Howard Armour</li>
                                <li><span>Mother's Name:</span> Megan Higbee</li>
                                <li><span>Date of Birth:</span> 22/08/1992</li>
                                <li><span>Nationality:</span> American </li>
                                <li><span>Sex:</span> Male</li>
                                <li><span>Address:</span> 2018 Nelm Street, Beltsville, VA 20705</li>
                            </ul>
                        </div>
                    </div>
                    @include("common.side_bar_candidate")

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
