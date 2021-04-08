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
                    <h1>Edit Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt($user->id))}}">Home</a></li>
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
{{--@include('common.after_header_employer')--}}
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



                        <form action="{{route('editprofile',encrypt($user->id))}}" method="post" class="dashboard-form" enctype="multipart/form-data">
                            @csrf
                            <div class="dashboard-section upload-profile-photo">
                                <div class="update-photo">
                                    @if(Auth::user()->avatar !=null)
                                    <img class="image" src="{{ asset('images/'.Auth::user()->avatar) }}" alt="">
                                    @else
                                    <img class="image" src="{{asset('dashboard/images/company-logo.png')}}" alt="">
                                    @endif
                                </div>
                                <div class="file-upload">
                                    <input type="file" name="avatar" class="file-input">Change Avatar
                                </div>
                            </div>
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


                                <h4><i data-feather="user-check"></i>Basic Info</h4>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Company Name</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <input type="text" name="companyname" class="form-control "  placeholder="Company Name" value="{{old('companyname', isset($user) ? $user->companyname  : '') }}" required>--}}
{{--                                        <input type="text" name="companyname" class="form-control "  placeholder="Company Name"  @if($user->companyname != '' )   value="{{ $user->companyname  }}" disabled  @endif  required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                        <label class="col-sm-3 col-form-label">Country</label>--}}
{{--                                        <div class="col-sm-9">--}}
{{--                                            --}}{{--                                        <input type="text" name="category" class="form-control " placeholder="UI & UX Designer" value="{{old('category', isset($user) ? $user->category : '')}}">--}}
{{--                                            <select name="country_name" class="form-control" required>--}}
{{--                                                <option value="">Select Country</option>--}}
{{--                                                @foreach($country as $country)--}}
{{--                                                    <option value="{{$country->name}}" {{$user->country_name == $country->name  ? 'selected' : ''}}>{{$country->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                </div>--}}
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Full name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" disabled class="form-control" placeholder="@username" value="{{ Auth::user()->name }} ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" disabled class="form-control" placeholder="email@example.com" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
{{--                                 <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Company Email Address</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <input type="text" name="companyEmail"  class="form-control" placeholder="email@example.com" value="{{ Auth::user()->companyEmail }}">--}}
{{--                                        <input type="email" name="companyEmail"  class="form-control" placeholder="email@example.com" value="{{old('companyEmail', isset($user) ? $user->companyEmail : '')}}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Company Phone No.</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <input type="text"  class="form-control" placeholder="+55 123 4563 4643">--}}
{{--                                        <input type="tel" maxlength="11" minlength="11"  name="companyPhoneNo" placeholder="03001234567" pattern="[0-9]{4}[0-9]{7}" value="{{old('companyPhoneNo', isset($user) ? $user->companyPhoneNo : '')}}" required>--}}
{{--                                        <small>Format: 03151234567</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Contact name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="contactPersonName" class="form-control "  placeholder="Contact username"  value="{{old('contactPersonName', isset($user) ? $user->contactPersonName : '')}}" required>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Contact Phone No.</label>
                                    <div class="col-sm-9">
{{--                                        <input type="text"  class="form-control" placeholder="+55 123 4563 4643">--}}
                                        <input type="tel" maxlength="11" minlength="11"  name="phoneNo" placeholder="03001234567" pattern="[0-9]{4}[0-9]{7}" value="{{old('phoneNo', isset($user) ? '0'.$user->phoneNo : '')}}" required>
                                        <small>Format: 03151234567</small>
                                    </div>
                                </div>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Company Address</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <input type="text" name="address" class="form-control "  placeholder="Washington D.C"  value="{{old('address', isset($user) ? $user->address : '')}}" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Bussiness Category</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <input type="text" name="category" class="form-control " placeholder="UI & UX Designer" value="{{old('category', isset($user) ? $user->category : '')}}">--}}
{{--                                        <select name="category" class="form-control" required>--}}
{{--                                            <option value="">Select Category</option>--}}
{{--                                            @foreach($category as $category)--}}
{{--                                                <option value="{{$category->category}}" {{$user->category == $category->category  ? 'selected' : ''}}>{{$category->category}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Bussiness Category</label>
                                        <div class="col-sm-9">
{{--                                            <input type="text" name="companyname" class="form-control "  placeholder="Company Name" value="{{old('companyname', isset($user) ? $user->companyname : '') }}" required>--}}
                                            @foreach($category as $category)
                                                <div class="col-sm-6">
{{--                                                    @foreach($category_array as $category_array)--}}
                                            <input @if (in_array($category->category , $category_array)) checked @endif  type="checkbox" id="{{$category->id}}"  name ="category[]" value="{{$category->category}}">
                                                    <label >{{$category->category}}</label>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">About Us</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <textarea class="form-control" name="aboutus" placeholder="" > {{ Str::limit(old('aboutus', isset($user) ? $user->aboutus : ''))}}</textarea>--}}
{{--                                        <textarea class="form-control" name="aboutus" placeholder="" required> {{ \Illuminate\Support\Str::limit(old('aboutus', isset($user) ? $user->aboutus : ''),255 )}}</textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Your Location</label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select name="country_name" class="form-control" required>
                                                            <option value="">Select Country</option>
                                                            @foreach($country as $country)
                                                                <option value="{{$country->name}}" {{$user->country_name == $country->name  ? 'selected' : ''}}>{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <select name="city_name" class="form-control" id="exampleFormControlSelect11" required>
                                                            <option value="">Select City</option>
                                                            @foreach($city as $city)
                                                              <option value="{{$city->name}}" {{$user->city_name == $city->name  ? 'selected' : ''}}>{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="zip_code" maxlength="5" minlength="5" class="form-control" placeholder="Zip Code" value="{{old('zip_code', isset($user) ? $user->zip_code : '')}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="your_location" class="form-control" placeholder="Your Location" value="{{old('your_location', isset($user) ? $user->your_location : '')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="set-location">
                                                        <h5>Pin Location</h5>
                                                        <div id="map-area" class="contact-location">
                                                            <div class="cp-map" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">About Company</label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
{{--                                                        <input type="text" name="companyname" class="form-control "  placeholder="Company Name"  @if($user->companyname != '' )   value="{{ $user->companyname  }}" disabled  @endif  >--}}
                                                        <input type="text" name="companyname" class="form-control "  placeholder="Company Name"     value="{{old('companyname', isset($user) ? $user->companyname : '')  }}" @if(Auth::user()->companyname == null) required @else disabled @endif  >
                                                        @if(Auth::user()->companyname != null)
                                                            <input type="hidden" name="companyname" class="form-control "  placeholder="Company Name"     value="{{Auth::user()->companyname}}" >
                                                        @endif
{{--                                                        <input type="text" name="companyname" class="form-control "  placeholder="Company Name"  @if($user->companyname != '' )   value="{{ $user->companyname  }}" disabled  @elseif($user->companyname == '' )   value=" "  @endif  required>--}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" name="companyEmail"  class="form-control" placeholder="Company email example: (email@example.com)" value="{{old('companyEmail', isset($user) ? $user->companyEmail : '')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="address" class="form-control "  placeholder="Company address"  value="{{old('address', isset($user) ? $user->address : '')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" >
                                                    <div class="form-group">
                                                        <input type="hidden" name="companyWebAddress" class="form-control" placeholder="Web Address" value="{{old('companyWebAddress', isset($user) ? $user->companyWebAddress : '')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="tel" maxlength="11" minlength="11"  name="companyPhoneNo" placeholder="03001234567" pattern="[0-9]{4}[0-9]{7}" value="{{old('companyPhoneNo', isset($user) ? '0'.$user->companyPhoneNo : '')}}" required>
                                                        <small>Format: 03151234567</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="aboutus" placeholder="Company About us" required maxlength="255">{{ \Illuminate\Support\Str::limit(old('aboutus', isset($user) ? $user->aboutus : ''),255 )}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
{{--                            <div class="dashboard-section media-inputs">--}}
{{--                                <h4><i data-feather="image"></i>Photo &amp; Video</h4>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Intro Video</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <div class="input-group">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <div class="input-group-text">Link</div>--}}
{{--                                            </div>--}}
{{--                                            <input type="text" name="videolink" class="form-control"  placeholder="https://www.youtube.com/watch?v=ZRkdyjJ_489M" >--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-3 col-form-label">Gallery</label>--}}
{{--                                    <div class="col-sm-9">--}}
{{--                                        <div class="input-group image-upload-input">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <div class="input-group-text">Image</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="active">--}}
{{--                                                <div class="upload-images">--}}
{{--                                                    <div class="pic">--}}
{{--                                                        <span class="ti-plus"></span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="dashboard-section social-inputs">
                                <h4><i data-feather="cast"></i>Social Networks</h4>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Social Links</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-facebook-f"></i></div>
                                            </div>
                                            <input type="text" name="facebooklink" class="form-control" placeholder="facebook.com/username" value="{{old('facebooklink', isset($user) ? $user->facebooklink : '')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                                            </div>
                                            <input type="text" name="twitterlink" class="form-control" placeholder="twitter.com/username" value="{{old('twitterlink', isset($user) ? $user->twitterlink : '')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-google-plus"></i></div>
                                            </div>
                                            <input type="text" name="goooglelink" class="form-control" placeholder="google.com/username" value="{{old('goooglelink', isset($user) ? $user->goooglelink : '')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <div class="input-group add-new">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text dropdown-label">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Select</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select><i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Input Profile Link">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-section basic-info-input">
                                <h4><i data-feather="lock"></i>Change Password</h4>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm_password" class="col-sm-3 col-form-label">Retype Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="new_password_confirmation"  class="form-control" placeholder="Retype Password">
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
