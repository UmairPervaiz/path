<html>

    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashboard.css')}}">

    <style>
        .print-button {
            display: block;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 10000;
        }
    </style>

    <style media="print">
        @media print {
            body * {
                visibility: visible;
                overflow-y: hidden
            }

            .none {
                display: none
            }

            .print_area * {
                visibility: visible
            }

            .left {
                display: none
            }

            .right {
                display: none
            }

            /* .col-md-7{
                            width:100% !important;
                        } */
            .print {
                height: 100%;
                width: 100%;
                position: relative;
                top: 0;
                left: 0;
                right: 0;
                margin: 0;
                overflow: hidden;
            }

          

            * {
                -webkit-print-color-adjust: exact !important;
                /* Chrome, Safari */
                color-adjust: exact !important;
                /*Firefox*/
            }


        }
    </style>

    <body>
        <div class="row none print-button">
            <button style="height: 50px;width:50px" class="btn btn-primary" onclick="myPrint()"><i style="font-size:26px" class="fa fa-print my-float"></i></button>
        </div>

        

        <div class="alice-bg section-padding-bottom" id="">
            <div class="container no-gliters">
                <div class="row no-gliters">
                    <div class="col-lg-12 col-md-12">
                        <div class="dashboard-container" style="justify-content:center !important">

                            <div class="dashboard-content-wrapper print">

                                <div class="logo-area" style="display: flex">
                                    <a href="#"><img src="{{asset('asset/images/logo-2.png')}}" alt=""></a>
                                </div>

                                <h3 style="color: 	#cc494a; text-align: center ">CV</h3>

                                <div class="about-details details-section dashboard-section">
                                    <h4><i data-feather="align-left"></i>About Me</h4>
                                    <p>{{ old('about', isset($candidate_abouts) ? $candidate_abouts->about : '' )}}</p>
                                    <div class="information-and-contact">
                                        @if($candidate_abouts != '')
                                            <div class="information" style="background: #FFFFFF	">
                                                <h4>Information</h4>
                                                <ul>
                                                    <li><span>Category:</span> {{old('category', isset($candidate_abouts) ? $candidate_abouts->category : '')}}</li>
                                                    <li><span>Location:</span> {{ old('location', isset($candidate_abouts) ? $candidate_abouts->location : '')}}</li>
                                                    <li><span>Career Level:</span> {{old('status', isset($candidate_abouts) ? $candidate_abouts->career_level : '')}}</li>
                                                    <li><span>Experience:</span> {{old('experience', isset($candidate_abouts) ? $candidate_abouts->experience : '') }}</li>
                                                    <li><span>Salary:</span> {{old('salary', isset($candidate_abouts) ? $candidate_abouts->salary : '')}}</li>
                                                    <li><span>Gender:</span> {{old('gender', isset($candidate_abouts) ? $candidate_abouts->gender : '')}}</li>
                                                    <li><span>Age:</span> {{old('age', isset($candidate_abouts) ? $candidate_abouts->age : '')}}</li>
                                                    <li><span>Qualification:</span> {{old('qualification', isset($candidate_abouts) ? $candidate_abouts->qualification : '')}}</li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    

                                    <div class="modal fade" id="modal-about-me" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="title">
                                                        <h4><i data-feather="align-left"></i>About Me</h4>
                                                    </div>

                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    <div class="content">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form action="#" method="post">
                                    @csrf
                                    <div class="skill-and-profile dashboard-section">
                                        <div class="skill">
                                            <label>Skills:</label>
                                                @foreach ($candidateSkills as $item)
                                                    <a href="#">{{$item->skill }}</a>                                            
                                                @endforeach
                                        </div>

                                    </div>
                                </form>

                                <div class="edication-background details-section dashboard-section" style="margin-top: 20px">
                                    <h4><i data-feather="book"></i>Education Background</h4>
                                    <br>

                                    @foreach ($candidateEducations as $item)
                                        <div class="education-label">
                                            <span class="study-year">{{$item->period}}</span>
                                            <h5>{{$item->title}}<span>{{$item->institution}}</span></h5>
                                            <p>{{$item->description}}</p>
                                        </div>
                                    @endforeach

                                </div>
                            
                                <div class="experience dashboard-section details-section" style="margin-top: 20px">
                                    <h4><i data-feather="briefcase"></i>Work Experiance</h4>
                                    <br>
                                    @foreach ($candidateExperiences as $item)
                                        <div class="experience-section">
                                            <span class="service-year">{{$item->period}}</span>
                                            <h5>{{$item->title}}<span>{{$item->company}}</span></h5>
                                            <p>{{$item->description}}</p>
                                        </div>
                                    @endforeach
                                        

                                </div>

                                <div class="professonal-skill dashboard-section details-section" style="margin-top: 20px">
                                    <h4><i data-feather="feather"></i>Professional Skill</h4>
                                        <br>
                                    @foreach ($candidateProfessionalSkills as $item)
                                        <p>{{$item->description}}</p>
                                        <div class="progress-group">
                                            <div class="progress-item">
                                                <div class="progress-head">
                                                    <p class="progress-on">{{$item->skill_name}}</p>
                                                </div>
                                                <div class="progress-body">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                                                    </div>
                                                    <p class="progress-to">{{$item->percentage}}%</p>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                
                                </div>

                                <div class="special-qualification dashboard-section details-section" style="margin-top: 20px">
                                    <h4><i data-feather="gift"></i>Special Qualification</h4>
                                    <br>
                                    <ul>
                                        @foreach ($candidateSpecialQualifications as $item)
                                            <li>{{$item->qualification_name}}</li>
                                        @endforeach
                                    </ul>
                                
                                </div>

                                <div class="personal-information dashboard-section  details-section" style="margin-top: 20px">
                                    <h4><i data-feather="user-plus"></i>Personal Deatils</h4>
                                    <ul>
                                        <li><span>First Name:</span> {{old('firstName', isset($candidate_personal_informations) ? $candidate_personal_informations->firstName : '')}}</li>
                                        <li><span>Last Name:</span> {{old('lastName', isset($candidate_personal_informations) ? $candidate_personal_informations->lastName : '')}}</li>
                                            <li><span>Full Name:</span> {{old('full_name', isset($candidate_personal_informations) ? $candidate_personal_informations->full_name : '') }}</li>
                                            <li><span>Father's Name:</span> {{old('father_name', isset($candidate_personal_informations) ? $candidate_personal_informations->father_name : '')}}</li>
                                            <li><span>Mother's Name:</span> {{old('mother_name', isset($candidate_personal_informations) ? $candidate_personal_informations->mother_name : '')}}</li>
                                            <li><span>Date of Birth:</span> {{old('DOB', isset($candidate_personal_informations) ? $candidate_personal_informations->DOB : '') }}</li>
                                            <li><span>Nationality:</span> {{old('nationality', isset($candidate_personal_informations) ? $candidate_personal_informations->nationality : '') }} </li>
                                            <li><span>Gender:</span> {{old('gender', isset($candidate_personal_informations) ? $candidate_personal_informations->gender : '')}} </li>
                                        <li><span>Marital Status:</span> {{old('maritalStatus', isset($candidate_personal_informations) ? $candidate_personal_informations->maritalStatus : '')}} </li>
                                        <li><span>Dependents:</span> {{old('dependents', isset($candidate_personal_informations) ? $candidate_personal_informations->dependents : '')}} </li>
                                            <li><span>Age:</span> {{old('age', isset($candidate_personal_informations) ? $candidate_personal_informations->age : '') }}</li>
                                            <li><span>Address:</span> {{old('address', isset($candidate_personal_informations) ? $candidate_personal_informations->address : '')}}</li>
                                    </ul>
                            
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('asset/js/jquery.min.js')}}"></script>
        <script src="{{asset('asset/js/feather.min.js')}}"></script>
        <script src="{{asset('asset/js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('asset/js/jquery.nstSlider.min.js')}}"></script>
        <script src="{{asset('asset/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('asset/js/visible.js')}}"></script>
        <script src="{{asset('asset/js/plyr.js')}}"></script>
        <script src="{{asset('asset/js/tinymce.min.js')}}"></script>
        <script src="{{asset('asset/js/slick.min.js')}}"></script>
        <script src="{{asset('asset/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>

        <script>
            function myPrint() {              
              window.print();
            }
        </script>

    </body>

</html>

