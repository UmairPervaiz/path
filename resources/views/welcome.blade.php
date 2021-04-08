
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Path</title>

        <!-- Bootstrap CSS -->

        @include('common.libraries')


    </head>
    <body>

    <!-- Header -->

    {{--@include('common.header-home')--}}

    <header class=" ">

        <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav">
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img src="{{asset('asset/images/logo.png')}}" class="img-fluid" alt="">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto job-browse">
                    <li class="nav-item dropdown">
                        <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Browse Jobs</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="search-by">
                                <h5>BY Category</h5>
                                <ul>
                                    @foreach($job_categories as $job_category)
                                        @php  $count = DB::table('jobs')
                                                            ->where('category', $job_category->id)
                                                            ->where('status', '=' , 1)
                                                            ->where('approval_status', '=' , 1)
                                                            ->where('expireDate','>=', $timeCheck)
                                                            ->count(); @endphp
                                        <li><a >{{$job_category->category}} <span>({{$count}})</span></a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="search-by">
                                <h5>BY Location</h5>
                                <ul>
                                    @foreach($locations as $location)
                                        @php  $count = DB::table('jobs')
                                                            ->where('job_location', $location->id)
                                                            ->where('status', '=' , 1)
                                                            ->where('approval_status', '=' , 1)
                                                            ->where('expireDate','>=', $timeCheck)
                                                            ->count(); @endphp
                                        <li><a >{{$location->name}} <span>({{$count}})</span></a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto main-nav " >





                    <!--            <li class="menu-item post-job"><a title="Title" href="post-job.php"><i class="fas fa-plus"></i>Post a Job</a></li>-->
                </ul>
                <ul class="navbar-nav ml-auto account-nav">
                    @auth()
                        <li class="menu-item login-popup"><a @if(Auth::user()->hasRole('Employer')) href="{{route('employerDashboard')}}"
                            @elseif( Auth::user()->hasRole('Candidate')) href="{{route('candidateDashboard')}}"
                            @elseif( Auth::user()->hasRole('Admin')) href="{{route('adminDashboard')}}"
                            @elseif( Auth::user()->hasRole('Sub Admin')) href="{{route('subAdminDashboard')}}" @endif
                                 type="button" >Dashboard</a></li>
                    @endauth
                    @guest()
                        <li class="menu-item login-popup"><button title="Title" type="button" data-toggle="modal" data-target="#exampleModalLong">Login</button></li>
{{--                        <li class="menu-item login-popup"><button title="Title" type="button" data-toggle="modal" data-target="#exampleModalLong2">Registration</button></li>--}}
                            <li class="menu-item login-popup"><a href="{{route('candidate-register')}}">Register as Candidate</a></li>
                            <li class="menu-item login-popup"><a href="{{route('employer-register')}}">Register as Employer</a></li>
                    @endguest
                </ul>
            </div>
        </nav>
        <!-- Modal -->
        <div class="account-entry">
{{--            <form method="post" action="{{ route('login') }}">--}}
            <form method="post" action="{{ route('userLogin') }}">
{{--            <form method="POST" id="login">--}}
                @csrf
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i data-feather="user"></i>Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
    {{--                        <form action="#">--}}
                                <div class="form-group">
                                    <input id="email" type="email" name="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror form-control-lg" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @if ($message = Session::get('warning'))
                                        <div class="alert alert-warning alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-warning alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span id="error-span">
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror form-control-lg" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="more-option">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Remember Me
                                        </label>
                                    </div>
                                    <a href="#">Forget Password?</a>
                                </div>
                                <button class="button primary-bg btn-block">Login</button>
{{--                                <button class="button primary-bg btn-block" type="submit" id="logo">Login</button>--}}
    {{--                        </form>--}}
                            <div class="shortcut-login">
{{--                                <p>Don't have an account? <a onclick="registerModal()" style="cursor:pointer">Register</a></p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </form>


{{--            <form method="POST" action="{{ route('register') }}">--}}
            <form method="POST" action="{{ route('userRegister') }}">
            @csrf
                <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i data-feather="edit"></i>Registration</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="account-type ">
                                        <div class="card-body">
                                            <label>Account Type</label>
                                            <select name="accountTypeUser"  class="form-control @error('accountTypeUser') is-invalid @enderror" id="account_type" required>
                                                <option selected="selected" disabled="disabled" value="">Please select</option>
                                                <option value='Employer'>Employer</option>
                                                <option value='Candidate'>Candidate</option>
                                            </select>
                                            @error('accountTypeUser')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ 'The account type field must be selected' }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input id="Username" name="Username" type="text" value="{{ old('Username') }}" placeholder="Name" class="form-control @error('Username') is-invalid @enderror"  required autocomplete="Username" autofocus>
                                    @error('Username')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="UserEmail" name="UserEmail" type="email" value="{{ old('UserEmail') }}" placeholder="Email Address" class="form-control @error('UserEmail') is-invalid @enderror" required autocomplete="UserEmail">
                                    @error('UserEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="user_password" name="user_password" type="password" placeholder="Password" class="form-control @error('user_password') is-invalid @enderror" required>
{{--                                    <input id="password" name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">--}}
                                    @error('user_password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="user_password_confirmation" required>
{{--                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                                </div>
                                <div class="more-option terms">
                                    <div class="form-check">
                                        <input class="form-check-input @error('agreeterms') is-invalid @enderror" name="agreeterms" type="checkbox" id="AgreeTerms" required>
        {{--                                @error('agreeterms') is-invalid @enderror--}}
                                        <label class="form-check-label" for="defaultCheck2">
                                            I accept the <a href="#">terms & conditions</a>
                                        </label>
                                        @error('agreeterms')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ 'The agreeterms field must be checked' }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6" style="float:left;">
        {{--                            <form action="add-resume.php">--}}
        {{--                                <button class="button primary-bg btn-block">Candidate Register</button>--}}
        {{--                            </form>--}}
                                </div>
                                <div class="col-md-6" style="float:left;">
        {{--                            <form action="employer/index.php">--}}
                                        <button class="button primary-bg btn-block">Register</button>
        {{--                            <input type="submit" value="Register" class="button primary-bg btn-block" name="btnSubmit" id="btnSubmit">--}}
        {{--                            </form>--}}
                                </div>


                                <div class="shortcut-login">
                                    <p>Already have an account? <a onclick="loginModal()" style="cursor:pointer">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </header>
    <!-- Header End -->


    <!-- Banner -->
    <div class="banner banner-1 banner-1-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h1>{{$active_jobs}} Job(s) Listed</h1>
                        <p>Create free account to find thousands Jobs, Employment & Career Opportunities around you!</p>
                        @if(Auth::check())
                            @if(Auth::user()->hasRole('Candidate'))
                            <a href="{{route('resume')}}"
                                class="button" >Upload Resume</a>
                              @endif
                            @else
                          <a data-toggle="modal" data-target="#exampleModalLong" class="button">Upload Resume</a>
                        @endif
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
                            <form action="{{route('job_search')}}" method="POST" class="search-form">
{{--                            <form class="search-form">--}}
                                @csrf
{{--                                <input type="hidden" name="location_id" value="{{$location->name}}">--}}
{{--                                <input type="hidden" name="category_id" value="{{$job_category->category}}">--}}

                                <input type="text" name="keyword" placeholder="Enter Keywords">

                                <select class="selectpicker" name="location" id="location">
                                    <option value="" selected>Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->name}}">{{$location->name}}</option>
                                    @endforeach
                                </select>
                                <select class="selectpicker" name="category" id="category">
                                    <option value="" selected>Category</option>
                                    @foreach($job_categories as $job_category)
                                        <option value="{{$job_category->category}}">{{$job_category->category}}</option>
                                    @endforeach
                                </select>
                                <button class="button primary-bg"><i class="fas fa-search"></i>Search Job</button>
{{--                                <i class="button primary-bg" onclick="filterFunction();"><span class="fas fa-search "> Search Job </span></i>--}}
                            </form>
                            <div class="filter-categories">
                                <h4>Job Category</h4>
                                <ul>
                                    @foreach($job_categories as $job_category)
                                        @php
                                                    $count = DB::table('jobs')
                                                            ->where('category', $job_category->category)
                                                            ->where('status', '=' ,'Active')
                                                            ->where('endingDate','>=', $timeCheck)
                                                            ->count();
                                        @endphp
                                    <li><a><i @if ($job_category->icon == 'bar-chart-2')  data-feather="bar-chart-2"
                                                       @elseif ($job_category->icon == 'briefcase') data-feather="briefcase"
                                                       @elseif ($job_category->icon == 'command') data-feather="command"
                                                       @elseif ($job_category->icon == 'radio') data-feather="radio"
                                                       @elseif ($job_category->icon == 'home') data-feather="home"
                                                       @endif >
                                            </i>{{$job_category->category}}<span>({{$count}})</span>
                                        </a>
                                    </li>
                                    @endforeach
{{--                                    <li><a href="job-listing.php"><i data-feather="edit-3"></i>Education <span>(46)</span></a></li>--}}
{{--                                    <li><a href="job-listing.php"><i data-feather="feather"></i>Design & Creative <span>(156)</span></a></li>--}}
{{--                                    <li><a href="job-listing.php"><i data-feather="package"></i>Engineer & Architects <span>(188)</span></a></li>--}}
{{--                                    <li><a href="job-listing.php"><i data-feather="pie-chart"></i>Marketing & Sales <span>(124)</span></a></li>--}}
{{--                                    <li><a href="job-listing.php"><i data-feather="globe"></i>Customer Support <span>(233)</span></a></li>--}}
{{--                                    <li><a href="job-listing.php"><i data-feather="headphones"></i>Digital Media <span>(15)</span></a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search and Filter End -->

    @guest()
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
                        <a href="{{route('candidate-register')}}">Register Now <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="call-to-action-box employer-register">
                        <div class="icon">
                            <img src="{{asset('asset/images/register-box/2.png')}}" alt="">
                        </div>
                        <span>Are You</span>
                        <h3>Employer?</h3>
                        <a href="{{route('employer-register')}}">Register Now <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Box End -->
    @endguest

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
                        @foreach($total_companies as $total_company)
                                @php
                                    $user = DB::table('users')
                                                        ->where('id', '=',$total_company->model_id)
                                                        ->first();
                                    $job_count = DB::table('jobs')
                                                        ->where('user_id', '=',$total_company->model_id)
                                                        ->count();
                                @endphp
                            <div class="company-wrap" >
                                <div class="thumb">
                                    <a>
                                        @if (isset($user->avatar))
                                            <img src="{{ asset('images/'.$user->avatar) }}" style="height: 100px" class="img-fluid" alt="">
                                        @else
                                            <img src="{{asset('asset/images/company/company-logo-1.png')}}" style="height: 100px" class="img-fluid" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="body" style="height: 150px">
                                    @if (isset($user->companyname))

                                        <h4><a style="height: 60px">{{$user->companyname}}</a></h4>
                                    @else
                                        <h4><a href="#" style="height: 60px">No company name</a></h4>
                                    @endif
                                        @if (isset($user->your_location))
                                             <span>{{$user->your_location}}</span>
                                        @else
                                            <span>N/A</span>
                                        @endif
                                    <a class="button">{{$job_count}} Job(s) Posted</a>
                                </div>
                        </div>
                        @endforeach
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
                            <a class="nav-link " id="recent-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="true">Recent Job</a>
                        </li>
                        <li class="nav-item">
{{--                            <a class="nav-link" id="feature-tab" data-toggle="tab" href="#feature" role="tab" aria-controls="feature" aria-selected="false">Feature Job</a>--}}
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                            <div class="row">
                                @foreach($total_jobs as $total_job)
                                <div class="col-lg-6">
                                        @php
                                            $avatar = DB::table('users')
                                                                ->select('avatar')
                                                                ->where('id',$total_job->user_id)
                                                                ->first();
                                        @endphp
                                        <div class="job-list half-grid">
                                            <div class="thumb">
                                                <a href="{{route('jobDetails', encrypt($total_job->id))}}">
                                                    <img src="{{ asset('images/'.$avatar->avatar) }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                            <div class="body">
                                                <div class="content">
                                                    <h4><a href="{{route('jobDetails', encrypt($total_job->id))}}">{{$total_job->title}}</a></h4>
                                                    <div class="info">
                                                        <span class="company"><a href="{{route('jobDetails', encrypt($total_job->id))}}"><i data-feather="briefcase"></i>{{$total_job->companyName}}</a></span>
                                                        <span class="office-location"><a href="{{route('jobDetails', encrypt($total_job->id))}}"><i data-feather="map-pin"></i>{{$total_job->job_location}}</a></span>
                                                        <span class="job-type temporary"><a href="{{route('jobDetails', encrypt($total_job->id))}}"><i data-feather="clock"></i>{{$total_job->type}}</a></span>
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
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="feature" role="tabpanel" aria-labelledby="feature-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="job-list half-grid">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="{{asset('asset/images/job/company-logo-10.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-1.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-2.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-1.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-8.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-9.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-3.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-2.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-8.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-9.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-10.png')}}" class="img-fluid" alt="">
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
                                                <img src="{{asset('asset/images/job/company-logo-3.png')}}" class="img-fluid" alt="">
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
                        <p class="fact-number"><span class="count" data-form="0" data-to="{{$active_jobs}}"></span></p>
                        <p class="fact-name">Live Jobs</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="fact">
                        <div class="fact-icon">
                            <i data-feather="users"></i>
                        </div>
                        <p class="fact-number"><span class="count" data-form="0" data-to="{{$total_candidates}}"></span></p>
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
                        <p class="fact-number"><span class="count" data-form="0" data-to="{{$total_companies_count}}"></span></p>
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


        <script>
            function loginModal(){
                $("#exampleModalLong2").modal('hide');
                $("#exampleModalLong").modal('show');
                $('.modal').css('overflow-y', 'auto');
            }

            function registerModal(){
                $("#exampleModalLong").modal('hide');
                $("#exampleModalLong2").modal('show');
                $('.modal').css('overflow-y', 'auto');
            }
        </script>

    @if(Session::has('warning'))
        <script>
            $(document).ready(function(){
                $("#exampleModalLong").modal();
            });
        </script>
    @endif
    @if(Session::has('success'))
        <script>
            $(document).ready(function(){
                $("#exampleModalLong").modal();
            });
        </script>
    @endif
    @if(Session::has('errorUser'))
        <script>
            $(document).ready(function(){
                $("#exampleModalLong2").modal();
            });
        </script>
    @endif

    </body>
    </html>

    <script>
        function filterFunction()
        {
            let location_id = '';
            location_id = $('#location > option:selected').val();
alert(location_id);
            let category = '';
            category = $('#category > option:selected').val();
alert(category);

            {{--$.ajax({--}}
            {{--    method: "POST",--}}
            {{--    url: "{{route('adminOrderStatus')}}",--}}
            {{--    data: {--}}
            {{--        _token: $('meta[name="csrf-token"]').attr('content'),--}}
            {{--        status: value,--}}
            {{--        order_id: id,--}}

            {{--    },--}}
            {{--    success: function (response)--}}
            {{--    {--}}
            {{--        if(response.status === 0)--}}
            {{--        {--}}
            {{--            alert('error');--}}
            {{--        }--}}
            {{--        else--}}
            {{--        {--}}
            {{--            alert('done');--}}
            {{--        }--}}
            {{--    }--}}
            {{--});--}}
        }
        function formValidation()
        {
            let check_account = document.registration.accounttype;
        {

             if(account_check(check_account))
             {
                alert('pta nai');
             }

        }
            return false;
        }
        function account_check(check_account)
        {
            if(check_account.value === "Default")
            {
                alert('select your account type from the list');
                check_account.focus();
                return false;
            }
            else
            {
                return true;
            }
        }

        {{--$( '#login' ).on( 'submit', function(e) {--}}
        {{--    e.preventDefault();--}}

        {{--    let email = $(this).find('input[name=email]').val();--}}
        {{--    let password = $(this).find('input[name=password]').val();--}}

        {{--    // alert(password);--}}
        {{--    $.ajax({--}}
        {{--        method: "POST",--}}
        {{--        url: "{{route('login')}}",--}}
        {{--        data: {--}}
        {{--            _token: $('meta[name="csrf-token"]').attr('content'),--}}
        {{--            email: email,--}}
        {{--            password: password,--}}

        {{--        },--}}
        {{--        success: function (response)--}}
        {{--        {--}}
        {{--            alert(response);--}}
        {{--            if(response.status == 0)--}}
        {{--            {--}}
        {{--                $("#error-span").text(response.message);--}}
        {{--                // alert(response.message);--}}
        {{--            }--}}
        {{--            else--}}
        {{--            {--}}
        {{--                // alert('done');--}}
        {{--                window.location=response.url;--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}

        {{--});--}}
    </script>

