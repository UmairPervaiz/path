@extends('candidates.layouts.master')

@section('title')
    Path | Resume
@endsection

@section('css')
@endsection

@section('main-content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Add Resume</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">Resume details</h3>
                    </div>

                    <form method="POST" action="{{route('resume')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <h5 class="font-weight-bold mb-6"><i class="la la-address-card"></i> {{' '}}Personal Information</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('public/backend/dist/assets/media/users/blank.png')}})">
                                                <div class="image-input-wrapper" @if(Auth::user()->avatar != null) style="background-image: url({{ asset('images/'.Auth::user()->avatar) }})" @endif></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
														<i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>First name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Name" name="firstName"  value="{{$personalInfo->firstName}}" required />
                                        @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Last name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Name" name="lastName" value="{{$personalInfo->lastName}}" required />
                                        @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Date of birth <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="DOB" value="{{$personalInfo->DOB}}" max="<?php echo date('Y-m-d') ?>" id="example-date-input" required/>
                                        @error('DOB')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
										</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nationality <span class="text-danger">*</span></label>
                                        <select name="nationality" class="form-control "  required>
                                            <option selected disabled value=''>Select</option>
                                        @foreach($countries as $country)
                                                <option {{ $personalInfo->nationality == $country->id ? 'selected':'' }} value='{{$country->id}}'>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-control "  required>
                                            <option selected disabled value=''>Select</option>
                                        @foreach($genders as $gender)
                                                <option {{ $personalInfo->gender == $gender->id ? 'selected':'' }} value='{{$gender->id}}'>{{$gender->type}}</option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Marital Status <span class="text-danger">*</span></label>
                                        <select name="maritalStatus" class="form-control "  required>
                                            <option selected disabled value=''>Select</option>
                                        @foreach($maritalStatus as $maritalStatus)
                                                <option {{ $personalInfo->maritalStatus == $maritalStatus->id ? 'selected':'' }} value='{{$maritalStatus->id}}'>{{$maritalStatus->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('maritalStatus')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <h5 class="font-weight-bold mb-6"><i class="la la-address-card"></i> {{' '}} Contact Information</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-at"></i>
                                                </span>
                                            </div>
                                            <input disabled name="userEmail" type="email" class="form-control form-control-lg form-control-solid" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter" name="address" @if(isset($personalInfo->address)) value="{{$personalInfo->address}}" @else value="{{old('address')}}" @endif  required/>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Phone 1 <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Phone" value="{{Auth::user()->phoneNo}}" name="phoneNo" required/>
                                            @error('phoneNo')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Phone 2</label>
                                        <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control" @if(isset(Auth::user()->phoneNo2)) value=" {{Auth::user()->phoneNo2 }} " @else value="{{old('phoneNo2')}}" @endif placeholder="Phone 2" name="phoneNo2" />
                                            @error('phoneNo2')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Phone 3</label>
                                        <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control" @if(isset(Auth::user()->companyPhoneNo)) value=" {{Auth::user()->companyPhoneNo }} " @else value="{{old('companyPhoneNo')}}" @endif placeholder="Phone 3" name="companyPhoneNo" />
                                            @error('companyPhoneNo')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <h5 class="font-weight-bold mb-6"><i class="la la-child"></i> {{' '}} Professional Information</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        @php $fieldOfExperts = explode(',', $professionalInfo->field_of_expertise) @endphp
                                        <label>Field/industry<span class="text-danger">*</span></label>
                                        <select name="field_of_expertise[]" class="form-control js-example-basic-multiple3" multiple="multiple" required>
                                            @foreach($categories as $category)
                                                <option @foreach($fieldOfExperts as $key=>$value )  {{$value == $category->id ? 'selected': '' }} @endforeach value='{{$category->id}}'>{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                        @error('field_of_expertise')
                                        <span class="invalid-feedback" role="alert">
                                           {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Current location <span class="text-danger">*</span></label>
                                        <select name="location" class="form-control "  required>
                                            <option selected disabled value=''>Select</option>
                                            @foreach($countries as $country)
                                                <option {{ $professionalInfo->location == $country->id ? 'selected':'' }} value='{{$country->id}}'>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        @php $countryOfInterests = explode(',', $professionalInfo->country_of_interest) @endphp
                                        <label>Interested Country of Work <span class="text-danger">*</span></label>
                                        <select name="country_of_interest[]" class="form-control js-example-basic-multiple" multiple required>
                                            @foreach($countries as $country)
                                                <option   @foreach($countryOfInterests as $key=>$value )  {{$value == $country->id ? 'selected': '' }} @endforeach  value='{{$country->id}}'>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('country_of_interest')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Career level <span class="text-danger">*</span></label>
                                        <select name="career_level" class="form-control "  required>
                                            <option selected disabled value=''>Select</option>
                                            @foreach($careerLevels as $careerLevel)
                                                <option @if(isset($professionalInfo->career_level)) {{ $professionalInfo->career_level == $careerLevel->id ? 'selected':'' }}  @else {{ old('career_level') == $careerLevel->id ? 'selected':'' }} @endif value='{{$careerLevel->id}}'>{{$careerLevel->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('career_level')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Current salary in $ <span class="text-danger">*</span></label>
                                        <select name="salary" class="form-control "  required>
                                            <option selected disabled value=''>Select</option>
                                            @foreach($salaries as $salary)
                                                <option @if(isset($professionalInfo->salary)) {{ $professionalInfo->salary == $salary->id ? 'selected':'' }}  @else {{ old('salary') == $salary->id ? 'selected':'' }} @endif value='{{$salary->id}}'>{{$salary->range}}</option>
                                            @endforeach
                                        </select>
                                        @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Expected salary <span class="text-danger">*</span></label>
                                        <select name="expected_salary" class="form-control "  required>
                                            <option selected disabled value=''>Select</option>
                                            @foreach($salaries as $salary)
                                                <option @if(isset($professionalInfo->expected_salary)) {{ $professionalInfo->expected_salary == $salary->id ? 'selected':'' }}  @else {{ old('expected_salary') == $salary->id ? 'selected':'' }} @endif value='{{$salary->id}}'>{{$salary->range}}</option>
                                            @endforeach
                                        </select>
                                        @error('expected_salary')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Degree level <span class="text-danger">*</span></label>
                                        <select name="qualification" class="form-control "  required>
                                            <option selected disabled value=''>Select</option>
                                            @foreach($degreeLevels as $degreeLevel)
                                                <option @if(isset($professionalInfo->qualification)) {{ $professionalInfo->qualification == $degreeLevel->id ? 'selected':'' }}  @else {{ old('qualification') == $degreeLevel->id ? 'selected':'' }} @endif value='{{$degreeLevel->id}}'>{{$degreeLevel->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Language <span class="text-danger">*</span></label>
                                        @php $candidateLanguages = explode(',', $professionalInfo->language) @endphp
                                        <select name="language[]" class="form-control js-example-basic-multiple5"  multiple required>
                                            @foreach($languages as $language)
                                                <option @foreach($candidateLanguages as $key=>$value )  {{$value == $language->id ? 'selected': '' }} @endforeach value='{{$language->id}}'>{{$language->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <h5 class="font-weight-bold mb-6"><i class="la la-briefcase"></i> {{' '}} Education Information</h5>
                                </div>
                            </div>

                            @php $educationIdCount = 0; @endphp
                            <input id="educationLastValue" type="hidden" value="{{count($educationInfos)}}">

                                <div id="kt_repeater_1">
                                    <div data-repeater-list="candidate_educations">
                                            @foreach ($educationInfos as $educationInfo)
                                                 <div data-repeater-item="">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Degree level <span class="text-danger">*</span></label>
                                                                <select name="degree" class="form-control" required>
                                                                    <option selected disabled value=''>Select</option>
                                                                    @foreach($degreeLevels as $degreeLevel)
                                                                        <option @if(isset($educationInfo->degree)) {{ $educationInfo->degree == $degreeLevel->id ? 'selected':'' }}  @else  {{ $educationInfo->degree == $degreeLevel->id ? 'selected':'' }} @endif value='{{$degreeLevel->id}}'>{{$degreeLevel->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('degree')
                                                                <span class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Field of study <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"  placeholder="Enter" name="field_of_study"  value="{{$educationInfo->field_of_study}}" required />
                                                                @error('field_of_study')
                                                                <span class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Institution name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"  placeholder="Enter Name" name="institution"  value="{{$educationInfo->institution}}" required />
                                                                @error('institution')
                                                                <span class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="form-group">
                                                                <label>From <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="date" name="starting_date" value="{{$educationInfo->starting_date}}" max="<?php echo date('Y-m-d')?>" id="example-date-input" required/>
                                                                @error('starting_date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <div class="form-group">
                                                                <label>To <span class="text-danger">*</span></label>
                                                                <input class="form-control educationEndingDate" type="date" name="ending_date" @if(isset($educationInfo->ending_date)) value="{{$educationInfo->ending_date}}" @else disabled @endif max="<?php echo date('Y-m-d')?>" id="ending_date_{{$educationIdCount}}" required/>
                                                                @error('ending_date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-group row">
                                                                <label>If present select</label>
                                                                <div class="col-9 col-form-label">
                                                                    <div class="checkbox-inline">
                                                                        <label class="checkbox checkbox-success">
                                                                            <input type="checkbox" class="educationPresent" @if(!isset($educationInfo->ending_date)) checked @endif id="ending_date_present_{{$educationIdCount}}" name="educationPresent" />
                                                                            <span></span>
                                                                            Present
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <textarea type="text" class="form-control" rows="3"  placeholder="Enter" name="description" maxlength="255" required>{{$educationInfo->description}}</textarea>
                                                                <span class="form-text text-muted">Description can be of no more than 255 characters</span>
                                                                @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                     </div>
                                                    <div class="form-group" style="text-align: end">
                                                        <a href="javascript:;" style="width: 14%" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                            <i class="la la-trash-o"></i>Delete</a>
                                                    </div>
                                                 </div>
                                                @php $educationIdCount++; @endphp
                                            @endforeach
                                    </div>
                                    <div class="form-group" style="text-align: end">
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>Add More Education</a>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <h5 class="font-weight-bold mb-6"><i class="la la-folder"></i> {{' '}} Experience Information</h5>
                                </div>
                            </div>

                            @php $experienceIdCount = 0; @endphp

                            <div id="kt_repeater_2">
                                <div data-repeater-list="candidate_experiences">
                                    @if(count($experienceInfos) > 0)
                                        <input id="experienceLastValue" type="hidden" value="{{count($experienceInfos)}}">
                                    @foreach($experienceInfos as $experienceInfo)
                                          <div data-repeater-item="">
                                             <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Company name</label>
                                                        <input type="text" class="form-control"  placeholder="Enter Name" name="company" @if(isset($experienceInfo->company)) value="{{$experienceInfo->company}}" @else value="{{old('company')}}" @endif/>
                                                        @error('company')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <select name="company_location" class="form-control ">
                                                            <option selected disabled value=''>Select</option>
                                                            @foreach($countries as $country)
                                                                <option @if(isset($experienceInfo->company_location)) {{ $experienceInfo->company_location == $country->id ? 'selected':'' }}  @else {{ old('company_location') == $country->id ? 'selected':'' }} @endif value='{{$country->id}}'>{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('company_location')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Position</label>
                                                        <input type="text" class="form-control"  placeholder="Enter" name="position" @if(isset($experienceInfo->position)) value="{{$experienceInfo->position}}" @else value="{{old('position')}}" @endif />
                                                        @error('position')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label>From</label>
                                                        <input class="form-control" type="date" name="experience_starting_date" @if(isset($experienceInfo->experience_starting_date)) value="{{$experienceInfo->experience_starting_date}}" @else value="{{old('experience_starting_date')}}" @endif max="<?php echo date('Y-m-d')?>" id="example-date-input" required/>
                                                        @error('experience_starting_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>To </label>
                                                                <input class="form-control experienceEndingDate" type="date" name="experience_ending_date" id="experience_ending_date{{$experienceIdCount}}" @if(isset($experienceInfo->experience_ending_date)) value="{{$experienceInfo->experience_ending_date}}" @elseif(!isset($experienceInfo->experience_ending_date)) disabled @else value="{{old('experience_ending_date')}}" @endif max="<?php echo date('Y-m-d')?>" required/>
                                                            @error('experience_ending_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="col-2">
                                                     <div class="form-group row">
                                                         <label>If present select</label>
                                                         <div class="col-9 col-form-label">
                                                             <div class="checkbox-inline">
                                                                 <label class="checkbox checkbox-success">
                                                                     <input type="checkbox" class="experiencePresent" @if(!isset($experienceInfo->experience_ending_date)) checked @endif id="experience_ending_date_present_{{$experienceIdCount}}" name="experiencePresent" />
                                                                     <span></span>
                                                                     Present
                                                                 </label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        @if(isset($experienceInfo->experience_description))
                                                        <textarea type="text" class="form-control" rows="3"  placeholder="Enter" name="experience_description" maxlength="255">{{$experienceInfo->experience_description}}</textarea>
                                                        @else
                                                        <textarea type="text" class="form-control" rows="3"  placeholder="Enter" name="experience_description" maxlength="255">{{old('experience_description')}}</textarea>
                                                        @endif
                                                        <span class="form-text text-muted">Description can be of no more than 255 characters</span>
                                                        @error('experience_description')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                               </div>
                                                <div class="form-group" style="text-align: end">
                                                    <a href="javascript:;" style="width: 14%" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                                </div>
                                        </div>
                                            @php $experienceIdCount++; @endphp
                                        @endforeach
                                    @else
                                        <div data-repeater-item="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Company name</label>
                                                        <input type="text" class="form-control"  placeholder="Enter Name" name="company" @if(isset($experienceInfo->company)) value="{{$experienceInfo->company}}" @else value="{{old('company')}}" @endif/>
                                                        @error('company')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <select name="company_location" class="form-control ">
                                                            <option selected disabled value=''>Select</option>
                                                            @foreach($countries as $country)
                                                                <option @if(isset($experienceInfo->company_location)) {{ $experienceInfo->company_location == $country->id ? 'selected':'' }}  @else {{ old('company_location') == $country->id ? 'selected':'' }} @endif value='{{$country->id}}'>{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('company_location')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Position</label>
                                                        <input type="text" class="form-control"  placeholder="Enter" name="position" @if(isset($experienceInfo->position)) value="{{$experienceInfo->position}}" @else value="{{old('position')}}" @endif />
                                                        @error('position')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>From</label>
                                                        <input class="form-control" type="date" name="experience_starting_date" @if(isset($experienceInfo->experience_starting_date)) value="{{$experienceInfo->experience_starting_date}}" @else value="{{old('experience_starting_date')}}" @endif max="<?php echo date('Y-m-d')?>" id="example-date-input" required/>
                                                        @error('experience_starting_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>To </label>
                                                            <input class="form-control" type="date" name="experience_ending_date" @if(isset($experienceInfo->experience_ending_date)) value="{{$experienceInfo->experience_ending_date}}" @else value="{{old('experience_ending_date')}}" @endif max="<?php echo date('Y-m-d')?>" id="example-date-input" required/>
                                                            @error('experience_ending_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        @if(isset($experienceInfo->experience_description))
                                                            <textarea type="text" class="form-control" rows="3"  placeholder="Enter" name="experience_description" maxlength="255">{{$experienceInfo->experience_description}}</textarea>
                                                        @else
                                                            <textarea type="text" class="form-control" rows="3"  placeholder="Enter" name="experience_description" maxlength="255">{{old('experience_description')}}</textarea>
                                                        @endif
                                                        <span class="form-text text-muted">Description can be of no more than 255 characters</span>
                                                        @error('experience_description')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group" style="text-align: end">
                                                <a href="javascript:;" style="width: 14%" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>Delete</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group" style="text-align: end">
                                    <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add More Experience</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <h5 class="font-weight-bold mb-6"><i class="la la-folder"></i> {{' '}} Skills Information</h5>
                                </div>
                            </div>

                            @if(isset($candidate_skills))
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            @php $candidateSkills = explode(',', $candidate_skills->skill); @endphp
                                            <label>Skills<span class="text-danger">*</span></label>
                                            <select name="skills[]" class="form-control js-example-basic-multiple4" multiple="multiple" required>
                                                @foreach($skills as $skill)
                                                        <option @foreach($candidateSkills as $key=>$value )  {{$value == $skill->id ? 'selected': '' }} @endforeach value='{{$skill->id}}'>{{$skill->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('skills')
                                            <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Skills<span class="text-danger">*</span></label>
                                            <select name="skills[]" class="form-control js-example-basic-multiple4" multiple="multiple" required>
                                                @foreach($skills as $skill)
                                                    <option {{ (collect(old('skills'))->contains($skill->id)) ? 'selected':'' }} value='{{$skill->id}}'>{{$skill->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('skills')
                                            <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>

                        <div class="card-footer" style="text-align: end">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
{{--                            <button type="reset" class="btn btn-secondary">Reset</button>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        var educationValue;
        var experienceValue;

        $(document).ready(function() {

            $('.js-example-basic-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

            $('.js-example-basic-multiple1').select2({
                placeholder: "Select",
                allowClear: true
            });

            $('.js-example-basic-multiple2').select2({
                placeholder: "Select",
                allowClear: true
            });

            $('.js-example-basic-multiple3').select2({
                placeholder: "Select",
                allowClear: true
            });

            $('.js-example-basic-multiple4').select2({
                placeholder: "Select",
                allowClear: true
            });
            $('.js-example-basic-multiple5').select2({
                placeholder: "Select",
                allowClear: true
            });
        });

        $(".educationPresent").click(e => clickedFuntion(e));

        function clickedFuntion(e){
                let targetId = e.target.id;
                let suffix = targetId.match(/\d+/);
                if($('#ending_date_present_'+suffix[0]).is(':checked')){
                    $('#ending_date_'+suffix[0]).prop('disabled',true);
                }
                else{
                    $('#ending_date_'+suffix[0]).prop('disabled',false);
                }
        }

        // Class definition
        var KTFormRepeater = function() {

            // Education repeater Private functions
            var demo1 = function() {
                $('#kt_repeater_1').repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function () {
                        $(this).slideDown();
                        educationValue = $('#educationLastValue').val();

                        $(this).find('input.educationEndingDate').removeAttr('id').attr('id','ending_date_'+educationValue);
                        $(this).find('input.educationPresent').removeAttr('id').attr('id','ending_date_present_'+educationValue);
                        $('#educationLastValue').val(parseInt(educationValue)+1);

                        let html = document.querySelectorAll('.educationPresent');
                        console.log(html);
                        html.forEach(el => el.addEventListener("click", (e) => {
                            clickedFuntion(e);
                        }))
                    },

                    hide: function (deleteElement) {
                        if (confirm('Are you sure you want to delete this Item?')) {
                            $(this).slideUp(deleteElement);
                        }
                    },
                    isFirstItemUndeletable: true
                });
            };

            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormRepeater.init();
        });

        $(".experiencePresent").click(e => clickedExperiencedFuntion(e));

        function clickedExperiencedFuntion(e){
            let targetId = e.target.id;
            let suffix = targetId.match(/\d+/);
            if($('#experience_ending_date_present_'+suffix[0]).is(':checked')){
                $('#experience_ending_date'+suffix[0]).prop('disabled',true);
            }
            else{
                $('#experience_ending_date'+suffix[0]).prop('disabled',false);
            }
        }

        // Class definition
        var KTFormRepeater1 = function() {

            // Private functions
            var demo1 = function() {
                $('#kt_repeater_2').repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function () {
                        $(this).slideDown();
                        experienceValue = $('#experienceLastValue').val();

                        $(this).find('input.experienceEndingDate').removeAttr('id').attr('id','experience_ending_date'+experienceValue);
                        $(this).find('input.experiencePresent').removeAttr('id').attr('id','experience_ending_date_present_'+experienceValue);
                        $('#experienceLastValue').val(parseInt(experienceValue)+1);

                        let htmlExperience = document.querySelectorAll('.experiencePresent');
                        console.log(htmlExperience);
                        htmlExperience.forEach(el => el.addEventListener("click", (e) => {
                            clickedExperiencedFuntion(e);
                        }))
                    },

                    hide: function (deleteElement) {
                        if (confirm('Are you sure you want to delete this Item?')) {
                            $(this).slideUp(deleteElement);
                        }
                    },
                    isFirstItemUndeletable: true
                });
            };

            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormRepeater1.init();
        });
    </script>
@endsection
