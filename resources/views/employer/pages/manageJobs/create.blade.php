@extends('employer.layouts.master')

@section('title')
    Path | New Job
@endsection

@section('css')
    <style>
        .ck-editor__editable_inline {
            max-height: 100px;
        }
    </style>
@endsection

@section('main-content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Post a Job</h5>
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
                                    <h3 class="card-label font-weight-bolder text-dark">Add Job Details</h3>
{{--                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update Information</span>--}}
                                </div>
                            </div>
                            <form method="POST" action="{{route('createJob')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Position/Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"  placeholder="Enter" name="title" value="{{old('title')}}" required/>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
												        {{ $message }}
										    	</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Salary Range<span class="text-danger">*</span></label>
                                                <select name="salary" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    @foreach($salaries as $salary)
                                                        <option {{ (old('salary') == $salary->id) ? 'selected':'' }} value='{{$salary->id}}'>{{$salary->range}}</option>
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
                                                <label>Job location <span class="text-danger">*</span></label>
                                                <select name="job_location" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    @foreach($countries as $country)
                                                        <option {{ (old('job_location') == $country->id) ? 'selected':'' }} value='{{$country->id}}'>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('job_location')
                                                <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Candidate nationality <span class="text-danger">*</span></label>
                                                <select name="candidate_nationality" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    @foreach($nationalities as $nationality)
                                                        <option {{ (old('candidate_nationality') == $nationality->id) ? 'selected':'' }} value='{{$nationality->id}}'>{{$nationality->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('candidate_nationality')
                                                <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Degree Level <span class="text-danger">*</span></label>
                                                <select name="qualification" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    @foreach($qualifications as $qualification)
                                                        <option {{ (old('qualification') == $qualification->id) ? 'selected':'' }} value='{{$qualification->id}}'>{{$qualification->name}}</option>
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
                                                <label>Career Level<span class="text-danger">*</span></label>
                                                <select name="career_level" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    @foreach($careerLevels as $careerLevel)
                                                        <option {{ (old('career_level') == $careerLevel->id) ? 'selected':'' }} value='{{$careerLevel->id}}'>{{$careerLevel->name}}</option>
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
                                                <label>Experience<span class="text-danger">*</span></label>
                                                <select name="experience" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    @foreach($experiences as $experience)
                                                        <option {{ (old('experience') == $experience->id) ? 'selected':'' }} value='{{$experience->id}}'>{{$experience->year}}</option>
                                                    @endforeach
                                                </select>
                                                @error('experience')
                                                <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Job Type <span class="text-danger">*</span></label>
                                                <div class="radio-inline">
                                                    <label class="radio">
                                                        <input type="radio" name="type" {{old('type') == 1 ? 'checked' : ''}} value="1" required/>
                                                        <span></span>Full time</label>
                                                    <label class="radio" style="margin: auto">
                                                        <input type="radio" name="type" {{old('type') == 2 ? 'checked' : ''}} value="2" required/>
                                                        <span></span>Part time</label>
                                                </div>
                                                @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Skills<span class="text-danger">*</span></label>
                                                <select name="skills[]" class="form-control js-example-basic-multiple" multiple="multiple" required>
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

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Gender <span class="text-danger">*</span></label>
                                                <select name="gender" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    <option {{old('gender') == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                                                    <option {{old('gender') == 'Female' ? 'selected' : ''}} value="Female">Female</option>
                                                    <option {{old('gender') == 'Other' ? 'selected' : ''}} value="Other">Other</option>
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
                                                <label>Candidate Location<span class="text-danger">*</span></label>
                                                <select name="candidate_location" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    @foreach($candidateLocations as $candidateLocation)
                                                        <option {{ (old('candidate_location') == $candidateLocation->id) ? 'selected':'' }} value='{{$candidateLocation->id}}'>{{$candidateLocation->location}}</option>
                                                    @endforeach
                                                </select>
                                                @error('candidate_location')
                                                <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Field/industry<span class="text-danger">*</span></label>
                                                <select name="category" class="form-control" required>
                                                    <option disabled selected value="">Select</option>
                                                    @foreach($categories as $category)
                                                        <option {{ (old('category') == $category->id) ? 'selected':'' }} value='{{$category->id}}'>{{$category->category}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Posting Date <span class="text-danger">*</span></label>
                                                <input class="form-control" type="date" name="date" value="{{old('date')}}" min="<?php echo date('Y-m-d') ?>" id="example-date-input" required/>
                                                @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Ending Date <span class="text-danger">*</span></label>
                                                <input class="form-control" type="date" name="endingDate" value="{{old('endingDate')}}" min="<?php echo date('Y-m-d') ?>" id="example-date-input" required/>
                                                @error('endingDate')
                                                <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <!--begin::Card-->
                                            <div class="card card-custom">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Job Description <span class="text-danger">*</span>
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <textarea name="description" id="kt-ckeditor-1">{{old('description')}}</textarea>
                                                </div>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <!--begin::Card-->
                                            <div class="card card-custom">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Responsibilities <span class="text-danger">*</span>
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <textarea name="responsibilities" id="kt-ckeditor-2">{{old('responsibilities')}}</textarea>
                                                </div>
                                                @error('responsibilities')
                                                <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <!--end::Card-->
                                        </div>

                                        <div class="col-6">
                                            <!--begin::Card-->
                                            <div class="card card-custom">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Education <span class="text-danger">*</span>
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <textarea name="education" id="kt-ckeditor-3">{{old('education')}}</textarea>
                                                </div>
                                                @error('education')
                                                <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer" style="text-align: end">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
    <script src="{{asset("public/employer/dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js")}}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });
        });

        var KTCkeditor = function () {
            // Private functions
            var demos = function () {
                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-1' ),
                        {
                            toolbar: [ 'bold', 'underline','italic', 'bulletedList', 'numberedList', 'blockQuote']
                        } )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            };

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTCkeditor.init();
        });

        var KTCkeditor1 = function () {
            // Private functions
            var demos = function () {
                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-2' ),
                        {
                            toolbar: [ 'bulletedList', 'numberedList']
                        } )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            };

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTCkeditor1.init();
        });

        var KTCkeditor2 = function () {
            // Private functions
            var demos = function () {
                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-3' ),
                        {
                            toolbar: [ 'bulletedList', 'numberedList']
                        } )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            };

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTCkeditor2.init();
        });

    </script>
@endsection
