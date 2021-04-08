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
                    <h1>Edit Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('candidatedashboardd', Auth::user()->id)}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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
{{--                        <form action="{{route('edit_profile', $user->user_id)}}" method="post" class="dashboard-form">--}}
{{--                        <form action="{{isset($user) ? '/edit_profile/' . $user->id : '/edit_profile'}}" method="post" class="dashboard-form">--}}
                        <form action="{{isset($user) ? route('edit_profile', Auth::user()->id)  : route('edit_profile', Auth::user()->id)}}" method="post" class="dashboard-form" enctype="multipart/form-data">
                            @csrf
                            <div class="dashboard-section upload-profile-photo">
                                <div class="update-photo">
                                    @if(Auth::user()->avatar !=null)
                                    <img class="image" src="{{ asset('images/'.Auth::user()->avatar) }}" alt="">

                                    @else
                                    <img class="image" src="{{asset('dashboard/images/user-1.jpg')}}" alt="">
                                    @endif
                                </div>
                                <div class="file-upload">
                                    <input   type="file" name="avatar" class="file-input">Change Avatar
                                </div>
                            </div>
                            <div class="dashboard-section basic-info-input">







                                <h4><i data-feather="user-check"></i>Basic Info</h4>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Full Name</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <input type="text" name="full_name" class="form-control" placeholder="Full Name" value="{{$user->full_name}}">--}}
{{--                                        <input type="text" name="full_name" class="form-control" placeholder="Full Name" value="{{old('full_name', isset($user) ? $user->full_name : '')}}" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" disabled class="form-control" placeholder="username" value="{{ Auth::user()->name }} ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" disabled class="form-control" placeholder="email@example.com" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
{{--                                        <input type="tel" maxlength="11" minlength="11" name="phoneNo" class="form-control" pattern="[0-9]{4}[0-9]{7}" placeholder="03001234567" value="{{$user->phoneNo}}">--}}
                                        <input type="tel" maxlength="11" minlength="11" name="phoneNo" class="form-control" pattern="[0-9]{4}[0-9]{7}" placeholder="03001234567" value="{{old('phoneNo', isset($user) ? $user->phoneNo : '')}}" required>
{{--                                        <input type="tel" maxlength="11" minlength="11"  name="phoneNo" placeholder="03001234567" pattern="[0-9]{4}[0-9]{7}" value="">--}}
                                        <small>Format: 03151234567</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">2nd Phone</label>
                                    <div class="col-sm-9">
                                        <input type="tel" maxlength="11" minlength="11" name="phoneNo2" class="form-control" pattern="[0-9]{4}[0-9]{7}" placeholder="03001234567" value="{{old('phoneNo2', isset($user) ? $user->phoneNo2 : '')}}">
                                        <small>Format: 03151234567</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">3rd Phone</label>
                                    <div class="col-sm-9">
                                        <input type="tel" maxlength="11" minlength="11" name="phoneNo3" class="form-control" pattern="[0-9]{4}[0-9]{7}" placeholder="03001234567" value="{{old('phoneNo3', isset($user) ? $user->phoneNo3 : '')}}">
                                        <small>Format: 03151234567</small>
                                    </div>
                                </div>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Address</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <input type="text" name="address" class="form-control" placeholder="Washington D.C" value="{{$user->address}}">--}}
{{--                                        <input type="text" name="address" class="form-control" placeholder="Washington D.C" value="{{old('full_name', isset($user) ? $user->address : '')}}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Indestry Expertise</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <input type="text" name="industry_expertise" class="form-control" placeholder="UI & UX Designer" value="{{$user->industry_expertise}}">--}}
{{--                                        <input type="text" name="industry_expertise" class="form-control" placeholder="UI & UX Designer" value="{{old('industry_expertise', isset($user) ? $user->industry_expertise : '')}}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">About Me</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <textarea class="form-control" name="about_me" placeholder="Introduce Yourself">{{$user->about_me}}</textarea>--}}
{{--                                        <textarea class="form-control" name="about_me" placeholder="Introduce Yourself">{{old('about_me', isset($user) ? $user->about_me : '')}}</textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="dashboard-section basic-info-input">
                                <h4><i data-feather="lock"></i>Change Password</h4>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Retype Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="new_password_confirmation" class="form-control" placeholder="Retype Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button class="button">Save Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                        @include("common.side_bar_candidate")

                </div>
            </div>
        </div>
    </div>
</div>

@include('common.footer')
@include('common.footerLibraries')
</body>
</html>
