<?php $rootPath ="../";?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PATH</title>

    <!-- Bootstrap CSS -->
    <?php require_once $rootPath.'common/libraries.php';?>
    <link rel="stylesheet" type="text/css" href="<?php echo $rootPath;?>dashboard/css/dashboard.css">
    <style>
        .headerSeparator{
            width:100%; height:60px;
        }

    </style>
</head>
<body>

<?php require_once $rootPath.'common/header-candidate.php';?>
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
                        <div class="alert-wrap">
                            <div class="jy-alert success-alert">
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <p>Success!  You successfully read this important alert message.</p>
                                <div class="close_">
                                    <a href="#"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                            <div class="jy-alert info-alert">
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <p>Info!  This alert needs your attention, but it's not important.</p>
                                <div class="close_">
                                    <a href="#"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                            <div class="jy-alert warning-alert">
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <p>Warning!  Better check yourself, you're not looking too good. </p>
                                <div class="close_">
                                    <a href="#"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                            <div class="jy-alert danger-alert">
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <p>Danger!  Change a few things up and try submitting again. </p>
                                <div class="close_">
                                    <a href="#"><i class="fas fa-times"></i></a>
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

                                    <img src="dashboard/images/user-1.jpg" class="img-fluid" alt="">
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
                                    {{--  <p class="progress-on">Profile</p>  --}}
                                </div>
                                <div class="progress-body">
                                    <div class="progress">
                                        {{--  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                    </div>
                                    <p class="progress-to">70%</p>  --}}
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><i class="fas fa-home"></i><a href="#">Dashboard</a></li>
                                <li><i class="fas fa-user"></i><a href="#">Edit Profile</a></li>
                                <li><i class="fas fa-file-alt"></i><a href="#">Resume</a></li>
                                <li><i class="fas fa-edit"></i><a href="#">Edit Resume</a></li>
                                <li><i class="fas fa-heart"></i><a href="#">Bookmarked</a></li>
                                <li><i class="fas fa-check-square"></i><a href="#">Applied Job</a></li>
                                {{--  <li><i class="fas fa-comment"></i><a href="#">Message</a></li>  --}}
                                <li><i class="fas fa-calculator"></i><a href="#">Pricing Plans</a></li>
                            </ul>
                            <ul class="delete">
                                <li><i class="fas fa-power-off"></i><a href="#">Logout</a></li>
                                <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Profile</a></li>
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
                        <a href="#" class="button">Add Resume</a>
                        <span>Or</span>
                        <a href="#" class="button">Post A Job</a>
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
                            <img src="<?php echo $rootPath;?>images/footer-logo.png" class="img-fluid" alt="">
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
<script src="<?php echo $rootPath;?>assets/js/jquery.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/popper.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/feather.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/jquery.nstSlider.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/visible.js"></script>
<script src="<?php echo $rootPath;?>assets/js/jquery.countTo.js"></script>
<script src="<?php echo $rootPath;?>assets/js/chart.js"></script>
<script src="<?php echo $rootPath;?>assets/js/plyr.js"></script>
<script src="<?php echo $rootPath;?>assets/js/tinymce.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/slick.min.js"></script>
<script src="<?php echo $rootPath;?>assets/js/jquery.ajaxchimp.min.js"></script>

<script src="<?php echo $rootPath;?>js/custom.js"></script>
<script src="<?php echo $rootPath;?>dashboard/js/dashboard.js"></script>
<script src="<?php echo $rootPath;?>dashboard/js/datePicker.js"></script>
<script src="<?php echo $rootPath;?>dashboard/js/upload-input.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="<?php echo $rootPath;?>js/map.js"></script>
</body>
</html>
