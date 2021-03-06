
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Path</title>

    <!-- Bootstrap CSS -->

    @include('common.libraries')

</head>
<body>

<!-- Header -->

@include('common.header-home')
<!-- Header End -->


<!-- Banner -->
<div class="banner banner-1 banner-1-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content">
                    <h1>58,246 Job Listed</h1>
                    <p>Create free account to find thousands Jobs, Employment & Career Opportunities around you!</p>
                    <a href="add-resume.php" class="button">Upload Resume</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Search and Filter -->
<div class="searchAndFilter-wrapper">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="searchAndFilter-block">
                    <div class="searchAndFilter">
                        <form action="#" class="search-form">
                            <input type="text" placeholder="Enter Keywords">
                            <select class="selectpicker" id="search-location">
                                <option value="" selected>Location</option>
                                <option value="california">California</option>
                                <option value="las-vegas">Las Vegas</option>
                                <option value="new-work">New Work</option>
                                <option value="carolina">Carolina</option>
                                <option value="chicago">Chicago</option>
                                <option value="silicon-vally">Silicon Vally</option>
                                <option value="washington">Washington DC</option>
                                <option value="neveda">Neveda</option>
                            </select>
                            <select class="selectpicker" id="search-category">
                                <option value="" selected>Category</option>
                                <option value="real-state">Real State</option>
                                <option value="vehicales">Vehicales</option>
                                <option value="electronics">Electronics</option>
                                <option value="beauty">Beauty</option>
                                <option value="furnitures">Furnitures</option>
                            </select>
                            <button class="button primary-bg"><i class="fas fa-search"></i>Search Job</button>
                        </form>
                        <div class="filter-categories">
                            <h4>Job Category</h4>
                            <ul>
                                <li><a href="job-listing.php"><i data-feather="bar-chart-2"></i>Accounting / Finance <span>(233)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="edit-3"></i>Education <span>(46)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="feather"></i>Design & Creative <span>(156)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="briefcase"></i>Health Care <span>(98)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="package"></i>Engineer & Architects <span>(188)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="pie-chart"></i>Marketing & Sales <span>(124)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="command"></i>Garments / Textile <span>(584)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="globe"></i>Customer Support <span>(233)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="headphones"></i>Digital Media <span>(15)</span></a></li>
                                <li><a href="job-listing.php"><i data-feather="radio"></i>Telecommunication <span>(03)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search and Filter End -->

<!-- Registration Box -->
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="call-to-action-box candidate-box">
                    <div class="icon">
                        <img src="{{asset('asset/images/register-box/1.png')}}" alt="">
                    </div>
                    <span>Are You</span>
                    <h3>Candidate?</h3>
                    <a href="#" data-toggle="modal" data-target="#exampleModalLong2">Register Now <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="call-to-action-box employer-register">
                    <div class="icon">
                        <img src="{{asset('asset/images/register-box/2.png')}}" alt="">
                    </div>
                    <span>Are You</span>
                    <h3>Employer?</h3>
                    <a href="#" data-toggle="modal" data-target="#exampleModalLong3">Register Now <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Registration Box End -->

<!-- Top Companies -->
<div class="section-padding-top padding-bottom-90">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-header">
                    <h2>Top Companies</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="company-carousel owl-carousel">
                    <div class="company-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('asset/images/company/company-logo-1.png')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h4><a href="employer-details">Digoin</a></h4>
                            <span>Kansas City, Missouri</span>
                            <a href="job-listing.php" class="button">4 Open Positions</a>
                        </div>
                    </div>
                    <div class="company-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('asset/images/company/company-logo-2')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h4><a href="employer-details.php">Orion Ltd.</a></h4>
                            <span>Sacramento, California</span>
                            <a href="job-listing.php" class="button">2 Open Positions</a>
                        </div>
                    </div>
                    <div class="company-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('asset/images/company/company-logo-3')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h4><a href="employer-details.php">Realhouse</a></h4>
                            <span>London, United Kingdom</span>
                            <a href="job-listing.php" class="button">4 Open Positions</a>
                        </div>
                    </div>
                    <div class="company-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('asset/images/company/company-logo-4')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h4><a href="employer-details.php">BioPro</a></h4>
                            <span>Ajax, Ontarioland</span>
                            <a href="job-listing.php" class="button">1 Open Positions</a>
                        </div>
                    </div>
                    <div class="company-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('asset/images/company/company-logo-1')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h4><a href="employer-details.php">Digoin</a></h4>
                            <span>Kansas City, Missouri</span>
                            <a href="job-listing.php" class="button">4 Open Positions</a>
                        </div>
                    </div>
                    <div class="company-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('asset/images/company/company-logo-2')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h4><a href="employer-details.php">Orion Ltd.</a></h4>
                            <span>Sacramento, California</span>
                            <a href="job-listing.php" class="button">2 Open Positions</a>
                        </div>
                    </div>
                    <div class="company-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('asset/images/company/company-logo-3')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h4><a href="employer-details.php">Realhouse</a></h4>
                            <span>London, United Kingdom</span>
                            <a href="job-listing.php" class="button">4 Open Positions</a>
                        </div>
                    </div>
                    <div class="company-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('asset/images/company/company-logo-4')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h4><a href="employer-details.php">BioPro</a></h4>
                            <span>Ajax, Ontarioland</span>
                            <a href="job-listing.php" class="button">1 Open Positions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Companies End -->

