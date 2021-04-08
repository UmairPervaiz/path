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

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/tagify.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{--    multi dropdown --}}
    <link href="https://cdn.syncfusion.com/ej2/material.css" rel="stylesheet">

{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">--}}

    <style>
        body{
            touch-action:none;
        }
    </style>
{{--    <iframe width="158" height="49" scrolling="no" role="presentation" src="https://mdbootstrap.com/api/snippets/embed/2156660" frameborder="0" allowtransparency></iframe>--}}
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



        /*!** demo styling *!*/
        /*body {*/
        /*    padding: 10px;*/
        /*    font: 16px/1.21 'Helvetica Neue',helvetica,arial,sans-serif;*/
        /*}*/
        /*fieldset {*/
        /*    padding: 10px;*/
        /*    border: none;*/
        /*}*/
        /*label {*/
        /*    display: inline-block;*/
        /*    width: 3.5em;*/
        /*    text-align: right;*/
        /*    padding: 0 5px;*/
        /*}*/
        /*input {*/
        /*    display: inline-block;*/
        /*    padding: 2px;*/
        /*    margin: 2px 0;*/
        /*    background: #FFF;*/
        /*    border: 1px solid #CCC;*/
        /*    width: 16em;*/
        /*    font: inherit;*/
        /*    border-radius: 2px;*/
        /*    box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);*/
        /*}*/
        /*input:focus, .tags-input.focus {*/
        /*    border-color: #59F;*/
        /*    outline: none;*/
        /*}*/


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
                    <h1>Edit Resume</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('candidatedashboardd', Auth::user()->id)}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Resume</li>
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
                <div class="dashboard-container">
                    <div class="dashboard-content-wrapper">

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

