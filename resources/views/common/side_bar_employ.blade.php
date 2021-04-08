<div class="dashboard-sidebar">
    <div class="company-info">
        <div class="thumb">
            @if(Auth::user()->avatar !=null)
                <a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">
                <img class="img-fluid" src="{{ asset('images/'.Auth::user()->avatar) }}" alt="">
                </a>
            @else
                <a href="{{route('employeedashboard', encrypt(Auth::user()->id))}}">
                <img src="{{asset('dashboard/images/user-1.jpg')}}" class="img-fluid" alt="">
                </a>
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
            <li class="{{ (Route::currentRouteName() == 'employeedashboard') ? 'active' : '' }}"><i class="fas fa-home"></i><a href="{{url('employee/dashboard',encrypt(Auth::user()->id))}}">Dashboard</a></li>
            <li class="{{ (Route::currentRouteName() == 'editprofile') ? 'active' : '' }}"><i class="fas fa-user"></i><a href="{{url('employee/editprofile', encrypt(Auth::user()->id))}}">Edit Profile</a></li>
            <li class="{{ (Route::currentRouteName() == 'managejob') ? 'active' : '' }}"><i class="fas fa-briefcase"></i><a href="{{url('employee/managejob', encrypt(Auth::user()->id))}}">Manage Jobs</a></li>
            {{--                                <li><i class="fas fa-users"></i><a href="{{url('employee/manageCandidate', encrypt(Auth::user()->id))}}">Manage Candidates</a></li>--}}
            {{--  <li><i class="fas fa-heart"></i><a href="{{url('employee/shortListedResume', encrypt(Auth::user()->id))}}">Shortlisted Resumes</a></li>  --}}
            <li class="{{ (Route::currentRouteName() == 'postjob') ? 'active' : '' }}"><i class="fas fa-plus-square"></i><a href="{{url('employee/postjob', encrypt(Auth::user()->id))}}">Post New Job</a></li>
            <li class="{{ (Route::currentRouteName() == 'pricing' || Route::currentRouteName() == 'paymentHistory') ? 'active' : '' }}"><i class="fas fa-calculator"></i><a href="{{url('employee/pricing', encrypt(Auth::user()->id))}}">Pricing Plans</a></li>
            {{-- <li><i class="fas fa-calculator"></i><a href="{{url('employee/pricingPlaneEditPage', encrypt(Auth::user()->id))}}">Pricing Plans Edit Page</a></li> --}}
            {{-- <li><i class="fas fa-calculator"></i><a href="{{url('employee/managePricing', encrypt(Auth::user()->id))}}">Pricing Plans Edit View Page</a></li> --}}
        </ul>
        <ul class="delete">
            {{--  <li><i class="fas fa-power-off"></i><a href="#">Logout</a></li>  --}}
            <li><i class="fas fa-power-off"></i><a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a></li>
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