<!-- Jobs -->
<div class="section-padding-bottom alice-bg">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs job-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="recent-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="true">Recent Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="feature-tab" data-toggle="tab" href="#feature" role="tab" aria-controls="feature" aria-selected="false">Feature Job</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-8')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-details.php">Restaurant Team Member - Crew </a></h4>
                                            <div class="info">
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-9')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-10')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-3')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-details.php">Land Development Marketer</a></h4>
                                            <div class="info">
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                                                <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington, D.C.</a></span>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-10')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-3')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-details.php">Land Development Marketer</a></h4>
                                            <div class="info">
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                                                <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington, D.C.</a></span>
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
                            </div>
                            <div class="col-lg-6">
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-1')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-2')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-8')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-details.php">Restaurant Team Member - Crew </a></h4>
                                            <div class="info">
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-9')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-1')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-2')}}" class="img-fluid" alt="">
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="feature" role="tabpanel" aria-labelledby="feature-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-10')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-listing.php">UI Designer</a></h4>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-1')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-listing.php">Designer Required</a></h4>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-2')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-listing.php">Project Manager</a></h4>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-1')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-listing.php">Designer Required</a></h4>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-8')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-listing.php">Restaurant Team Member - Crew </a></h4>
                                            <div class="info">
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-9')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-listing.php">Nutrition Advisor</a></h4>
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
                            </div>
                            <div class="col-lg-6">
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-3')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-details.php">Land Development Marketer</a></h4>
                                            <div class="info">
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                                                <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington, D.C.</a></span>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-2')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-8')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-details.php">Restaurant Team Member - Crew </a></h4>
                                            <div class="info">
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-9')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-10')}}" class="img-fluid" alt="">
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
                                <div class="job-list half-grid">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('asset/images/job/company-logo-3')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="content">
                                            <h4><a href="job-details.php">Land Development Marketer</a></h4>
                                            <div class="info">
                                                <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                                                <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington, D.C.</a></span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->



<!-- Fun Facts -->
<div class="padding-top-90 padding-bottom-60 fact-bg">
    <div class="container">
        <div class="row fact-items">
            <div class="col-md-3 col-sm-6">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="briefcase"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="12376"></span></p>
                    <p class="fact-name">Live Jobs</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="users"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="89562"></span></p>
                    <p class="fact-name">Candidate</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="file-text"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="28166"></span></p>
                    <p class="fact-name">Resume</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="award"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="1366"></span></p>
                    <p class="fact-name">Companies</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fun Facts End -->



<!-- Modal -->
<div class="account-entry">
    <div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i data-feather="edit"></i>Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="account-type">
                        <a href="#" class="candidate-acc"><i data-feather="user"></i>Candidate</a>
                        <a href="#" class="employer-acc active"><i data-feather="briefcase"></i>Employer</a>
                    </div>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="more-option terms">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                <label class="form-check-label" for="defaultCheck3">
                                    I accept the <a href="#">terms & conditions</a>
                                </label>
                            </div>
                        </div>
                        <button class="button primary-bg btn-block">Register</button>
                    </form>
                    <div class="shortcut-login">

                        <p>Already have an account? <a href="#">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







@include('common.footer')
@include('common.footerLibraries')
</body>
</html>
