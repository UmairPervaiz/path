@extends('backend.layouts.master')

@section('title')
    Path | Edit Advertise
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main-content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        @php $user_role_id = DB::table('model_has_roles')->where('model_id', Auth::user()->id)->first();
             $user = DB::table('roles')->where('id', $user_role_id->role_id)->first();
        @endphp

        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Advertise</h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                @if ($user->id == 1)
                                    <a href="javascript: void(0);" class="text-muted">Edit Advertise</a>
                                @elseif($user->id  == 4)
                                    <a href="javascript: void(0);" class="text-muted">Edit Advertise</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">Edit Advertise</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                            <div class="card-toolbar">
                                @if ($user->id == 1)
                                    <a href="{{route('listAdvertise')}}" class="btn btn-primary font-weight-bolder"><i class="la la-eye"></i> View Advertise</a>
                                @elseif($user->id  == 4)
                                    <a href="{{route('subAdminListAdvertise')}}" class="btn btn-primary font-weight-bolder"><i class="la la-eye"></i> View Advertise</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if ($user->id == 1)
                                <form method="POST" action="{{route('updateAdvertise', $advertisements->id)}}" enctype="multipart/form-data">
                    @elseif($user->id  == 4)
                                <form method="POST" action="{{route('subAdminUpdateAdvertise', $advertisements->id)}}" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Title" name="title" value="{{$advertisements->title}}" required/>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
												{{ $message }}
											</span>
                                        @enderror
                                    </div>
                                </div>

                                @if ($user->id == 1)
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Country <span class="text-danger">*</span></label>
                                            @php
                                                $advertisementsCountries = explode(',' , $advertisements->countries);
                                            @endphp
                                            <select name="countries[]" class="form-control js-example-basic-multiple" multiple="multiple" required>
                                                @foreach($countries as $country)
                                                    <option @foreach($advertisementsCountries as $key => $value){{$value == $country->id ? 'selected': ''}} @endforeach value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('countries')
                                            <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Employer <span class="text-danger">*</span></label>
                                        <select name="employer" class="form-control" required>
                                            <option selected disabled value="">Select</option>
                                            @foreach($employers as $employer)
                                                @php $user = DB::table('users')->where('id',$employer->model_id)->first(); @endphp
                                                <option @if($advertisements->employer == $user->id) selected @endif value='{{$user->id}}'>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('employer')
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
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="start_date" value="{{$advertisements->start_date}}" min="<?php echo date('Y-m-d') ?>" id="example-date-input" required/>
                                        @error('start_date')
                                        <span class="invalid-feedback" role="alert">
												{{ $message }}
										</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>End Date <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="end_date" value="{{$advertisements->end_date}}" min="<?php echo date('Y-m-d') ?>" id="example-date-input" required/>
                                        @error('end_date')
                                        <span class="invalid-feedback" role="alert">
												{{ $message }}
										</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    @php $advertisement_images =  DB::table('advertisements_images')->where('ad_id',$advertisements->id)->get(); @endphp
                                    <div class="form-group">
                                        <label> Upload Files: <span class="text-danger">*</span></label>
                                        <input type="file" id="image" name="images[]" class="form-control" accept="image/*" multiple>
                                        @foreach($advertisement_images as $image)
                                            <img style="cursor: context-menu" src="{{asset('images/'.$image->image)}}" id="image" width="90" height="90" class="thumbnail-image-50" />
                                             @if ($user->id == 1)
                                                <i onclick="deleteImage({{$image->id}})" class="las la-trash-alt" style="cursor: pointer; font-size: 25px; color:red"></i>
                                            @else
                                                <i onclick="deleteImageSubAdmin({{$image->id}})" class="las la-trash-alt" style="cursor: pointer; font-size: 25px; color:red"></i>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group row col-md-12" id="preview_img">

                                    </div>
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
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    {{--    <script src="{{asset('public/backend/dist/assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>--}}
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        $('#image').on('change', function(){ //on file input change
            $("#preview_img").empty();
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img width="100px" height="100px"/>').addClass('thumb').attr('src', e.target.result); //create image element
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });

        function deleteImage(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{route('deleteAdvertiseImage')}}",
                            method: 'post',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                id: id,
                            },
                            success: function (response) {
                                if(response.status === 1){
                                    swal("Successfully Deleted", {
                                        icon: "success",
                                    });
                                    window.setTimeout(function() {
                                        location.reload();
                                    }, 1000);
                                }
                                else{
                                    swal("Error While Deleting", {
                                        icon: "error",
                                    });
                                }
                            }
                        });

                    } else {
                        swal("No Action Taken");
                    }
                });
        }

        function deleteImageSubAdmin(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{route('subAdminDeleteAdvertiseImage')}}",
                            method: 'post',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                id: id,
                            },
                            success: function (response) {
                                if(response.status === 1){
                                    swal("Successfully Deleted", {
                                        icon: "success",
                                    });
                                    window.setTimeout(function() {
                                        location.reload();
                                    }, 1000);
                                }
                                else{
                                    swal("Error While Deleting", {
                                        icon: "error",
                                    });
                                }
                            }
                        });

                    } else {
                        swal("No Action Taken");
                    }
                });
        }
    </script>
@endsection
