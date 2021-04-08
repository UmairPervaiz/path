
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 10 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head><base href="../../../">
    <meta charset="utf-8" />
    <title>Add User | Keenthemes</title>
    <meta name="description" content="Add user example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{asset('public/employer/dist/assets/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('public/employer/dist/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/employer/dist/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/employer/dist/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('public/employer/dist/assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/employer/dist/assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/employer/dist/assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/employer/dist/assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div style="text-align: end; margin-bottom: 10px">
                    <a href="{{route('welcome')}}" class="btn btn-primary font-weight-bolder"><i class="la la-arrow-circle-left"></i> Home Page</a>
                </div>
                <!--begin::Card-->
                <div class="card card-custom card-transparent">
                    <div class="card-body p-0">
                        <!--begin::Wizard-->
                        <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                            <!--begin::Wizard Nav-->
                            <div class="wizard-nav">
                                <div class="wizard-steps">
                                    {{--                                    <div class="wizard-step" style="flex:1; margin-right: 10px;" data-wizard-type="step" data-wizard-state="current">--}}
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">1</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Account Registeration</div>
                                                <div class="wizard-desc">Account Details</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--                                    <div class="wizard-step" style="flex:1; margin-right: 10px;" data-wizard-type="step">--}}
{{--                                    <div class="wizard-step" data-wizard-type="step">--}}
{{--                                        <div class="wizard-wrapper">--}}
{{--                                            <div class="wizard-number">2</div>--}}
{{--                                            <div class="wizard-label">--}}
{{--                                                <div class="wizard-title">Basic Information</div>--}}
{{--                                                <div class="wizard-desc">Add Details</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    {{--                                    <div class="wizard-step" style="flex:1;" data-wizard-type="step">--}}
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">2</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Company Information</div>
                                                <div class="wizard-desc">Add Details</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">3</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Submission</div>
                                                <div class="wizard-desc">Review and Submit</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Nav-->
                            <!--begin::Card-->
                            <div class="card card-custom card-shadowless rounded-top-0">
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                        <div class="col-xl-12 col-xxl-10">
                                            <!--begin::Wizard Form-->
                                            <form class="form" action="{{route('employerRegisteration')}}" method="POST" id="kt_form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-9">
                                                        <!--begin::Wizard Step 1-->
                                                        <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-at"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="email" placeholder="Email" value="{{ session()->get('register.email') }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Password</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-lock"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input class="form-control" placeholder="Enter password" name="password" type="password"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-lock"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input class="form-control" placeholder="Confirm password" name="confirmPassword" type="password"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--begin::Wizard Step 2-->
                                                        <div class="my-5 step" data-wizard-type="step-content">
                                                            <h5 class="text-dark font-weight-bold mb-10">Company Details:</h5>
                                                            <!--begin::Group-->
                                                            <div class="form-group">
{{--                                                                <label>Company Logo </label>--}}
                                                                <label class="col-form-label">Company Logo</label><br>

                                                                <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('public/backend/dist/assets/media/users/blank.png')}})">
                                                                    <div class="image-input-wrapper" ></div>
                                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                                        <input type="file" id="profile_avatar" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
                                                                        <input type="hidden" name="profile_avatar_remove" />
                                                                    </label>
                                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                    </span>
                                                                </div>
                                                                <input  type="hidden" value="" id="imageValue">
                                                                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>Company Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" name="name" id="name" placeholder="Enter name" value="" />
                                                            </div>
                                                            <!--begin::Row-->
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>Phone 1 <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="Phone 1" value="" name="phoneNo" required/>
                                                                </div>
                                                            </div>
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>Phone 2</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="Phone 2" value="" name="phoneNo2"/>
                                                                </div>
                                                            </div>
                                                            <!--begin::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>Phone 3</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="Phone 3" value="" name="companyPhoneNo"/>
                                                                </div>
                                                            </div>
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>Website</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" name="companyWebAddress" placeholder="Company website link" value="" />
                                                            </div>
                                                            <!--begin::Row-->
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>Company Brief <span class="text-danger">*</span></label>
                                                                <textarea type="text" class="form-control form-control-solid form-control-lg" name="aboutus" rows="3" maxlength="255" placeholder="Company Description"></textarea>
                                                                <span class="form-text text-muted">Description can be of no more than 255 characters</span>
                                                            </div>
                                                            <!--begin::Row-->
                                                            <div class="form-group">
                                                                <label>Location <span class="text-danger">*</span></label>
                                                                <select name="country_name" id="country_id" class="form-control form-control-solid form-control-lg">
                                                                    <option selected disabled value="">Select</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>Field/Industry<span class="text-danger">*</span></label>
                                                                <select name="category" id="category" class="form-control select2-container js-example-basic-multiple" multiple="multiple">
                                                                    @foreach($fields as $field)
                                                                        <option value="{{$field->id}}">{{$field->category}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!--end::Group-->

                                                            <h5 class="text-dark font-weight-bold mb-10">Social Media Account(s)</h5>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-facebook"></i>
                                                                    </span>
                                                                    </div>
                                                                    <input class="form-control" placeholder="facebook.com/username" name="facebooklink" type="text" value="" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-twitter"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input class="form-control" placeholder="twitter.com/username" name="twitterlink" type="text" value=""/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-google-plus"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input class="form-control" placeholder="google.com/username" name="goooglelink" type="text" value=""/>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!--end::Wizard Step 2-->
                                                        <!--begin::Wizard Step 3-->
                                                        <div class="my-5 step" data-wizard-type="step-content">
                                                            <div id="sessionData">
                                                                <!--begin::Section-->
                                                                <h5 class="mb-10 font-weight-bold text-dark" style="text-align: center"> Review your Details and Submit</h5>
                                                                @if (session()->has('sessionData'))
                                                                <h6 class="font-weight-bolder mb-3"><mark>Email address:</mark></h6>
                                                                <div class="text-dark-50 line-height-lg">
                                                                    <div><strong>Email: </strong> {{session()->get("sessionData")['email']}}</div>
                                                                </div>
                                                                <div class="separator separator-dashed my-5"></div>
                                                                <!--end::Section-->
                                                                <!--begin::Section-->
                                                                <h6 class="font-weight-bolder mb-3"><mark>Company Information:</mark> </h6>
                                                                <div class="text-dark-50 line-height-lg">
{{--                                                                    <div><strong>Profile Image:</strong> <img id="image1" src="{{session()->get("sessionData")['avatar']}}" style="width: 50px; height: 50px;"> </div>--}}
                                                                    <div><strong>Name: </strong> {{session()->get("sessionData")['name']}}</div>
                                                                    <div><strong>Phone: </strong>   {{session()->get("sessionData")['phoneNo']}}</div>
                                                                    <div><strong>Phone 2: </strong> {{session()->get("sessionData")['phoneNo2']}}</div>
                                                                    <div><strong>Phone 3: </strong>  {{session()->get("sessionData")['companyPhoneNo']}}</div>
                                                                    <div><strong>Website: </strong>  {{session()->get("sessionData")['companyWebAddress']}}</div>
                                                                    <div><strong>About: </strong> About: {{session()->get("sessionData")['aboutus']}}</div>
                                                                    <div><strong>Country: </strong>  {{session()->get("sessionData")['country_name']}}</div>
                                                                    <div><strong>Business Categories: </strong> @foreach(session()->get("sessionData")['category'] as $item) {{$item->category}} @if (!$loop->last) {{','}} @endif @endforeach</div>
                                                                    <div><strong>Facebook link: </strong>  {{session()->get("sessionData")['facebooklink']}}</div>
                                                                    <div><strong>Twitter link: </strong>  {{session()->get("sessionData")['twitterlink']}}</div>
                                                                    <div><strong>Google link: </strong>  {{session()->get("sessionData")['goooglelink']}}</div>
                                                                </div>
                                                                    @endif
                                                            </div>
                                                        </div>

                                                        <!--end::Wizard Step 3-->
                                                        <!--begin::Wizard Actions-->
                                                        <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                            <div class="mr-2">
                                                                <button type="button" id="prev-step" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                                            </div>
                                                            <div>
                                                                <button type="submit" class="btn btn-success font-weight-bolder px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                                <button type="button" id="next-step" class="btn btn-primary font-weight-bolder px-9 py-4" data-wizard-type="action-next">Next</button>
                                                            </div>
                                                        </div>
                                                        <!--end::Wizard Actions-->
                                                    </div>
                                                </div>
                                            </form>
                                            <!--end::Wizard Form-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Wizard-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
    <!--end::Page-->
</div>
<!--begin::Demo Panel-->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

<script>
    var route="{{route('employerRegister')}}";
    var employerCompanyCheckRoute="{{route('employerCompanyCheck')}}";
    var employerData="{{route('employerData')}}";
</script>
<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('public/employer/dist/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('public/employer/dist/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('public/employer/dist/assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('public/employer/dist/assets/js/pages/custom/profile/profile.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('public/employer/dist/assets/js/pages/custom/user/add-user.js')}}"></script>
<!--end::Page Scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.0/flatpickr.min.js"></script>

<script>
    $('#profile_avatar').change(function(){

        let reader = new FileReader();
        reader.onload = (e) => {
            $('#image1').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        $('#profile_avatar').val(this.files[0]);
    });
</script>

@if(Session::has('error'))
    <script>
        toastr.options.positionClass = 'toast-top-center';
        toastr.error('{{  Session::get('error') }}')
    </script>
@endif
</body>
<!--end::Body-->
</html>
