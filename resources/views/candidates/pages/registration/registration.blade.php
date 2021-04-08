
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
    <link href="{{asset('public/candidate/dist/assets/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('public/candidate/dist/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/candidate/dist/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/candidate/dist/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('public/candidate/dist/assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/candidate/dist/assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/candidate/dist/assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/candidate/dist/assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
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
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">2</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Basic Information</div>
                                                <div class="wizard-desc">Add Details</div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="wizard-step" style="flex:1;" data-wizard-type="step">--}}
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">3</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Education/Experience</div>
                                                <div class="wizard-desc">Add Details</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">4</div>
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
                                            <form class="form" action="{{route('candidateRegisteration')}}" method="POST" id="kt_form">
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
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="input-group input-group-solid input-group-lg">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-phone"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="" placeholder="Phone" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <!--end::Wizard Step 1-->
                                                        <!--begin::Wizard Step 2-->
                                                        <div class="my-5 step" data-wizard-type="step-content">
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">First Name<span class="text-danger">*</span></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control form-control-solid form-control-lg" name="firstName" type="text" value="" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Last Name<span class="text-danger">*</span></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control form-control-solid form-control-lg" name="lastName" type="text" value="" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Gender<span class="text-danger">*</span></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="gender" class="form-control form-control-solid form-control-lg">
                                                                        <option selected disabled value="">Select</option>
                                                                        @foreach($genders as $gender)
                                                                            <option value="{{$gender->id}}">{{$gender->type}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="form-group">
                                                                        <input class="form-control form-control-solid form-control-lg" type="date" name="DOB" value="" max="<?php echo date('Y-m-d')?>" id="example-date-input"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Nationality<span class="text-danger">*</span></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="nationality" class="form-control form-control-solid form-control-lg">
                                                                        <option selected disabled value="">Select</option>
                                                                        @foreach($nationality as $nationality)
                                                                        <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Current country<span class="text-danger">*</span></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="location" class="form-control form-control-solid form-control-lg">
                                                                        <option selected disabled value="">Select</option>
                                                                        @foreach($locations as $location)
                                                                        <option value="{{$location->id}}">{{$location->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Field/Industry<span class="text-danger">*</span></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="field_of_expertise" id="field_of_expertise" class="form-control select2-container js-example-basic-multiple" multiple="multiple">
                                                                        @foreach($fields as $field)
                                                                        <option value="{{$field->id}}">{{$field->category}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Interested Country of Work<span class="text-danger">*</span></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="country_of_interest" id="country_of_interest" class="form-control form-control-solid form-control-lg js-example-basic-multiple1" multiple>
                                                                        @foreach($countryOfInterest as $countryOfInterest)
                                                                            <option value="{{$countryOfInterest->id}}">{{$countryOfInterest->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <!--end::Wizard Step 2-->
                                                        <!--begin::Wizard Step 3-->
                                                        <div class="my-5 step" data-wizard-type="step-content">
                                                            <h5 class="text-dark font-weight-bold mb-10">Education Details:</h5>
                                                            <!--begin::Group-->
                                                                        <div class="form-group">
                                                                            <label>Degree <span class="text-danger">*</span></label>
                                                                            <select name="qualification" class="form-control form-control-solid form-control-lg">
                                                                                <option selected disabled value="">Select</option>
                                                                                @foreach($qualifications as $qualification)
                                                                                    <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <!--end::Group-->
                                                                        <!--begin::Group-->
                                                                        <div class="form-group">
                                                                            <label>Field of study <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="field_of_study" placeholder="" value="" />
                                                                        </div>
                                                                        <!--begin::Row-->
                                                                        <!--begin::Group-->
                                                                        <div class="form-group">
                                                                            <label>Institution Name <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="institution" placeholder="" value="" />
                                                                        </div>
                                                                        <!--begin::Group-->
                                                                        <div class="form-group">
                                                                            <label>Description <span class="text-danger">*</span></label>
                                                                            <textarea type="text" class="form-control form-control-solid form-control-lg" name="description" rows="3" maxlength="255" placeholder=""></textarea>
                                                                            <span class="form-text text-muted">Description can be of no more than 255 characters</span>
                                                                        </div>
                                                                        <!--begin::Row-->
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <!--begin::Group-->
                                                                                <div class="form-group">
                                                                                    <label>Starting Date <span class="text-danger">*</span></label>
                                                                                    <input class="form-control form-control-solid form-control-lg" type="date" name="starting_date" value="" max="<?php echo date('Y-m-d')?>" id="example-date-input" required/>
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Group-->
                                                                            <!--begin::Group-->
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label>Ending Date <span class="text-danger">*</span></label>
                                                                                    <input class="form-control form-control-solid form-control-lg" type="date" name="ending_date" value="" max="<?php echo date('Y-m-d')?>" id="educationeEndingDate" required/>
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Group-->
                                                                            <!--begin::Group-->
{{--                                                                            <div class="col-xl-4">--}}
{{--                                                                                <div class="form-group">--}}
{{--                                                                                    <label>If present </label>--}}
{{--                                                                                    <div class="col-9 col-form-label">--}}
{{--                                                                                        <div class="checkbox-inline">--}}
{{--                                                                                            <label class="checkbox checkbox-success">--}}
{{--                                                                                                <input type="checkbox" id="educationPresent" class="educationPresent" name="educationPresent" />--}}
{{--                                                                                                <span></span>--}}
{{--                                                                                                Present--}}
{{--                                                                                            </label>--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
                                                                            <!--end::Group-->
                                                                        </div>

                                                            <h5 class="text-dark font-weight-bold mb-10">Experience Details (If any):</h5>
                                                                    <div class="form-group">
                                                                        <label>Company Name <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control form-control-solid form-control-lg"  placeholder="Enter Name" name="company"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Location <span class="text-danger">*</span></label>
                                                                        <select name="company_location" class="form-control form-control-solid form-control-lg">
                                                                            <option selected disabled value="">Select</option>
                                                                            @foreach($countries as $country)
                                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Position/Title <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="position" placeholder="" value="" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description <span class="text-danger">*</span></label>
                                                                        <textarea type="text" class="form-control form-control-solid form-control-lg" name="experience_description" rows="3" maxlength="255" placeholder=""></textarea>
                                                                        <span class="form-text text-muted">Description can be of no more than 255 characters</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <!--begin::Group-->
                                                                            <div class="form-group">
                                                                                <label>Starting Date <span class="text-danger">*</span></label>
                                                                                <input class="form-control form-control-solid form-control-lg" type="date" name="experience_starting_date" value="" max="<?php echo date('Y-m-d')?>" id="example-date-input"/>
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Group-->
                                                                        <!--begin::Group-->
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group">
                                                                                <label>Ending Date <span class="text-danger">*</span></label>
                                                                                <input class="form-control form-control-solid form-control-lg" type="date" name="experience_ending_date" value="" max="<?php echo date('Y-m-d')?>" id="experienceEndingDate"/>
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Group-->
                                                                        <!--begin::Group-->
{{--                                                                        <div class="col-xl-4">--}}
{{--                                                                            <div class="form-group">--}}
{{--                                                                                <label>If present </label>--}}
{{--                                                                                <div class="col-9 col-form-label">--}}
{{--                                                                                    <div class="checkbox-inline">--}}
{{--                                                                                        <label class="checkbox checkbox-success">--}}
{{--                                                                                            <input type="checkbox" id="experiencePresent" class="experiencePresent" name="experiencePresent" />--}}
{{--                                                                                            <span></span>--}}
{{--                                                                                            Present--}}
{{--                                                                                        </label>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
                                                                        <!--end::Group-->
                                                                    </div>

                                                        </div>
                                                        <!--end::Wizard Step 3-->
                                                        <!--begin::Wizard Step 4-->
{{--                                                        @include('candidates.pages.registration.complete')--}}
                                                        <div class="my-5 step" data-wizard-type="step-content">
                                                            <div id="sessionData">
                                                                <h5 class="mb-10 font-weight-bold text-dark" style="text-align: center">Review your Details and Submit</h5>
                                                                @if (session()->has('candidateSessionData'))
                                                                    <h6 class="font-weight-bolder mb-3"><mark>Account details:</mark></h6>
                                                                    <div class="text-dark-50 line-height-lg">
                                                                        <div><strong>Email: </strong> {{session()->get("candidateSessionData")['email']}}</div>
                                                                        <div><strong>Phone Number: </strong> {{session()->get("candidateSessionData")['phone']}}</div>
                                                                    </div>
                                                                    <div class="separator separator-dashed my-5"></div>
                                                                    <!--end::Section-->
                                                                    <!--begin::Section-->
                                                                    <h6 class="font-weight-bolder mb-3"><mark>Basic Information:</mark></h6>
                                                                    <div class="text-dark-50 line-height-lg">
                                                                        <div><strong>First Name: </strong> {{session()->get("candidateSessionData")['firstName']}} </div>
                                                                        <div><strong>Last Name: </strong>   {{session()->get("candidateSessionData")['lastName']}}</div>
                                                                        <div><strong>Gender: </strong> @if(isset(session()->get("candidateSessionData")['gender'][0])) {{session()->get("candidateSessionData")['gender'][0]}} @endif </div>
                                                                        <div><strong>Date of birth: </strong>  {{\Carbon\Carbon::parse(session()->get("candidateSessionData")['DOB'])->format('l, M d, Y')}}</div>
                                                                        <div><strong>Nationality: </strong>  @if(isset(session()->get("candidateSessionData")['nationality'][0])) {{session()->get("candidateSessionData")['nationality'][0]}} @endif </div>
                                                                        <div><strong>Current country: </strong> @if(isset(session()->get("candidateSessionData")['location'][0])) {{session()->get("candidateSessionData")['location'][0]}} @endif </div>
                                                                        <div><strong>Field/Industry: </strong> @foreach(session()->get("candidateSessionData")['field_of_expertise'] as $item)  {{$item->category}}  @if (!$loop->last) {{','}} @endif @endforeach </div>
                                                                        <div><strong>Interested Country of Work: </strong> @foreach(session()->get("candidateSessionData")['interestCountry'] as $item) {{$item->name}} @if (!$loop->last) {{','}} @endif @endforeach </div>
                                                                    </div>
                                                                    <!--end::Section-->
                                                                    <div class="separator separator-dashed my-5"></div>
                                                                    <!--begin::Section-->
                                                                    <h6 class="font-weight-bolder mb-3"><mark>Education/Experience Information:</mark></h6>
                                                                    <div class="text-dark-50 line-height-lg">
                                                                        <div><strong><u>Education information</u></strong> </div>
                                                                        <div><strong>Degree: </strong> @if(isset(session()->get("candidateSessionData")['qualification'][0])) {{session()->get("candidateSessionData")['qualification'][0]}} @endif  </div>
                                                                        <div><strong>Description: </strong>   {{session()->get("candidateSessionData")['description']}}</div>
                                                                        <div><strong>Starting Date: </strong> {{\Carbon\Carbon::parse(session()->get("candidateSessionData")['starting_date'])->format('l, M d, Y')}}</div>
                                                                        <div><strong>Ending Date: </strong>  {{\Carbon\Carbon::parse(session()->get("candidateSessionData")['ending_date'])->format('l, M d, Y') }}</div>
                                                                        <br>
                                                                        <div><strong><u>Experience information </u></strong> </div>
                                                                        <div><strong>Company Name: </strong>  {{session()->get("candidateSessionData")['company']}}</div>
                                                                        <div><strong>Company Location: </strong> @if(isset(session()->get("candidateSessionData")['company_location'][0])) {{session()->get("candidateSessionData")['company_location'][0]}} @endif </div>
                                                                        <div><strong>Position/Title: </strong>  {{session()->get("candidateSessionData")['position']}}</div>
                                                                        <div><strong>Experience Description: </strong>  {{session()->get("candidateSessionData")['experience_description']}}</div>
                                                                        <div><strong>Experience Starting Date: </strong>  {{\Carbon\Carbon::parse(session()->get("candidateSessionData")['experience_starting_date'])->format('l, M d, Y') }}</div>
                                                                        <div><strong>Experience Ending Date: </strong>  {{\Carbon\Carbon::parse(session()->get("candidateSessionData")['experience_ending_date'])->format('l, M d, Y')}}</div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <!--end::Wizard Step 4-->
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script>
    var route="{{route('candidateRegister')}}";
    var candidateData="{{route('candidateData')}}";

    // $("#educationPresent").click((function ()
    // {
    //     if($('#educationPresent').is(':checked')){
    //         $('#educationeEndingDate').prop('disabled',true);
    //     }
    //     else{
    //         $('#educationeEndingDate').prop('disabled',false);
    //     }
    // }));
    //
    // $("#experiencePresent").click((function ()
    // {
    //     if($('#experiencePresent').is(':checked')){
    //         $('#experienceEndingDate').prop('disabled',true);
    //     }
    //     else{
    //         $('#experienceEndingDate').prop('disabled',false);
    //     }
    // }));


</script>
<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('public/candidate/dist/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('public/candidate/dist/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('public/candidate/dist/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('public/candidate/dist/assets/js/pages/custom/user/add-user.js')}}"></script>
<!--end::Page Scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.0/flatpickr.min.js"></script>
</body>
<!--end::Body-->
</html>
