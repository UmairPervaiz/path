<?php $rootPath ="../";?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}
    <title>PATH</title>

    <!-- Bootstrap CSS -->

    @include('common.libraries')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

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
                    <h1>Manage Jobs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Jobs</li>
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
                        <div class="manage-job-container">
{{--                            <table id="example" class="table">--}}
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
                                @if($jobs != '')
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($jobs as $job)
                                        @php
                                            $i++;
                                        @endphp
                                        <td style="display: none"> <input type="hidden" name="userid{{$i}}" id="userid{{$i}}" value="{{$job->user_id}}"></td>
                                        <td style="display: none"><input type="hidden" name="jobid{{$i}}" id="jobid{{$i}}" value="{{$job->id}}"></td>
                                    @endforeach
                                @endif
                            <table id="myTable" class="table">

                                <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Applications</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th class="action">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($jobs != '')
                                    @php
                                        $i = 0;
                                    @endphp
                                @foreach($jobs as $job)
                                    @php
                                        $i++;
                                    @endphp
                                <tr class="job-items">

                                    <td class="title">
                                        <h5><a href="{{route('postjobview',encrypt($job->id) )}}">{{($job->title)}}</a></h5>
                                        <div class="info">
                                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$job->job_location}}</a></span>
                                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>{{($job->type)}}</a></span>
                                        </div>
                                    </td>
                                    <td class="application"><a href="{{url('employee/manageCandidate', [encrypt(Auth::user()->id), 'job_id' => encrypt($job->id)] )}}">
                                            @php
                                           $job_id = $job->id;

                                            $count_total_application = DB::table('candidate_applied_jobs')->where('job_id', $job_id)->count();
                                            @endphp
                                            {{$count_total_application}} Application(s)
                                        </a></td>
                                    <td class="deadline">{{$job->endingDate}}</td>
{{--                                    <td class="status active">Active</td>--}}
                                    <td class="status"><i></i>
                                        <select  name="cboJobStatus{{$i}}" id="cboJobStatus{{$i}}" data-plugin-selectTwo class="form-control populate">
                                            {{--                                                <option @if($applied_candidate->job_status == )  selected @ended="" value="value">name</option>--}}

                                            <option value="" selected >-- Status --</option>
                                            {{--                                                @foreach($candidate_job as $candidate_jobs)--}}
                                            {{--                                                <option value="{{old('status', isset($candidate_jobs->status) ? $candidate_jobs->status : '')}}" selected >{{$candidate_jobs[0]->status}}</option>--}}
                                            {{--                                                @endforeach--}}
                                            @foreach($job_status as $job_statuss)
                                                <option value="{{$job_statuss->name}}" {{$job->status == $job_statuss->name  ? 'selected' : ''}}>{{$job_statuss->name}}</option>
                                            @endforeach
                                        </select>
                                        <div style="font-size: 9px;" id="result{{$i}}"></div>
                                    </td>
                                    <td class="action">
                                        <a href="{{route('postjobview',encrypt($job->id) )}}" class="preview" title="Preview"><i data-feather="eye"></i></a>
                                        <a href="{{route('postJobEdit', encrypt($job->id) )}}" class="edit" title="Edit"><i data-feather="edit"></i></a>
                                        <a href="{{route('deleteJob', encrypt($job->id))}}" class="remove" title="Delete"><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                    @endif

                                </tbody>
                            </table>
                            {{-- @include('employee/pagination_data') --}}




                            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

                            {{-- <div class="pagination-list text-center">
                                <nav class="navigation pagination">
                                    <div class="nav-links">
                                        <a class="prev page-numbers" href="#"><i class="fas fa-angle-left"></i></a>
                                        <a class="page-numbers" href="#">1</a>
                                        <span aria-current="page" class="page-numbers current">2</span>
                                        <a class="page-numbers" href="#">3</a>
                                        <a class="page-numbers" href="#">4</a>
                                        <a class="next page-numbers" href="#"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </nav>
                            </div> --}}
                        </div>
                    </div>
                    @include('common.side_bar_employ')

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer-bg">
{{--    <div class="footer-top border-bottom section-padding-top padding-bottom-40">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="footer-logo">--}}
{{--                        <a href="#">--}}
{{--                            <img src="{{asset('asset/images/footer-logo.png')}}" class="img-fluid" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="footer-social">--}}
{{--                        <ul class="social-icons">--}}
{{--                            <li><a href="#"><i data-feather="facebook"></i></a></li>--}}
{{--                            <li><a href="#"><i data-feather="twitter"></i></a></li>--}}
{{--                            <li><a href="#"><i data-feather="linkedin"></i></a></li>--}}
{{--                            <li><a href="#"><i data-feather="instagram"></i></a></li>--}}
{{--                            <li><a href="#"><i data-feather="youtube"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('js/map.js')}}"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "bSort" : false,
            });
        });
    </script>
</body>
</html>

<script type="text/javascript">
    // function getAddonsPrice(){

    let count_rep = 0;
    if (count_rep === 0) {
        count_rep++;

        $(document).ready(function () {
            $("select").change(function (e) {
                let idClicked = e.target.id;
                // alert(idClicked);
                let suffix = idClicked.match(/\d+/); // 123456
                console.log(idClicked);
                console.log(suffix[0]);
                let user_id = $('#userid'+suffix[0]).val();
                let job_id = $('#jobid'+suffix[0]).val();
                let status = $('#cboJobStatus'+suffix[0]).val();
                // alert(job_id);

                console.log(user_id);
                console.log(job_id);
                console.log(status);
                e.stopImmediatePropagation();

                $.ajax({
                    url: "{{ route('changeJobstatus') }}",
                    method: 'post',
                    data: {

                        "_token": "{{ csrf_token() }}",
                        status: status,
                        job_id: job_id,
                        user_id: user_id,
                    },
                    success: function(result){
                        console.log(result);
                        $('#result'+suffix[0]).text(result);

                    },
                    error: function(result){
                        console.log('error');
                    }
                });


            });
        });
    }
</script>
