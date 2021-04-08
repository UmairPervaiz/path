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
                    <h1>View Applications</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Applications</li>
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
                        <div class="row">
                            <div class="col">
                                <div class="pricing-controller">
                                    {{--                                    <span class="duration duration-month active">Job Title:   </span>--}}
                                    <h4>Job Title: {{$jobss->title}}</h4>
                                    {{--                                    <div class="switch-wrap"><span class="switch"></span></div>--}}
                                    {{--                                    <span class="duration duration-year">Annually <span>Save 10%</span></span>--}}
                                </div>
                            </div>
                            {{--                            <div class="col-md-2">--}}
                            {{--                                <a href="#">Payment history</a>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="manage-candidate-container">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Candidate</th>
                                    <th>Status</th>
                                    <th class="action">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($applied_candidate as $applied_candidate)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr class="candidates-list">
                                        <td style="display: none"> <input type="hidden" name="userid{{$i}}" id="userid{{$i}}" value="{{$applied_candidate->user_id}}"></td>
                                        <td style="display: none"><input type="hidden" name="jobid{{$i}}" id="jobid{{$i}}" value="{{$applied_candidate->job_id}}"></td>
                                        <td class="title">
                                            <div class="thumb">
                                                <img src="{{asset('images/'.$applied_candidate->avatar)}}" class="img-fluid" alt="">

                                            </div>
                                            <div class="body">
                                                <h5><a href="{{route('CandidateResumeView', [ encrypt($applied_candidate->user_id), encrypt($user->id)])}}">{{old('name', isset($applied_candidate) ? $applied_candidate->name : '')}}</a></h5>
                                                <div class="info">
                                                    <span class="designation"><a href="#"><i data-feather="check-square"></i>{{old('category', isset($applied_candidate) ? $applied_candidate->category : '')}}</a></span>
                                                    <span class="location"><a href="#"><i data-feather="map-pin"></i>{{old('location', isset($applied_candidate) ? $applied_candidate->location : '')}} </a></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="status"><i></i>
                                            <select  name="cboJobStatus{{$i}}" id="cboJobStatus{{$i}}" data-plugin-selectTwo class="form-control populate">
                                                <option value="" selected >-- Status --</option>
                                                <option @if($applied_candidate->job_status == 'Ignored') selected @endif value="Ignored">Ignored</option>
                                                <option @if($applied_candidate->job_status == 'Interesting') selected @endif value="Interesting">Interesting</option>
                                                <option @if($applied_candidate->job_status == 'Interview') selected @endif value="Interview">Interview</option>
                                                <option @if($applied_candidate->job_status == 'Hired') selected @endif value="Hired">Hired</option>
                                            </select>
                                            <div style="font-size: 9px;" id="result{{$i}}"></div>
                                        </td>
                                        <td class="action">
                                            <a href="{{route('cv',$applied_candidate->user_id)}}" class="download"><i data-feather="download"></i></a>
                                            <a href="{{url('employee/emailFunction/'.$applied_candidate->user_id)}}"><i data-feather="mail"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
    <div class="footer-bottom-area">
        <div class="container">
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
                <div class="col">
                    <div class="footer-bottom border-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 order-lg-2">
                                <div class="footer-app-download">
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


<script type="text/javascript">
    // function getAddonsPrice(){

        var count_rep = 0;
        if (count_rep === 0) {
            count_rep++;

            $(document).ready(function () {
                $("select").change(function (e) {
                    var idClicked = e.target.id;
                    // alert(idClicked);
                    var suffix = idClicked.match(/\d+/); // 123456
                    console.log(idClicked);
                    console.log(suffix[0]);
                    var user_id = $('#userid'+suffix[0]).val();
                    var job_id = $('#jobid'+suffix[0]).val();
                    var status = $('#cboJobStatus'+suffix[0]).val();
                    // alert(user_id);
                    console.log(user_id);
                    console.log(job_id);
                    console.log(status);
                    e.stopImmediatePropagation();

                    $.ajax({
                        url: "{{ route('changestatus') }}",
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
                            // $('table#users_list tr#'+suffix[0]).hide();
                            // $("#mydiv").load(location.href + " #mydiv");

                            // location.reload();

                        },
                        error: function(result){
                            console.log('error');
                        }
                    });


                });
            });
        }

        //var count_rep = 0;
        // var original_price = parseInt($("#price").text());
        // var addon_price = $("#price").text();
        // if (count_rep == 0) {
        //     $("input[type=checkbox]").change(function(e){
        //
        //         var idClicked = e.target.id;
        //         alert(idClicked);
        //         var checkBox = document.getElementById(idClicked);
        //         if(checkBox.checked ==  true){
        //             var suffix = idClicked.match(/\d+/); // 123456
        //             console.log(idClicked);
        //             console.log(suffix[0]);
        //             var addon_amount = "#addon_amount"+suffix[0];
        //             var addon_amount_rst = parseInt($(addon_amount).text());
        //             console.log(addon_amount_rst);
        //
        //             var newprice = original_price + addon_amount_rst;
        //             console.log(newprice);
        //             $('#price').text(newprice);
        //             $('#id_amount').val(newprice);
        //         }else if(checkBox.checked ==  false){
        //             var suffix = idClicked.match(/\d+/); // 123456
        //             console.log(idClicked);
        //             console.log(suffix[0]);
        //             var addon_amount = "#addon_amount"+suffix[0];
        //             var addon_amount_rst = parseInt($(addon_amount).text());
        //             console.log(addon_amount_rst);
        //
        //             var newprice = original_price - addon_amount_rst;
        //             console.log(newprice);
        //             $('#price').text(newprice);
        //             $('#id_amount').val(newprice);
        //         }
        //     });
        //     count_rep++;
        // }

    // }
</script>


<script type="text/javascript">
    // function getAddonsPrice(){

    $("#email").on("click",function(){
        let idClicked = e.target.id;
        // alert(idClicked);
        let suffix = idClicked.match(/\d+/); // 123456
        console.log(idClicked);
        console.log(suffix[0]);

        let user_id = $('#userid'+suffix[0]).val();
        console.log(user_id);
        // alert(console.log(user_id));

        e.stopImmediatePropagation();

        $.ajax({
            {{--url: '{{url('./')}}',--}}
            url: '{{url('employee/email/{id}')}}',
            // type: 'GET',
            method: 'post',
            data: {

                "_token": "{{ csrf_token() }}",
                user_id: user_id,
            },
            success: function(response)
            {
                console.log('Ajax submitted');
            }
        });

    });
        {{--var count_rep = 0;--}}
        {{--if (count_rep === 0) {--}}
        {{--    count_rep++;--}}

        {{--    $(document).ready(function () {--}}
        {{--        $("#email").change(function (e) {--}}
        {{--            var idClicked = e.target.id;--}}
        {{--            alert(idClicked);--}}
        {{--            var suffix = idClicked.match(/\d+/); // 123456--}}
        {{--            console.log(idClicked);--}}
        {{--            console.log(suffix[0]);--}}
        {{--            var user_id = $('#userid'+suffix[0]).val();--}}
        {{--            var job_id = $('#jobid'+suffix[0]).val();--}}
        {{--            var status = $('#cboJobStatus'+suffix[0]).val();--}}
        {{--            console.log(user_id);--}}
        {{--            console.log(job_id);--}}
        {{--            console.log(status);--}}
        {{--            e.stopImmediatePropagation();--}}

        {{--            $.ajax({--}}
        {{--                url: "{{ route('changestatus') }}",--}}
        {{--                method: 'post',--}}
        {{--                data: {--}}

        {{--                    "_token": "{{ csrf_token() }}",--}}
        {{--                    status: status,--}}
        {{--                    job_id: job_id,--}}
        {{--                    user_id: user_id,--}}
        {{--                },--}}
        {{--                success: function(result){--}}
        {{--                    console.log(result);--}}
        {{--                    $('#result'+suffix[0]).text(result);--}}
        {{--                    // $('table#users_list tr#'+suffix[0]).hide();--}}
        {{--                    // $("#mydiv").load(location.href + " #mydiv");--}}

        {{--                    // location.reload();--}}

        {{--                },--}}
        {{--                error: function(result){--}}
        {{--                    console.log('error');--}}
        {{--                }--}}
        {{--            });--}}


        {{--        });--}}
        {{--    });--}}
        {{--}--}}
</script>

<script>

    var count_rep = 0;
    if (count_rep === 0) {
        count_rep++;

        $(document).ready(function () {
            $(".email_").onclick(function (e) {
                var idClicked = e.target.id;
                 // alert(idClicked);

                });


            });

    }
    function sendEmail() {
        var id=$(this).attr('.email_');//find each id
        // alert(id);

    }
</script>
