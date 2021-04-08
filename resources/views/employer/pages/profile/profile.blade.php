@extends('employer.layouts.master')

@section('title')
    Path | Profile
@endsection

@section('css')
@endsection

@section('main-content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Profile</h5>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid">
            <div class="container">
                <!--begin::Profile Personal Information-->
                <div class="d-flex flex-row">
                    <div class="flex-row-fluid ml-lg-8">
                        <div class="card card-custom card-stretch">
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update Information</span>
                                </div>
                            </div>
                            <form method="POST" action="{{route('employerProfile')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
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
{{--                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">--}}
{{--														<i class="ki ki-bold-close icon-xs text-muted"></i>--}}
{{--													</span>--}}
                                            </div>
                                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Company name<span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" name="name" type="text" value="@if(isset(Auth::user()->name)) {{Auth::user()->name }} @else {{old('name') || ''}}  @endif" placeholder="Name" required/>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input disabled class="form-control" name="userEmail" type="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Phone 1<span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="la la-phone"></i>
														</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Phone 1"
                                                       @if(isset(Auth::user()->phoneNo)) value=" {{Auth::user()->phoneNo }} " @else value="{{old('phoneNo')}}" @endif name="phoneNo" required/>
                                                @error('phoneNo')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Phone 2</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="la la-phone"></i>
														</span>
                                                </div>
                                                <input type="text" class="form-control" @if(isset(Auth::user()->phoneNo2)) value=" {{Auth::user()->phoneNo2 }} " @else value="{{old('phoneNo2')}}" @endif placeholder="Phone 2" name="phoneNo2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Phone 3</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="la la-phone"></i>
														</span>
                                                </div>
                                                <input type="text" class="form-control" @if(isset(Auth::user()->companyPhoneNo)) value=" {{Auth::user()->companyPhoneNo }} " @else value="{{old('companyPhoneNo')}}" @endif placeholder="Phone 3" name="companyPhoneNo" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Website</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" name="companyWebAddress" placeholder="Your website link" type="text" @if(isset(Auth::user()->companyWebAddress)) value=" {{Auth::user()->companyWebAddress }} " @else value="{{old('companyWebAddress')}}" @endif/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Location<span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="form-group">
                                                    @php $countryName = DB::table('countries')->where('id', Auth::user()->country_name)->first(); @endphp

                                                <select name="country_name" class="form-control" disabled="disabled" required>
                                                        <option>{{$countryName->name}}</option>
                                                </select>
{{--                                                <select name="country_name" class="form-control" required>--}}
{{--                                                    <option disabled selected value="">Select</option>--}}
{{--                                                    @foreach($countries as $country)--}}
{{--                                                        <option {{ (old('country_name') == $country->id) ? 'selected':'' }} value='{{$country->id}}'>{{$country->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
                                                @error('country_name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Industry/Field<span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-6">
                                            @php $categoryID = explode(',', Auth::user()->category); @endphp
                                            <div class="form-group">
                                                <select name="category[]" class="form-control js-example-basic-multiple" multiple="multiple" required>
                                                    @foreach($categories as $category)
                                                        <option
                                                            @if (isset(Auth::user()->category))
                                                                @foreach ($categoryID as $key=>$value) {{$value == $category->id ? 'selected' : ''}} @endforeach
                                                            @else
                                                            {{ (collect(old('category'))->contains($category->id)) ? 'selected':'' }}
                                                            @endif
                                                            value='{{$category->id}}'>{{$category->category}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Company Brief<span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="form-group">
                                                <label>Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="aboutus" placeholder="Enter a description" rows="4" maxlength="255" required>{{ \Illuminate\Support\Str::limit(old('aboutus', isset(Auth::user()->aboutus) ? Auth::user()->aboutus : ''),255 )}}</textarea>
                                                <span class="form-text text-muted">Description must be between 10 to 255 characters</span>
                                            </div>
                                            @error('aboutus')
                                            <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mb-6"><i class="la la-link"></i> {{' '}}Social Media</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Social Links</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-facebook"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" placeholder="facebook.com/username" name="facebooklink" type="text" @if(isset(Auth::user()->facebooklink)) value=" {{Auth::user()->facebooklink }} " @else value="{{old('facebooklink')}}" @endif/>
                                                @error('facebooklink')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-twitter"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" placeholder="twitter.com/username" name="twitterlink" type="text" @if(isset(Auth::user()->twitterlink)) value=" {{Auth::user()->twitterlink }} " @else value="{{old('twitterlink')}}" @endif/>
                                                @error('twitterlink')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-google-plus"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" placeholder="google.com/username" name="goooglelink" type="text" @if(isset(Auth::user()->goooglelink)) value=" {{Auth::user()->goooglelink }} " @else value="{{old('goooglelink')}}" @endif/>
                                                @error('goooglelink')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6"> <i class="la la-lock"></i> {{' '}} Change Password</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" placeholder="Enter current password" name="current_password" type="password"/>
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" placeholder="Enter new password" name="new_password" type="password"/>
                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" placeholder="Confirm new password" name="new_password_confirmation" type="password"/>
                                            @error('new_password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="text-align: end">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });
        });
    </script>
@endsection
