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
    <link rel="stylesheet" href="{{asset('asset/css/html5-simple-date-input-polyfill.css')}}" />
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
                    <h1>Pricing Plan</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pricing Plan</li>
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
                        <form action="{{url('employee/pricingPlaneEditPage',encrypt($user->id))}}" method="post" class="dashboard-form job-post-form">
                            {{--                        <form action="{{url('employee/pricingPlaneEditPage/' . $user->id . '/' . $packages->id )}}" method="post" class="dashboard-form job-post-form">--}}
                            {{--                           <form action="{{url('employee/pricingPlaneEditPage' , ['id'=> encrypt($user->id) , 'package_id'=> encrypt($packages->id) ])}}" method="post" class="dashboard-form job-post-form">--}}
                            {{--                        <form action="{{url('employee/pricingPlaneEditPage', encrypt($user->id) , encrypt($packages->id))}}" method="post" class="dashboard-form job-post-form">--}}
                            {{--                        <form action="{{url('employee/pricingPlaneEditPage',['id'=>$user->id ,'package_id'=>$packages->id , 'package_currencys_id'=>$package_currencys->id, 'package_max_users' =>$package_max_users->id])}}" method="post" class="dashboard-form job-post-form">--}}
                            @csrf
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


                                <h4><i data-feather="user-check"></i>Price Plan</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Package Name</label>
                                    <div class="col-md-9">
                                        {{--                                        <input type="text" name="title" class="form-control" placeholder="Starter or Advanced" required>--}}
                                        <div class="form-group">
                                            <select name="package_name" class="form-control" required>
                                                <option value="" selected>Package Name </option>
                                                @foreach($packages as $package)
                                                    {{--                                                <option  value="{{$package->package_name}}">{{old('package_name', isset($package) ? $package->package_name : '') }}</option>--}}
                                                    <option  value="{{$package->id}}">{{old('package_name', isset($package) ? $package->package_name : '') }}</option>
                                                @endforeach
                                                {{--                                                <option value="Advance">Advance</option>--}}

                                            </select>
                                            <i class="fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                </div>
                                {{--                                    <h4><i data-feather="image"></i>Starter package details</h4>--}}
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Package Description</label>
                                    <div class="col-sm-9">
                                        {{--                                            <textarea class="form-control" name="aboutus" placeholder="" > {{ \Illuminate\Support\Str::limit(old('aboutus', isset($user) ? $user->aboutus : ''),255 )}}</textarea>--}}
                                        <textarea class="form-control" name="package_description" placeholder="Package description" ></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Price Plan </label>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <select name="currency" class="form-control" required>
                                                            <option value="">Select Currency </option>
                                                            @foreach($package_currencys as $package_currency)
                                                                <option value="{{$package_currency->currency_name}}">{{ old('currency_name', isset($package_currency) ? $package_currency->currency_name : '')}}</option>
                                                            @endforeach
                                                            {{--                                                        <option>Pakistani rupee Rs</option>--}}
                                                            {{--                                                        <option>Garments / Textile</option>--}}
                                                            {{--                                                        <option>Telecommunication</option>--}}
                                                        </select>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="number" min="1" name="monthly_rate" class="form-control "  placeholder="Monthly Rate in digit " value="" required>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{--                                            <div class="col-md-6">--}}
                                                <div class="col-sm-12">
                                                    <input type="number" min="1" name="yearly_rate" class="form-control "  placeholder="Yearly Rate in digit " value="" required>
                                                    {{--                                                </div>--}}

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group col-sm-12">
                                                    {{--                                                    <div class="col-sm-7">--}}
                                                    <select name="max_users" class="form-control" required>
                                                        <option value="">Maximum users</option>
                                                        @foreach($package_max_users as $package_max_user)
                                                            <option value="{{$package_max_user->users}}">{{ old('users', isset($package_max_user) ? $package_max_user->users : '')}} </option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-caret-down"></i>
                                                    {{--                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Feature List</label>
                                    <div class="col-sm-9">
                                        <div class="table-responsive col-md-12">
                                            <table class="table table-borderless" id="dynamic_field">
                                                <tr>
                                                    <input type="hidden" id="itration" name="itration" value="1">
                                                    <td><input type="text" name="name[]" placeholder="Feature list" class="form-control name_list" required /></td>
                                                    <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    {{--                                        <label class="col-sm-3 col-form-label">Feature List</label>--}}
                                    {{--                                        <div class="">--}}
                                    {{--                                        <div class="form-group row col-md-8">--}}
                                    {{--                                            <form name="add_name" id="add_name">--}}
                                    {{--                                                <div class="table-responsive col-md-6">--}}
                                    {{--                                                    <table class="table table-borderless" id="dynamic_field">--}}
                                    {{--                                                        <tr>--}}
                                    {{--                                                            <td><input type="text" name="name[]" placeholder="Feature list" class="form-control name_list" /></td>--}}
                                    {{--                                                            <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>--}}
                                    {{--                                                        </tr>--}}
                                    {{--                                                    </table>--}}
                                    {{--                                                    <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </form>--}}
                                    {{--                                        </div>--}}

                                    {{--                                        </div>--}}
                                </div>

                                {{--                                    <div class="dashboard-section media-inputs">--}}
                                {{--                                        <h4><i data-feather="image"></i>Advance Package Details</h4>--}}

                                {{--                                        <div class="form-group row">--}}
                                {{--                                            <label class="col-sm-3 col-form-label">Package Description</label>--}}
                                {{--                                            <div class="col-sm-9">--}}
                                {{--                                                --}}{{--                                            <textarea class="form-control" name="aboutus" placeholder="" > {{ \Illuminate\Support\Str::limit(old('aboutus', isset($user) ? $user->aboutus : ''),255 )}}</textarea>--}}
                                {{--                                                <textarea class="form-control" name="aboutus" placeholder="package description" > </textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}


                                {{--                                        <div class="row">--}}
                                {{--                                            <label class="col-md-3 col-form-label">Price Plan</label>--}}
                                {{--                                            <div class="col-md-9">--}}
                                {{--                                                <div class="row">--}}
                                {{--                                                    <div class="col-md-6">--}}
                                {{--                                                        <div class="form-group">--}}
                                {{--                                                            <select name="category" class="form-control">--}}
                                {{--                                                                <option>Select Currency </option>--}}
                                {{--                                                                <option>$</option>--}}
                                {{--                                                                <option>Pkr</option>--}}
                                {{--                                                            </select>--}}
                                {{--                                                            <i class="fa fa-caret-down"></i>--}}
                                {{--                                                        </div>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="col-md-6">--}}
                                {{--                                                        <div class="form-group">--}}
                                {{--                                                            <select name="type" class="form-control">--}}
                                {{--                                                                <option>Rates</option>--}}
                                {{--                                                                <option>10</option>--}}
                                {{--                                                                <option>20</option>--}}
                                {{--                                                                <option>30</option>--}}
                                {{--                                                                <option>40</option>--}}
                                {{--                                                                <option>50</option>--}}
                                {{--                                                            </select>--}}
                                {{--                                                            <i class="fa fa-caret-down"></i>--}}
                                {{--                                                        </div>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="col-md-6">--}}
                                {{--                                                        <div class="form-group">--}}
                                {{--                                                            <select name="experience" class="form-control">--}}
                                {{--                                                                <option>Maximum users</option>--}}
                                {{--                                                                <option>1 </option>--}}
                                {{--                                                                <option>2 </option>--}}
                                {{--                                                                <option>3 </option>--}}
                                {{--                                                                <option>4 </option>--}}
                                {{--                                                            </select>--}}
                                {{--                                                            <i class="fa fa-caret-down"></i>--}}
                                {{--                                                        </div>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}

                                {{--                                        <div class="form-group row">--}}
                                {{--                                            <label class="col-sm-3 col-form-label">Feature List</label>--}}
                                {{--                                            <div class="col-sm-9">--}}
                                {{--                                                    <div class="table-responsive col-md-12">--}}
                                {{--                                                        <table class="table table-borderless" id="dynamic_fieldd">--}}
                                {{--                                                            <tr>--}}
                                {{--                                                                <td><input type="text" name="name[]" placeholder="Feature list" class="form-control name_list" /></td>--}}
                                {{--                                                                <td><button type="button" name="add" id="add1" class="btn btn-success">+</button></td>--}}
                                {{--                                                            </tr>--}}
                                {{--                                                        </table>--}}
                                {{--                                                    </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}




                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <button class="button" id="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                <li><i class="fas fa-user"></i><a href="{{url('employee/editprofile',encrypt(Auth::user()->id))}}">Edit Profile</a></li>
                                <li><i class="fas fa-briefcase"></i><a href="{{url('employee/managejob', encrypt(Auth::user()->id))}}">Manage Jobs</a></li>
                                {{--                                <li><i class="fas fa-users"></i><a href="{{url('employee/manageCandidate', encrypt(Auth::user()->id))}}">Manage Candidates</a></li>--}}
                                {{--  <li><i class="fas fa-heart"></i><a href="{{url('employee/manageCandidate', encrypt(Auth::user()->id))}}">Shortlisted Resumes</a></li>  --}}
                                <li><i class="fas fa-plus-square"></i><a href="{{url('employee/postjob', encrypt(Auth::user()->id))}}">Post New Job</a></li>
                                {{--  <li><i class="fas fa-comment"></i><a href="{{url('employee/message', encrypt(Auth::user()->id))}}">Message</a></li>  --}}
                                <li><i class="fas fa-calculator"></i><a href="{{url('employee/pricing', encrypt(Auth::user()->id))}}">Pricing Plans</a></li>
                                <li class="active"><i class="fas fa-calculator"></i><a href="{{url('employee/pricingPlaneEditPage', encrypt(Auth::user()->id))}}">Pricing Plans Edit Page</a></li>

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
<script src="{{asset('asset/js/html5-simple-date-input-polyfill.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('dashboard/js/dashboard.js')}}"></script>
<script src="{{asset('dashboard/js/datePicker.js')}}"></script>
<script src="{{asset('dashboard/js/upload-input.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('js/map.js')}}"></script>

<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id=" '+i+' " placeholder="Feature List" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            // alert(i);
            $('#itration').val(i);
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

        // $('#submit').click(function(){
        //     $.ajax({
        //         url:"name.php",
        //         method:"POST",
        //         data:$('#add_name').serialize(),
        //         success:function(data)
        //         {
        //             alert(data);
        //             $('#add_name')[0].reset();
        //         }
        //     });
        // });
    });

</script>

{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        var i=1;--}}
{{--        $('#add1').click(function(){--}}
{{--            i++;--}}
{{--            $('#dynamic_fieldd').append('<tr id="row1'+i+'"><td><input type="text" name="name[]" placeholder="Feature List" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove1">X</button></td></tr>');--}}
{{--        });--}}
{{--        $(document).on('click', '.btn_remove1', function(){--}}
{{--            var button_id = $(this).attr("id");--}}
{{--            $('#row1'+button_id+'').remove();--}}
{{--        });--}}
{{--        $('#submit').click(function(){--}}
{{--            $.ajax({--}}
{{--                url:"name.php",--}}
{{--                method:"POST",--}}
{{--                data:$('#add_name').serialize(),--}}
{{--                success:function(data)--}}
{{--                {--}}
{{--                    alert(data);--}}
{{--                    $('#add_name')[0].reset();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

</body>
</html>
