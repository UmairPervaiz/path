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

{{--@include('common.header-candidate')--}}
@include('header-candidate')
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

                        <form action="#" method="post">
                            @csrf
                            <div class="skill-and-profile dashboard-section">
                                <div class="skill">
                                    <label>Skills:</label>
                                    <a href="#">Design</a>
                                    <a href="#">Illustration</a>
                                    <a href="#">iOS</a>
                                    <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-skill" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="title">
                                                        <h4><i data-feather="git-branch"></i>MY SKILL</h4>
                                                        <a href="#" class="add-more">+ Add Skills</a>
                                                    </div>
                                                    <div class="content">
                                                        <form action="#">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Type Skills</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">01</div>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="skill" id="tag-input" data-role="tag-input" data-tag-class="badge badge-primary">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="offset-sm-3 col-sm-9">
                                                                    <div class="buttons">
                                                                        <button class="primary-bg">Save Update</button>
                                                                        <button class="" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="about-details details-section dashboard-section">
                            <h4><i data-feather="align-left"></i>About Me</h4>
                            <p>{{ old('about', isset($candidate_abouts) ? $candidate_abouts->about : '' )}}</p>
                            <div class="information-and-contact">
                                @if($candidate_abouts != '')
                                    <div class="information">
                                        <h4>Information</h4>
                                        <ul>
                                            <li><span>Category:</span> {{old('category', isset($candidate_abouts) ? $candidate_abouts->category : '')}}</li>
                                            <li><span>Location:</span> {{ old('location', isset($candidate_abouts) ? $candidate_abouts->location : '')}}</li>
                                            <li><span>Status:</span> {{old('status', isset($candidate_abouts) ? $candidate_abouts->status : '')}}</li>
                                            <li><span>Experience:</span> {{old('experience', isset($candidate_abouts) ? $candidate_abouts->experience : '') }}</li>
                                            <li><span>Salary:</span> {{old('salary', isset($candidate_abouts) ? $candidate_abouts->salary : '')}}</li>
                                            <li><span>Gender:</span> {{old('gender', isset($candidate_abouts) ? $candidate_abouts->gender : '')}}</li>
                                            <li><span>Age:</span> {{old('age', isset($candidate_abouts) ? $candidate_abouts->age : '')}}</li>
                                            <li><span>Qualification:</span> {{old('qualification', isset($candidate_abouts) ? $candidate_abouts->qualification : '')}}</li>
                                            {{--                                        <li><span>Qualification:</span> {{old('avatar', isset($candidate_abouts) ? $candidate_abouts->location : '')}}</li>--}}
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <!-- Button trigger modal -->
                        {{--                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-about-me">--}}
                        {{--                                <i data-feather="edit-2"></i>--}}
                        {{--                            </button>--}}
                        <!-- Modal -->

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
                                                {{--                                                <form action="{{isset($user) ? route('edit_about_us', Auth::user()->id)  : route('edit_about_us', Auth::user()->id)}}" method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Write Yourself</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <textarea name="about" class="form-control" placeholder="Write Yourself" >{{old('about', isset($user) ? $user->about : '')}}</textarea>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <h4><i data-feather="align-left"></i>Information</h4>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Category</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="category" class="form-control"  placeholder="Design &amp; Creative" value="{{old('category', isset($user) ? $user->category : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Location</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="location" class="form-control"  placeholder="Los Angeles" value="{{old('location', isset($user) ? $user->location : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Status</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="status" class="form-control"  placeholder="Full Time" value="{{old('status', isset($user) ? $user->status : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Experience</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="experience" class="form-control"  placeholder="3 Year" value="{{old('experience', isset($user) ? $user->experience : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Salary Range</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="salary" class="form-control"  placeholder="30k - 40k" value="{{old('salary', isset($user) ? $user->salary : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Gender</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="gender" class="form-control"  placeholder="Male" value="{{old('gender', isset($user) ? $user->gender : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Age</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="age" class="form-control"  placeholder="25 Years" value="{{old('age', isset($user) ? $user->age : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Qualification</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="qualification" class="form-control"  placeholder="Gradute" value="{{old('qualification', isset($user) ? $user->qualification : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="row">--}}
                                                {{--                                                        <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                            <div class="buttons">--}}
                                                {{--                                                                <button class="primary-bg">Save Update</button>--}}
                                                {{--                                                                <button class="" data-dismiss="modal">Cancel</button>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="edication-background details-section dashboard-section">
                            <h4><i data-feather="book"></i>Education Background</h4>
                            @if($candidate_educations != '')
                                <div class="education-label">
                                    <span class="study-year">{{old('period', isset($candidate_educations) ? $candidate_educations->period : '')}}</span>
                                    <h5>{{old('title', isset($candidate_educations) ? $candidate_educations->title : '')}}<span>{{old('institution', isset($candidate_educations) ? $candidate_educations->institution : '')}}</span></h5>
                                    <p>{{old('description', isset($candidate_educations) ? $candidate_educations->description : '') }}</p>
                                </div>
                        @endif
                        <!-- Button trigger modal -->
                        {{--                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-education">--}}
                        {{--                                <i data-feather="edit-2"></i>--}}
                        {{--                            </button>--}}
                        <!-- Modal -->
                            <div class="modal fade modal-education" id="modal-education" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="book"></i>Education</h4>
                                                <a href="#" class="add-more">+ Add Education</a>
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
                                                {{--                                                <form action="{{isset($user2) ? route('edit_education_background', Auth::user()->id)  : route('edit_education_background', Auth::user()->id)}}" method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <div class="input-block-wrap">--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <label class="col-sm-3 col-form-label">01</label>--}}
                                                {{--                                                            <div class="col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Title</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="title" class="form-control" value="{{old('title', isset($user2) ? $user2->title : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Institute</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="institution" class="form-control" value="{{old('institution', isset($user2) ? $user2->institution : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="col-sm-9 offset-sm-3">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Period</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="period" class="form-control" value="{{old('period', isset($user2) ? $user2->period : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Description</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <textarea name="description" class="form-control">{{old('description', isset($user2) ? $user2->description : '')}}</textarea>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="row">--}}
                                                {{--                                                        <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                            <div class="buttons">--}}
                                                {{--                                                                <button class="primary-bg">Save Update</button>--}}
                                                {{--                                                                <button class="" data-dismiss="modal">Cancel</button>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="experience dashboard-section details-section">
                            <h4><i data-feather="briefcase"></i>Work Experiance</h4>
                            @if($candidate_experiences != '')
                                <div class="experience-section">
                                    <span class="service-year">{{old('period', isset($candidate_experiences) ? $candidate_experiences->period : '') }}</span>
                                    <h5>{{old('title', isset($candidate_experiences) ? $candidate_experiences->title : '') }}<span>{{old('company', isset($candidate_experiences) ? $candidate_experiences->company : '')}}</span></h5>
                                    <p>{{old('description', isset($candidate_experiences) ? $candidate_experiences->description : '')}}</p>
                                </div>
                        @endif
                        <!-- Button trigger modal -->
                        {{--                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-experience">--}}
                        {{--                                <i data-feather="edit-2"></i>--}}
                        {{--                            </button>--}}
                        <!-- Modal -->
                            <div class="modal fade modal-experience" id="modal-experience" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="briefcase"></i>Experience</h4>
                                                <a href="#" class="add-more">+ Add Experience</a>
                                            </div>
                                            <div class="content">
                                                {{--                                                <form action="{{isset($user3) ? route('edit_work_experience', Auth::user()->id)  : route('edit_work_experience', Auth::user()->id)}}" method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <div class="input-block-wrap">--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <label class="col-sm-3 col-form-label">01</label>--}}
                                                {{--                                                            <div class="col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Title</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="title" class="form-control"  value="{{old('title', isset($user3) ? $user3->title : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Company</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="company" class="form-control" value="{{old('company', isset($user3) ? $user3->company : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="col-sm-9 offset-sm-3">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Period</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="period" class="form-control" value="{{old('period', isset($user3) ? $user3->period : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Description</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <textarea name="description" class="form-control">{{old('description', isset($user3) ? $user3->description : '')}}</textarea>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="row">--}}
                                                {{--                                                        <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                            <div class="buttons">--}}
                                                {{--                                                                <button class="primary-bg">Save Update</button>--}}
                                                {{--                                                                <button class="" data-dismiss="modal">Cancel</button>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="professonal-skill dashboard-section details-section">
                            <h4><i data-feather="feather"></i>Professional Skill</h4>
                            @if($candidate_professional_skills !='')
                                <p>{{old('description', isset($candidate_professional_skills) ? $candidate_professional_skills->description : '')}}</p>
                                <div class="progress-group">
                                    <div class="progress-item">
                                        <div class="progress-head">
                                            <p class="progress-on">{{old('skill_name', isset($candidate_professional_skills) ? $candidate_professional_skills->skill_name : '')}}</p>
                                        </div>
                                        <div class="progress-body">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                            </div>
                                            <p class="progress-to">{{old('percentage', isset($candidate_professional_skills) ? $candidate_professional_skills->percentage : '') }}%</p>
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
                        @endif
                        <!-- Button trigger modal -->
                        {{--                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-pro-skill">--}}
                        {{--                                <i data-feather="edit-2"></i>--}}
                        {{--                            </button>--}}
                        <!-- Modal -->
                            <div class="modal fade modal-pro-skill" id="modal-pro-skill" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="feather"></i>Professional Skill</h4>
                                                <a href="#" class="add-more">+ Add Skill</a>
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
                                                {{--                                                <form action="{{isset($user8) ? route('edit_professional_skills', Auth::user()->id)  : route('edit_professional_skills', Auth::user()->id)}}" method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <div class="input-block-wrap">--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <label class="col-sm-3 col-form-label">About Skill</label>--}}
                                                {{--                                                            <div class="col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Description</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <textarea name="description" class="form-control">{{old('description', isset($user8) ? $user8->description : '')}}</textarea>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="input-block-wrap">--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <label class="col-sm-3 col-form-label">Skill 01</label>--}}
                                                {{--                                                            <div class="col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Skill Name</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="skill_name" class="form-control" value="{{old('skill_name', isset($user8) ? $user8->skill_name : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Percentage</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="percentage" class="form-control" value="{{old('percentage', isset($user8) ? $user8->percentage : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="input-block-wrap">--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <label class="col-sm-3 col-form-label">Skill 02</label>--}}
                                                {{--                                                            <div class="col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Skill Name</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" class="form-control" >--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Percentage</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" class="form-control" >--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="input-block-wrap">--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <label class="col-sm-3 col-form-label">Skill 03</label>--}}
                                                {{--                                                            <div class="col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Skill Name</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" class="form-control" >--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Percentage</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" class="form-control" >--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="input-block-wrap">--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <label class="col-sm-3 col-form-label">Skill 04</label>--}}
                                                {{--                                                            <div class="col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Skill Name</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" class="form-control" >--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Percentage</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" class="form-control" >--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="row">--}}
                                                {{--                                                        <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                            <div class="buttons">--}}
                                                {{--                                                                <button class="primary-bg">Save Update</button>--}}
                                                {{--                                                                <button class="" data-dismiss="modal">Cancel</button>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="special-qualification dashboard-section details-section">
                            <h4><i data-feather="gift"></i>Special Qualification</h4>
                            <ul>
                                @if($candidate_special_qualifications != '')
                                    <li>{{old('qualification_name', isset($candidate_special_qualifications) ? $candidate_special_qualifications->qualification_name : '')}}</li>

                            </ul>
                        @endif
                        <!-- Button trigger modal -->
                        {{--                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-qualification">--}}
                        {{--                                <i data-feather="edit-2"></i>--}}
                        {{--                            </button>--}}
                        <!-- Modal -->
                            <div class="modal fade" id="modal-qualification" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="align-left"></i>Special Qualification</h4>
                                                <a href="#" class="add-more ">+ Add Another</a>
                                                {{--                                                <a href="">Click to Clone</a>--}}
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
                                                {{--                                                <form action="{{isset($user7) ? route('edit_self_qualification', Auth::user()->id)  : route('edit_self_qualification', Auth::user()->id)}}" method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    --}}{{--                                                    <fieldset id="qualification">--}}
                                                {{--                                                    <div class="form-group row" id="dive">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Type Here</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <div class="input-group">--}}
                                                {{--                                                                <div class="input-group-prepend">--}}
                                                {{--                                                                    <div class="input-group-text">01</div>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                                <input type="text" name="qualification_name" class="form-control" value="{{old('qualification_name', isset($user7) ? $user7->qualification_name : '')}}">--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    --}}{{--                                                    </fieldset>--}}
                                                {{--                                                    <div class="row">--}}
                                                {{--                                                        <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                            <div class="buttons">--}}
                                                {{--                                                                <button class="primary-bg ">Save Update</button>--}}
                                                {{--                                                                <button class="" data-dismiss="modal">Cancel</button>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio dashboard-section details-section">
                            <h4><i data-feather="gift"></i>Portfolio</h4>
                            <div class="portfolio-slider owl-carousel">
                                @if($candidate_portfolios != '')
                                    <div class="portfolio-item">
                                        {{--                                        <img src="{{$candidate_portfolios->avatar}}" class="img-fluid" alt="">--}}
                                        <img src="{{old('avatar', isset($candidate_portfolios) ? $candidate_portfolios->avatar : '')}}" class="img-fluid" alt="">
                                        <div class="overlay">
                                            <a href="#"><i data-feather="eye"></i></a>
                                            <a href="#"><i data-feather="link"></i></a>
                                        </div>
                                    </div>
                                @endif
                                <div class="portfolio-item">
                                    <img src="{{asset('asset/images/portfolio/thumb-1.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-item">
                                    <img src="{{asset('asset/images/portfolio/thumb-2.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-item">
                                    <img src="{{asset('asset/images/portfolio/thumb-3.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-item">
                                    <img src="{{asset('asset/images/portfolio/thumb-2.jpg')}}" class="img-fluid" alt="">
                                    <div class="overlay">
                                        <a href="#"><i data-feather="eye"></i></a>
                                        <a href="#"><i data-feather="link"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                        {{--                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-portfolio">--}}
                        {{--                                <i data-feather="edit-2"></i>--}}
                        {{--                            </button>--}}
                        <!-- Modal -->
                            <div class="modal fade modal-portfolio" id="modal-portfolio" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="grid"></i>Portfolio</h4>
                                                <a href="#" class="add-more">+ Add Another</a>
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
                                                {{--                                                <form action="{{isset($user5) ? route('edit_portfolio', Auth::user()->id)  : route('edit_portfolio', Auth::user()->id)}}" method="post" enctype="multipart/form-data">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <div class="input-block-wrap">--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <label class="col-sm-3 col-form-label">Portfolio 01</label>--}}
                                                {{--                                                            <div class="col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Title</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="title" class="form-control" value="{{old('title', isset($user5) ? $user5->title : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Image</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <div class="upload-profile-photo">--}}
                                                {{--                                                                        <div class="update-photo">--}}
                                                {{--                                                                            --}}{{--                                                                            <img class="image" src="{{asset('asset/images/portfolio/thumb-1.jpg')}}" alt="">--}}
                                                {{--                                                                            <img class="image" src="{{old('avatar', isset($user5) ? $user5->avatar : '')}}" alt="">--}}
                                                {{--                                                                        </div>--}}
                                                {{--                                                                        <div class="file-upload">--}}
                                                {{--                                                                            <input type="file" name="avatar" class="file-input">Change Avatar--}}
                                                {{--                                                                        </div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="form-group row">--}}
                                                {{--                                                            <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                                <div class="input-group">--}}
                                                {{--                                                                    <div class="input-group-prepend">--}}
                                                {{--                                                                        <div class="input-group-text">Link</div>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <input type="text" name="link" class="form-control" value="{{old('link', isset($user5) ? $user5->link : '')}}">--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="row">--}}
                                                {{--                                                        <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                            <div class="buttons">--}}
                                                {{--                                                                <button class="primary-bg">Save Update</button>--}}
                                                {{--                                                                <button class="" data-dismiss="modal">Cancel</button>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="personal-information dashboard-section last-child details-section">
                            <h4><i data-feather="user-plus"></i>Personal Deatils</h4>
                            <ul>
                                @if($candidate_personal_informations != '')
                                    <li><span>Full Name:</span> {{old('full_name', isset($candidate_personal_informations) ? $candidate_personal_informations->full_name : '') }}</li>
                                    <li><span>Father's Name:</span> {{old('father_name', isset($candidate_personal_informations) ? $candidate_personal_informations->father_name : '')}}</li>
                                    <li><span>Mother's Name:</span> {{old('mother_name', isset($candidate_personal_informations) ? $candidate_personal_informations->mother_name : '')}}</li>
                                    <li><span>Date of Birth:</span> {{old('DOB', isset($candidate_personal_informations) ? $candidate_personal_informations->DOB : '') }}</li>
                                    <li><span>Nationality:</span> {{old('nationality', isset($candidate_personal_informations) ? $candidate_personal_informations->nationality : '') }} </li>
                                    <li><span>Sex:</span> {{old('age', isset($candidate_personal_informations) ? $candidate_personal_informations->age : '') }}</li>
                                    <li><span>Address:</span> {{old('address', isset($candidate_personal_informations) ? $candidate_personal_informations->address : '')}}</li>
                                @endif
                            </ul>
                            <!-- Button trigger modal -->
                        {{--                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-personal-details">--}}
                        {{--                                <i data-feather="edit-2"></i>--}}
                        {{--                            </button>--}}
                        <!-- Modal -->
                            <div class="modal fade" id="modal-personal-details" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="user-plus"></i>Personal Details</h4>
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
                                                {{--                                                <form action="{{isset($user4) ? route('edit_personal_details', Auth::user()->id)  : route('edit_personal_details', Auth::user()->id)}}" method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Full Name</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="full_name" class="form-control"  placeholder="Micheal N. Taylor" value="{{old('full_name', isset($user4) ? $user4->full_name : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Father’s Name</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="father_name" class="form-control"  placeholder="Howard Armour" value="{{old('father_name', isset($user4) ? $user4->father_name : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Mother’s Name</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="mother_name" class="form-control"  placeholder="Megan Higbee" value="{{old('mother_name', isset($user4) ? $user4->mother_name : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Date Of Birth</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="DOB" class="form-control"  placeholder="22/08/1992" value="{{old('DOB', isset($user4) ? $user4->DOB : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Nationality</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="nationality" class="form-control"  placeholder="American" value="{{old('nationality', isset($user4) ? $user4->nationality : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Gender</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="gender" class="form-control"  placeholder="Male" value="{{old('gender', isset($user4) ? $user4->gender : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Age</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="age" class="form-control"  placeholder="25 Years" value="{{old('age', isset($user4) ? $user4->age : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="form-group row">--}}
                                                {{--                                                        <label class="col-sm-3 col-form-label">Address</label>--}}
                                                {{--                                                        <div class="col-sm-9">--}}
                                                {{--                                                            <input type="text" name="address" class="form-control"  placeholder="2018 Nelm Street, Beltsville, VA 20705" value="{{old('address', isset($user4) ? $user4->address : '')}}">--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div class="row">--}}
                                                {{--                                                        <div class="offset-sm-3 col-sm-9">--}}
                                                {{--                                                            <div class="buttons">--}}
                                                {{--                                                                <button class="primary-bg">Save Update</button>--}}
                                                {{--                                                                <button class="" data-dismiss="modal">Cancel</button>--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="dashboard-sidebar">--}}
{{--                                                <div class="user-info">--}}
{{--                                                    <div class="thumb">--}}
{{--                                                        <img src="{{asset('dashboard/images/user-1.jpg')}}" class="img-fluid" alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="user-body">--}}
{{--                                                        <h5>Lula Wallace</h5>--}}
{{--                                                        <span>@username</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="profile-progress">--}}
{{--                                                    <div class="progress-item">--}}
{{--                                                        <div class="progress-head">--}}
{{--                                                            <p class="progress-on">Profile</p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="progress-body">--}}
{{--                                                            <div class="progress">--}}
{{--                                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>--}}
{{--                                                            </div>--}}
{{--                                                            <p class="progress-to">70%</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                        <div class="dashboard-menu">--}}
{{--                            <ul>--}}
{{--                                                            <li><i class="fas fa-home"></i><a href="{{url('employee/dashboard',encrypt(Auth::user()->id))}}">Dashboard</a></li>--}}
{{--                                                            <li><i class="fas fa-user"></i><a href="{{url('employee/editprofile',encrypt(Auth::user()->id))}}">Edit Profile</a></li>--}}
{{--                                                            <li><i class="fas fa-briefcase"></i><a href="{{url('employee/managejob', encrypt(Auth::user()->id))}}">Manage Jobs</a></li>--}}
{{--                                                            <li class="active"><i class="fas fa-users"></i><a href="{{url('employee/manageCandidate', encrypt(Auth::user()->id))}}">Manage Candidates</a></li>--}}
{{--                                                            <li><i class="fas fa-heart"></i><a href="{{url('employee/shortListedResume', encrypt(Auth::user()->id))}}">Shortlisted Resumes</a></li>--}}
{{--                                                            <li><i class="fas fa-plus-square"></i><a href="{{url('employee/postjob', encrypt(Auth::user()->id))}}">Post New Job</a></li>--}}
{{--                                                            <li><i class="fas fa-comment"></i><a href="{{url('employee/message', encrypt(Auth::user()->id))}}">Message</a></li>--}}
{{--                                                            <li><i class="fas fa-calculator"></i><a href="{{url('employee/pricing', encrypt(Auth::user()->id))}}">Pricing Plans</a></li>--}}
{{--                            <!--                    <li><i class="fas fa-comment"></i><a href="support-message_NO_NEED.php">Message</a></li> -->--}}
{{--                            </ul>--}}
{{--                            <ul class="delete">--}}
{{--                                                                <li><i class="fas fa-power-off"></i><a href="index.php">Logout</a></li>--}}
{{--                                                                <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Profile</a></li>--}}
{{--                            </ul>--}}
{{--                            <!-- Modal -->--}}
{{--                            <div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--                                <div class="modal-dialog" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <h4><i data-feather="trash-2"></i>Delete Account</h4>--}}
{{--                                            <p>Are you sure! You want to delete your profile. This can't be undone!</p>--}}
{{--                                            <form action="#">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="password" class="form-control" placeholder="Enter password">--}}
{{--                                                </div>--}}
{{--                                                <div class="buttons">--}}
{{--                                                    <button class="delete-button">Save Update</button>--}}
{{--                                                    <button class="" data-dismiss="modal">Cancel</button>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group form-check">--}}
{{--                                                    <input type="checkbox" class="form-check-input" checked="">--}}
{{--                                                    <label class="form-check-label">You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></label>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
<!-- Call to Action End -->

<!-- Footer -->
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