{{--                        <form action="#" method="post">--}}
{{--                            @csrf--}}
                        <div class="skill-and-profile dashboard-section">
                            <div class="skill">
                                <label>Skills:</label>
{{--                                <a href="#">{{old('skill', isset($user9) ? $user9->skill : '')}}</a>--}}
{{--                                <a href="#">Illustration</a>--}}
{{--                                <a href="#">iOS</a>--}}
                                <!-- Button trigger modal -->
                                @if($user9 != '')
                                    @foreach($candidateSkills as $skill)
                                        <a href="#">{{$skill->skill }}</a>
                                    @endforeach
                                @endif
                                <button type="button" class="btn btn-primary edit-button" data-toggle="modal" data-target="#modal-skill">
                                    <i data-feather="edit-2"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-skill" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="title">
                                                    <h4><i data-feather="git-branch"></i>MY SKILL</h4>
                                                    {{-- <a href="#" class="add-more">+ Add Skills</a> --}}
                                                </div>
                                                <div class="content">
                                                        <form action="{{isset($user9) ? route('skills', Auth::user()->id)  : route('skills', Auth::user()->id)}}" method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Select Skills</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <select  name="skills[]" multiple="multiple" id="skills" class=" form-control" style="width:100% ">
                                                                        @foreach($skills as $skill)
                                                                            <option value="{{$skill->name}}"
                                                                                @foreach ($candidateSkills as $cSkill)
                                                                                    @if($cSkill->skill == $skill->name)
                                                                                        selected
                                                                                    @endif
                                                                                @endforeach
                                                                            >{{$skill->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Type Skills</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    @php
                                                                            $diff_result = array_diff_assoc((array)$cSkill, (array)$skills);
                                                                    @endphp
                                                                    <input type="text" name="skill_name" class="form-control"  placeholder="Add comma if Skills are more than one" value="">

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
{{--                        </form>--}}
                        <div class="about-details details-section dashboard-section">
                            <h4><i data-feather="align-left"></i>About Me</h4>
                            <p>{{old('about', isset($user) ? $user->about : '')}}</p>
{{--                            <p>{{$user->about_me}}</p>--}}
{{--                            <p>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable </p>--}}
                            <div class="information-and-contact">
                                <div class="information">
                                    <h4>Information</h4>
                                    <ul>
                                        <li><span>Professional industry :</span> {{old('category', isset($user) ? $user->category : '')}}</li>
                                        <li><span>Current location:</span> {{old('location', isset($user) ? $user->location : '')}}</li>
                                        <li><span>Career Level:</span> {{old('location', isset($user) ? $user->career_level : '')}}</li>
{{--                                        <li><span>Status:</span> {{old('status', isset($user) ? $user->status : '')}}</li>--}}
                                        <li><span>Experience:</span> {{old('experience', isset($user) ? $user->experience : '')}}</li>
                                        <li><span>Last Salary:</span> {{old('salary', isset($user) ? $user->salary : '')}}</li>
                                        <li><span>Expected Salary:</span> {{old('salary', isset($user) ? $user->expected_salary : '')}}</li>
{{--                                        <li><span>Gender:</span> {{old('gender', isset($user) ? $user->gender : '')}}</li>--}}
                                        <li><span>Age:</span> {{old('age', isset($user) ? $user->age : '')}}</li>
                                        <li><span>Qualification:</span> {{old('qualification', isset($user) ? $user->qualification : '')}}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-about-me">
                                <i data-feather="edit-2"></i>
                            </button>
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
                                                <form action="{{isset($user) ? route('edit_about_us', Auth::user()->id)  : route('edit_about_us', Auth::user()->id)}}" method="post">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Personal summary</label>
                                                        <div class="col-sm-9">
                                                            <textarea maxlength="255" name="about" class="form-control" placeholder="Write Yourself" >{{old('about', isset($user) ? $user->about : '')}}</textarea>
                                                        </div>
                                                    </div>
                                                    <h4><i data-feather="align-left"></i>Information</h4>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Professional industry </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="category" class="form-control"  placeholder="Design &amp; Creative" value="{{old('category', isset($user) ? $user->category : '')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Current location</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="location" class="form-control"  placeholder="Los Angeles" value="{{old('location', isset($user) ? $user->location : '')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Country of Interest</label>
                                                        <div class="col-sm-9">
                                                            {{--                                                            <input type="text" name="status" class="form-control"  placeholder="Full Time" value="{{old('status', isset($user) ? $user->status : '')}}">--}}
                                                            <select name="country_of_interest[]" multiple="multiple"  id="country_name" class="form-control" style="width:100% " required>
                                                                <option value="" disabled>Country names</option>
                                                                @foreach($country as $country)
                                                                    @if (isset($country_array))
                                                                    <option value="{{$country->name}}"
                                                                                @foreach($country_array as $value)
                                                                                    {{$value == $country->name  ? 'selected' : ''}}
                                                                                 @endforeach
                                                                    >{{$country->name}}</option>
                                                                        @else
                                                                        <option value="{{$country->name}}"
                                                                        >{{$country->name}}</option>
                                                                        @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Career level</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="text" name="status" class="form-control"  placeholder="Full Time" value="{{old('status', isset($user) ? $user->status : '')}}">--}}
                                                            <select name="career_level" class="form-control">
                                                                <option value="">Career level</option>


                                                                @foreach($careerlevels as $careerlevel)
                                                                        @if (isset($user->career_level))
                                                                            <option value="{{$careerlevel->name}}" {{$user->career_level == $careerlevel->name  ? 'selected' : ''}}>{{$careerlevel->name}}</option>
                                                                        @else
                                                                            <option value="{{$careerlevel->name}}" >{{$careerlevel->name}}</option>
                                                                        @endif
                                                                    @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Experience</label>
                                                        <div class="col-sm-9">
                                                            <select name="experience" class="form-control">
                                                                <option value="">Experience (Optional)</option>
                                                                @foreach($job_experiences as $job_experience)
                                                                    @if (isset($user->experience))
                                                                        <option value="{{$job_experience->year}}" {{$user->experience == $job_experience->year  ? 'selected' : ''}}>{{$job_experience->year}}</option>
                                                                    @else
                                                                        <option value="{{$job_experience->year}}" >{{$job_experience->year}}</option>
                                                                    @endif
                                                                @endforeach

{{--                                                                @foreach($job_experiences as $job_experience)--}}
{{--                                                                    <option value="{{$job_experience->year}}" {{$user->experience == $job_experience->year  ? 'selected' : ''}}>{{$job_experience->year}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
{{--                                                            <input type="text" name="experience" class="form-control"  placeholder="3 Year" value="{{old('experience', isset($user) ? $user->experience : '')}}">--}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Last Salary</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="salary" class="form-control"  placeholder="30k - 40k" value="{{old('salary', isset($user) ? $user->salary : '')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Expected Salary</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="text" name="salary" class="form-control"  placeholder="30k - 40k" value="{{old('salary', isset($user) ? $user->salary : '')}}">--}}
                                                            <select name="expected_salary" class="form-control">
                                                                <option value="">Salary Range</option>
                                                                @foreach($salaryranges as $salaryrange)
                                                                    @if (isset($user->expected_salary))
                                                                        <option value="{{$salaryrange->range}}" {{$user->expected_salary == $salaryrange->range  ? 'selected' : ''}}>{{$salaryrange->range}}</option>
                                                                    @else
                                                                        <option value="{{$salaryrange->range}}" >{{$salaryrange->range}}</option>
                                                                    @endif
                                                                @endforeach

{{--                                                                @foreach($salaryranges as $salaryrange)--}}
{{--                                                                    <option value="{{$salaryrange->range}}" {{$user->expected_salary == $salaryrange->range  ? 'selected' : ''}}>{{$salaryrange->range}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Age</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" name="age" class="form-control" value="{{old('age', isset($user) ? $user->age : '')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Qualification</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="text" name="qualification" class="form-control"  placeholder="Gradute" value="{{old('qualification', isset($user) ? $user->qualification : '')}}">--}}
                                                            <select name="qualification" class="form-control">
                                                                <option value="">Qualification</option>
                                                                @foreach($qualifications as $qualification)
                                                                    @if (isset($user->qualification))
                                                                        <option value="{{$qualification->name}}" @if($qualification->name == 'No Certificate Required') hidden  @endif {{$user->qualification == $qualification->name  ? 'selected' : ''}}>{{$qualification->name}}</option>
                                                                    @else
                                                                        <option value="{{$qualification->name}}" >{{$qualification->name}}</option>
                                                                    @endif
                                                                @endforeach

{{--                                                                @foreach($qualifications as $qualification)--}}
{{--                                                                    <option value="{{$qualification->name}}" @if($qualification->name == 'No Certificate Required') hidden  @endif {{$user->qualification == $qualification->name  ? 'selected' : ''}}>{{$qualification->name}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Languages</label>
                                                        <div class="col-sm-9">
                                                            <select name="language[]" multiple="multiple"  id="language" class="form-control" style="width:100% " required>
                                                                <option value="" disabled>Language</option>
                                                                @foreach($languages as $language)
                                                                    <option value="{{$language->name}}" @if (isset($candidateLanguage)) @foreach($candidateLanguage as $value) {{$value == $language->name  ? 'selected' : ''}} @endforeach @endif  >{{$language->name}}</option>
                                                                @endforeach
                                                            </select>
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
                        <div class="edication-background details-section dashboard-section">
                            <h4><i data-feather="book"></i>Education Background</h4>
                            <br>


                            @foreach ($candidateEducations as $item)
                                <div class="education-label">
                                    <span class="study-year">Starting Date: {{ \Carbon\Carbon::parse($item->starting_date)->format('l, M d, Y') }}</span><br>
                                    <span class="study-year">Ending Date: {{ \Carbon\Carbon::parse($item->ending_date)->format('l, M d, Y') }}</span>
                                    <h5>{{$item->title}}<span> {{$item->institution}}</span></h5>
                                    <p>{{ $item->description}}</p>
                                </div>
                            @endforeach

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-education">
                                <i data-feather="edit-2"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade modal-education" id="modal-education" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="book"></i>Education</h4>
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
                                                <form action="{{isset($user2) ? route('edit_education_background', Auth::user()->id)  : route('edit_education_background', Auth::user()->id)}}" method="post">
                                                   @csrf
                                                   <div class="repeater-default" style="width:100%">
                                                        <div class="" style="text-align: right">
                                                            <button style="background-color:rgba(36, 109, 248, 0.15);color:#dc3545 !important" type="button" data-repeater-create class="btn btn-primary add-more">+ Add Education</button>
                                                        </div>
                                                        <br>
                                                        <div data-repeater-list="candidate_educations">
                                                            @if(count($candidateEducations) > 0)
                                                                @foreach ($candidateEducations as $item)
                                                                    <div data-repeater-item class="input-block-wrap">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label"></label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Title</div>
                                                                                    </div>
                                                                                    <input type="text" name="title" class="form-control" required value="{{$item->title}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="offset-sm-3 col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Institute</div>
                                                                                    </div>
                                                                                    <input type="text" name="institution" class="form-control" required value="{{$item->institution}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-9 offset-sm-3">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Period</div>
                                                                                    </div>
{{--                                                                                    <input type="text" name="period" class="form-control" value="{{$item->period}}" required>--}}
                                                                                    <input type="date" name="starting_date" class="form-control" value="{{$item->starting_date}}" required>
                                                                                    {{--                                                                                    <label>Starting Date:</label>--}}
                                                                                    <input type="date" name="ending_date" id="ending_date" class="form-control"  value="{{$item->ending_date}}" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="offset-sm-3 col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Description</div>
                                                                                    </div>
                                                                                    <textarea maxlength="255" name="description" class="form-control" required>{{$item->description}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row" style="float: right">
                                                                            <button style="margin-right:10px" type="button" class="btn btn-danger" data-repeater-delete> Delete </button>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div data-repeater-item class="input-block-wrap">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"></label>
                                                                        <div class="col-sm-9">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">Title</div>
                                                                                </div>
                                                                                <input type="text" name="title" class="form-control" required value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-3 col-sm-9">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">Institute</div>
                                                                                </div>
                                                                                <input type="text" name="institution" class="form-control" required value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-9 offset-sm-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">Period</div>
                                                                                </div>
{{--                                                                                <input type="text" name="period" class="form-control" value="" required>--}}
                                                                                <input type="date" name="starting_date" class="form-control" value="" required>
                                                                                <input type="date" name="ending_date" id="ending_date" class="form-control"  value="" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-3 col-sm-9">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">Description</div>
                                                                                </div>
                                                                                <textarea maxlength="255" name="description" class="form-control" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row" style="float: right">
                                                                        <button style="margin-right:10px" type="button" class="btn btn-danger" data-repeater-delete> Delete </button>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            @endif

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
                        <div class="experience dashboard-section details-section">
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-experience">
                                <i data-feather="edit-2"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade modal-experience" id="modal-experience" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="briefcase"></i>Experience</h4>
                                            </div>
                                            <div class="content">
                                                <form action="{{isset($user3) ? route('edit_work_experience', Auth::user()->id)  : route('edit_work_experience', Auth::user()->id)}}" method="post">
                                                    @csrf
                                                    <div class="repeater-default-experience" style="width:100%">
                                                        <div class="" style="text-align: right">
                                                            <button style="background-color:rgba(36, 109, 248, 0.15);color:#dc3545 !important" type="button" data-repeater-create class="btn btn-primary add-more">+ Add Experience</button>
                                                        </div>
                                                        <br>
                                                        <div data-repeater-list="candidate_experiences">
                                                            @if(count($candidateExperiences) > 0)
                                                                @foreach ($candidateExperiences as $item)
                                                                    <div data-repeater-item class="input-block-wrap">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label"></label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Title</div>
                                                                                    </div>
                                                                                    <input type="text" name="title" class="form-control" required value="{{$item->title}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="offset-sm-3 col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Company</div>
                                                                                    </div>
                                                                                    <input type="text" name="company" class="form-control" required value="{{$item->company}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-9 offset-sm-3">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Period</div>
                                                                                    </div>

                                                                                    <input type="date" name="starting_date" class="form-control" value="{{$item->starting_date}}" required>
{{--                                                                                    <label>Starting Date:</label>--}}
                                                                                    <input type="date" name="ending_date" id="ending_date" class="form-control"  value="{{$item->ending_date}}" required>
{{--                                                                                    <input type="checkbox" id="present" name ="present" value="Present">--}}
                                                                                    <input type="text" name="present" class="form-control" placeholder="If present write present" value="">
{{--                                                                                    <label class="form-control">Present</label>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="offset-sm-3 col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Description</div>
                                                                                    </div>
                                                                                    <textarea maxlength="255" name="description" class="form-control" required>{{$item->description}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row" style="float: right">
                                                                            <button style="margin-right:10px" type="button" class="btn btn-danger" data-repeater-delete> Delete </button>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div data-repeater-item class="input-block-wrap">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"></label>
                                                                        <div class="col-sm-9">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">Title</div>
                                                                                </div>
                                                                                <input type="text" name="title" class="form-control" required value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-3 col-sm-9">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">Company</div>
                                                                                </div>
                                                                                <input type="text" name="company" class="form-control" required value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-9 offset-sm-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">Period</div>
                                                                                </div>
                                                                                <input type="date" name="starting_date" class="form-control" value="" required>
                                                                                <input type="date" name="ending_date" id="ending_date" class="form-control"  value="" required>
                                                                                <input type="checkbox" id="present" name ="present" value="Present">
                                                                                <label class="form-control">Present</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-3 col-sm-9">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">Description</div>
                                                                                </div>
                                                                                <textarea maxlength="255" name="description" class="form-control" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row" style="float: right">
                                                                        <button style="margin-right:10px" type="button" class="btn btn-danger" data-repeater-delete> Delete </button>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            @endif

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
                        <div class="professonal-skill dashboard-section details-section">
                            <h4><i data-feather="feather"></i>Professional Skill</h4>
                            <br>

                            @foreach ($professionalSkills as $item)
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

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-pro-skill">
                                <i data-feather="edit-2"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade modal-pro-skill" id="modal-pro-skill" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="feather"></i>Professional Skill</h4>
                                                {{-- <a href="#" class="add-more">+ Add Skill</a> --}}
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
                                                <form action="{{isset($user8) ? route('edit_professional_skills', Auth::user()->id)  : route('edit_professional_skills', Auth::user()->id)}}" method="post">
                                                    @csrf


                                                    <div class="repeater-default-skills" style="width:100%">
                                                        <div class="" style="text-align: right">
                                                            <button style="background-color:rgba(36, 109, 248, 0.15);color:#dc3545 !important" type="button" data-repeater-create class="btn btn-primary add-more">+ Add Another</button>
                                                        </div>
                                                        <br>
                                                        <div data-repeater-list="candidate_professional_skills">
                                                            @if(count($professionalSkills) > 0)
                                                                @foreach ($professionalSkills as $item)
                                                                    <div  data-repeater-item>

                                                                        <div class="input-block-wrap">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-3 col-form-label">About Skill</label>
                                                                                <div class="col-sm-9">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <div class="input-group-text">Description</div>
                                                                                        </div>
                                                                                        <textarea required maxlength="255"  name="description" class="form-control">{{ $item->description }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-block-wrap">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-3 col-form-label">Skill </label>
                                                                                <div class="col-sm-9">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <div class="input-group-text">Skill Name</div>
                                                                                        </div>
                                                                                        <input required type="text" name="skill_name" class="form-control" value="{{ $item->skill_name }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="offset-sm-3 col-sm-9">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <div class="input-group-text">Percentage</div>
                                                                                        </div>
                                                                                        <input required min="1" max="100" type="number" name="percentage" class="form-control" value="{{ $item->percentage }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row" style="float: right">
                                                                            <button style="margin-right:10px" type="button" class="btn btn-danger" data-repeater-delete> Delete </button>
                                                                        </div>
                                                                        <br>
                                                                    </div>

                                                                @endforeach
                                                            @else
                                                                <div  data-repeater-item>
                                                                    <div class="input-block-wrap">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">About Skill</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Description</div>
                                                                                    </div>
                                                                                    <textarea name="description" class="form-control"  required maxlength="255"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-block-wrap">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Skill </label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Skill Name</div>
                                                                                    </div>
                                                                                    <input type="text" name="skill_name" class="form-control" value=""  required >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="offset-sm-3 col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">Percentage</div>
                                                                                    </div>
                                                                                    <input type="number" name="percentage" class="form-control"  required >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

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


                        <div class="special-qualification dashboard-section details-section">
                            <h4><i data-feather="gift"></i>Special Qualification</h4>
                            <br>
                            <ul>
                                @foreach ($specialQualifications as $item)
                                    <li>{{$item->qualification_name}}</li>


                                @endforeach

{{--                                <li>Skilled at any Kind Design Tools.</li>--}}
{{--                                <li>Passion for people-centered design, solid intuition.</li>--}}
{{--                                <li>Hard Worker & Quick Lerner.</li>--}}
                            </ul>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-qualification">
                                <i data-feather="edit-2"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-qualification" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="align-left"></i>Special Qualification</h4>
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
                                                <form action="{{isset($user7) ? route('edit_self_qualification', Auth::user()->id)  : route('edit_self_qualification', Auth::user()->id)}}" method="post">
                                                    @csrf
{{--                                                    <fieldset id="qualification">--}}


                                                    <div class="repeater-default-special" style="width:100%">
                                                        <div class="" style="text-align: right">
                                                            <button style="background-color:rgba(36, 109, 248, 0.15);color:#dc3545 !important" type="button" data-repeater-create class="btn btn-primary add-more">+ Add Another</button>
                                                        </div>
                                                        <br>
                                                        <div data-repeater-list="candidate_special_qualifications">
                                                            @if(count($specialQualifications) > 0)
                                                                @foreach ($specialQualifications as $item)
                                                                    <div  data-repeater-item>
                                                                        <div class="form-group row" id="dive">
                                                                            <label class="col-sm-3 col-form-label">Type Here</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        {{-- <div class="input-group-text">01</div> --}}
                                                                                    </div>
                                                                                    <input type="text" name="qualification_name" class="form-control" required value="{{$item->qualification_name}}">
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <div class="form-group row" style="float: right">
                                                                            <button style="margin-right:10px" type="button" class="btn btn-danger" data-repeater-delete> Delete </button>
                                                                        </div>
                                                                        <br>
                                                                    </div>

                                                                @endforeach
                                                            @else
                                                                <div  data-repeater-item>
                                                                    <div class="form-group row" id="dive">
                                                                        <label class="col-sm-3 col-form-label">Type Here</label>
                                                                        <div class="col-sm-9">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    {{-- <div class="input-group-text">01</div> --}}
                                                                                </div>
                                                                                <input type="text" name="qualification_name" class="form-control" value="" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="offset-sm-3 col-sm-9">
                                                            <div class="buttons">
                                                                <button class="primary-bg ">Save Update</button>
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
                                            <a href="{{route('candidatePortfolioDelete', $item->id)}}" ><i data-feather="trash"></i></a>

                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-portfolio">
                                <i data-feather="edit-2"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade modal-portfolio" id="modal-portfolio" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="title">
                                                <h4><i data-feather="grid"></i>Portfolio</h4>
                                                {{--  <a href="#" class="add-more">+ Add Another</a>  --}}
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
                                                <form action="{{isset($user5) ? route('edit_portfolio', Auth::user()->id)  : route('edit_portfolio', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="repeater-default-portfolio" style="width:100%">
                                                        <div class="" style="text-align: right">
                                                            <button style="background-color:rgba(36, 109, 248, 0.15);color:#dc3545 !important" type="button" data-repeater-create class="btn btn-primary add-more">+ Add Another</button>
                                                        </div>
                                                        <br>
                                                        <div data-repeater-list="candidate_portfolios">

                                                            <div class="input-block-wrap" data-repeater-item>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Portfolio </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Title</div>
                                                                            </div>
                                                                            <input type="text" name="title" class="form-control" required @if(isset($user5->title)) value="{{$user5->title}}" @else value="" @endif>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="offset-sm-3 col-sm-9">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Image</div>
                                                                            </div>
                                                                            <div class="upload-profile-photo">
                                                                                <div class="update-photo">
                                                                                    @if (isset($user5->avatar))
                                                                                    <img src="{{ asset('images/'.$user5->avatar) }}" class="img-fluid" alt="">
                                                                                    @else
                                                                                        <img src="" class="img-fluid" alt="">
                                                                                    @endif
                                                                                </div>
                                                                                <div class="file-upload">
{{--                                                                                    @if (isset($user5->avatar))--}}
                                                                                        <input type="file" accept="image/*" name="avatar" class="file-input">Change Avatar
{{--                                                                                    @else--}}
{{--                                                                                        <input type="file" accept="image/*" name="avatar" class="file-input">Change Avatar--}}
{{--                                                                                    @endif--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="offset-sm-3 col-sm-9">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Link</div>
                                                                            </div>
                                                                            <input type="url" name="link" class="form-control" required @if(isset($user5->link)) value="{{$user5->link}}" @else value="" @endif>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row" style="float: right">
                                                                    <button style="margin-right:10px" type="button" class="btn btn-danger" data-repeater-delete> Delete </button>
                                                                </div>
                                                                <br>
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
                        <div class="personal-information dashboard-section last-child details-section">
                            <h4><i data-feather="user-plus"></i>Personal Deatils</h4>
                            @if($user4 !='')
                            <ul>
                                <li><span>First Name:</span> {{old('firstName', isset($user4) ? $user4->firstName : '')}}</li>
                                <li><span>Last Name:</span> {{old('lastName', isset($user4) ? $user4->lastName : '')}}</li>
                                <li><span>Father's Name:</span> {{old('father_name', isset($user4) ? $user4->father_name : '')}}</li>
                                <li><span>Date of Birth:</span> {{old('DOB', isset($user4) ? $user4->DOB : '')}}</li>
                                <li><span>Nationality:</span> {{old('nationality', isset($user4) ? $user4->nationality : '')}} </li>
                                <li><span>Gender:</span> {{old('gender', isset($user4) ? $user4->gender : '')}} </li>
                                <li><span>Marital Status:</span> {{old('maritalStatus', isset($user4) ? $user4->maritalStatus : '')}} </li>
                                <li><span>Dependents:</span> {{old('dependents', isset($user4) ? $user4->dependents : '')}} </li>
                                <li><span>Address:</span> {{old('age', isset($user4) ? $user4->address : '')}}</li>
                            </ul>
                            @endif
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-personal-details">
                                <i data-feather="edit-2"></i>
                            </button>
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
                                                <form action="{{isset($user4) ? route('edit_personal_details', Auth::user()->id)  : route('edit_personal_details', Auth::user()->id)}}" method="post">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">First Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="firstName" class="form-control"  placeholder="Micheal N. Taylor" value="{{old('firstName', isset($user4) ? $user4->firstName : '')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Last Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="lastName" class="form-control"  placeholder="Micheal N. Taylor" value="{{old('lastName', isset($user4) ? $user4->lastName : '')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Father’s Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="father_name" class="form-control"  placeholder="Howard Armour" value="{{old('father_name', isset($user4) ? $user4->father_name : '')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Date Of Birth</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="text" name="DOB" class="form-control"  placeholder="22/08/1992" value="{{old('DOB', isset($user4) ? $user4->DOB : '')}}">--}}
{{--                                                            <div class="form-group datepicker">--}}
                                                                <input type="date" name="DOB" class="form-control" value="{{old('DOB', isset($user4) ? $user4->DOB : '')}}">
{{--                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nationality</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="text" name="nationality" class="form-control"  placeholder="American" value="{{old('nationality', isset($user4) ? $user4->nationality : '')}}">--}}
                                                            <select name="nationality" class="form-control">
                                                                <option value="">Nationality</option>
                                                                @foreach($nationality as $nationality)
                                                                    @if (isset($user4->nationality))
                                                                        <option value="{{$nationality->name}}" {{$user4->nationality == $nationality->name  ? 'selected' : ''}}>{{$nationality->name}}</option>
                                                                    @else
                                                                        <option value="{{$nationality->name}}" >{{$nationality->name}}</option>
                                                                    @endif
                                                                @endforeach

{{--                                                                @foreach($nationality as $nationality)--}}
{{--                                                                    <option value="{{$nationality->name}}" {{$user4->nationality == $nationality->name  ? 'selected' : ''}}>{{$nationality->name}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Gender</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="text" name="gender" class="form-control"  placeholder="Male" value="{{old('gender', isset($user4) ? $user4->gender : '')}}">--}}
                                                            <select name="gender" class="form-control">
                                                                <option value="">Gender</option>
                                                                @foreach($genders as $gender)
                                                                    @if (isset($user4->gender))
                                                                        <option value="{{$gender->type}}" {{$user4->gender == $gender->type  ? 'selected' : ''}}>{{$gender->type}}</option>
                                                                    @else
                                                                        <option value="{{$gender->type}}" >{{$gender->type}}</option>
                                                                    @endif
                                                                @endforeach

{{--                                                                @foreach($genders as $gender)--}}
{{--                                                                    <option value="{{$gender->type}}" {{$user4->gender == $gender->type  ? 'selected' : ''}}>{{$gender->type}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Marital Status</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="text" name="gender" class="form-control"  placeholder="Male" value="{{old('gender', isset($user4) ? $user4->gender : '')}}">--}}
                                                            <select name="maritalStatus" class="form-control">
                                                                <option value="">Status</option>
                                                                @foreach($maritalstatus as $maritalstatus)
                                                                    @if (isset($user4->gender))
                                                                        <option value="{{$maritalstatus->name}}" {{$user4->maritalStatus == $maritalstatus->name  ? 'selected' : ''}}>{{$maritalstatus->name}}</option>
                                                                    @else
                                                                        <option value="{{$maritalstatus->name}}" >{{$maritalstatus->name}}</option>
                                                                    @endif
                                                                @endforeach

{{--                                                                @foreach($maritalstatus as $maritalstatus)--}}
{{--                                                                    <option value="{{$maritalstatus->name}}" {{$user4->maritalStatus == $maritalstatus->name  ? 'selected' : ''}}>{{$maritalstatus->name}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Number of Dependents</label>
                                                        <div class="col-sm-9">
{{--                                                            <input type="text" name="gender" class="form-control"  placeholder="Male" value="{{old('gender', isset($user4) ? $user4->gender : '')}}">--}}
                                                            <select name="dependents" class="form-control">
                                                                <option value="">Dependents</option>
                                                                @foreach($dependents as $dependent)
                                                                    @if (isset($user4->dependents))
                                                                        <option value="{{$dependent->number}}" {{$user4->dependents == $dependent->number  ? 'selected' : ''}}>{{$dependent->number}}</option>
                                                                    @else
                                                                        <option value="{{$dependent->number}}" >{{$dependent->number}}</option>
                                                                    @endif
                                                                @endforeach

{{--                                                                @foreach($dependents as $dependent)--}}
{{--                                                                    <option value="{{$dependent->number}}" {{$user4->dependents == $dependent->number  ? 'selected' : ''}}>{{$dependent->number}}</option>--}}
{{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="address" class="form-control"  placeholder="2018 Nelm Street, Beltsville, VA 20705" value="{{old('address', isset($user4) ? $user4->address : '')}}">
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
                    @include("common.side_bar_candidate")

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="{{asset('dashboard/js/tagify.min.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('js/map.js')}}"></script>

<script>
$(document).ready( function () {

    $('#skills').select2();
    $('#country_name').select2();
    $('#language').select2();

    // function disableButton() {
    //     let btn = document.getElementById('present');
    //     // btn.disabled = true;
    //     $('#ending_date').disable();
    // }

    $(document).on('click', '#present', function(event) {
        // event.preventDefault();
            if($(this).is(":checked")){
                document.getElementById('ending_date').disabled=true;
            }
            else if($(this).is(":not(:checked)")){
                document.getElementById('ending_date').disabled=false;
            }

    });


    $('.repeater-default').repeater({
        show: function () {
          $(this).slideDown();
        },
        hide: function (deleteElement) {
          if (confirm('Are you sure you want to delete this Item?')) {
            $(this).slideUp(deleteElement);
          }
        },
        isFirstItemUndeletable: true
    });

    $('.repeater-default-experience').repeater({
        show: function () {
          $(this).slideDown();
        },
        hide: function (deleteElement) {
          if (confirm('Are you sure you want to delete this Item?')) {
            $(this).slideUp(deleteElement);
          }
        },
        isFirstItemUndeletable: true
    });

    $('.repeater-default-special').repeater({
        show: function () {
          $(this).slideDown();

        },
        hide: function (deleteElement) {
          if (confirm('Are you sure you want to delete this Item?')) {
            $(this).slideUp(deleteElement);
          }
        },
        isFirstItemUndeletable: true
    });

    $('.repeater-default-skills').repeater({
        show: function () {
          $(this).slideDown();

        },
        hide: function (deleteElement) {
          if (confirm('Are you sure you want to delete this Item?')) {
            $(this).slideUp(deleteElement);
          }
        },
        isFirstItemUndeletable: true
    });

    $('.repeater-default-portfolio').repeater({
        show: function () {
          $(this).slideDown();

        },
        hide: function (deleteElement) {
          if (confirm('Are you sure you want to delete this Item?')) {
            $(this).slideUp(deleteElement);
          }
        },
        isFirstItemUndeletable: true
    });
});
</script>

</body>
</html>

<script>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });

</script>

