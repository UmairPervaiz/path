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
                    <h1>Employer Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employer Dashboard</li>
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
                        <div class="manage-job-container">
                            <table class="table">
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
                                <thead>
                                <tr>
                                    <th>Package Title</th>
{{--                                    <th>Applications</th>--}}
{{--                                    <th>Deadline</th>--}}
{{--                                    <th>Status</th>--}}
                                    <th class="action">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($packages != '')
                                @foreach($packages as $package)

                                <tr class="job-items">
                                    <td class="title">
{{--                                        <h5><a href="{{route('postjobview',encrypt($package->id) )}}">{{($package->package_name)}}</a></h5>--}}
                                        <h5><a href="{{route('managePricingEdit',encrypt($package->id) )}}">{{($package->package_name)}}</a></h5>
                                        <div class="info">
                                        </div>
                                    </td>
                                    <td class="action">
                                        <a href="{{route('postjobview',encrypt($package->id) )}}" class="preview" title="Preview"><i data-feather="eye"></i></a>
                                        <a href="{{route('managePricingEdit', encrypt($package->id) )}}" class="edit" title="Edit"><i data-feather="edit"></i></a>
                                        <a href="#" class="remove" title="Delete"><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>

                                @endforeach
                                @endif
                                </tbody>
                            </table>
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
                    </div>
                    <div class="dashboard-sidebar">
                        <div class="company-info">
                            <div class="thumb">
                                @if(Auth::user()->avatar !=null)
                                    <img class="img-fluid" src="{{ asset('images/'.Auth::user()->avatar) }}" alt="">
                                @else

                                    <img src="dashboard/images/user-1.jpg" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="company-body">
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
                                    {{--  <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                    </div>
                                    <p class="progress-to">70%</p>  --}}
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><i class="fas fa-home"></i><a href="{{url('employee/dashboard',encrypt(Auth::user()->id))}}">Dashboard</a></li>
                                {{--                                <li><i class="fas fa-user"></i><a href="{{url('employee/editprofile', encrypt($job->user_id) )}}">Edit Profile</a></li>--}}
                                <li><i class="fas fa-user"></i><a href="{{url('employee/editprofile', encrypt(Auth::user()->id) )}}">Edit Profile</a></li>
                                <li ><i class="fas fa-briefcase"></i><a href="{{url('employee/managejob', encrypt(Auth::user()->id))}}">Manage Jobs</a></li>
                                {{--                                <li><i class="fas fa-users"></i><a href="{{url('employee/manageCandidate', encrypt(Auth::user()->id))}}">Manage Candidates</a></li>--}}
                                {{--  <li><i class="fas fa-heart"></i><a href="{{url('employee/manageCandidate', encrypt(Auth::user()->id))}}">Shortlisted Resumes</a></li>  --}}
                                <li><i class="fas fa-plus-square"></i><a href="{{url('employee/postjob', encrypt(Auth::user()->id))}}">Post New Job</a></li>
                                {{--  <li><i class="fas fa-comment"></i><a href="{{url('employee/message', encrypt(Auth::user()->id))}}">Message</a></li>  --}}
                                <li><i class="fas fa-calculator"></i><a href="{{url('employee/pricing', encrypt(Auth::user()->id))}}">Pricing Plans</a></li>
                                <li class="active"><i class="fas fa-calculator"></i><a href="{{url('employee/managePricing', encrypt(Auth::user()->id))}}">Pricing Plans Edit View Page</a></li>

                            </ul>
                            <ul class="delete">
                                <li><i class="fas fa-power-off"></i><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
     {{ __('Logout') }}
 </a></li>
                                {{--  <li><i class="fas fa-power-off"></i><a href="#">Logout</a></li>  --}}
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
