<div class="dashboard-sidebar">
    <div class="user-info">
        <div class="thumb">
            @if(Auth::user()->avatar !=null)
                <a href="{{route('candidatedashboardd', Auth::user()->id)}}">
                <img class="img-fluid" src="{{ asset('images/'.Auth::user()->avatar) }}" alt="">
                </a>
            @else
                <a href="{{route('candidatedashboardd', Auth::user()->id)}}">
                <img src="{{asset('dashboard/images/user-1.jpg')}}" class="img-fluid" alt="">
                </a>
            @endif
        </div>
        <div class="user-body">
            <h5>{{Auth::user()->name}}</h5>
            <span>{{Auth::user()->email}}</span>
        </div>
    </div>
    <div class="profile-progress">
        <div class="progress-item">
            <div class="progress-head">
                <p class="progress-on">Profile</p>
            </div>
            <div class="progress-body">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$profilePercentage}}" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                </div>
                <p class="progress-to">{{$profilePercentage}}%</p>
            </div>
        </div>
    </div>
    <div class="dashboard-menu">
        <ul>
            <li class="{{ (Route::currentRouteName() == 'candidatedashboardd') ? 'active' : '' }}"><i class="fas fa-home"></i><a href="{{url('candidate/dashboard', Auth::user()->id)}}">Dashboard</a></li>
            <li class="{{ (Route::currentRouteName() == 'edit_profile') ? 'active' : '' }}"><i class="fas fa-user"></i><a href="{{url('candidate/edit_profile', Auth::user()->id)}}">Edit Profile</a></li>
            <li class="{{ (Route::currentRouteName() == 'edit_resume') ? 'active' : '' }}"><i class="fas fa-edit"></i><a href="{{url('candidate/edit_resume', Auth::user()->id)}}">Edit Resume</a></li>
            <li class="{{ (Route::currentRouteName() == 'applied_job') ? 'active' : '' }}"><i class="fas fa-check-square"></i><a href="{{url('candidate/applied_job', Auth::user()->id)}}">Applied Job</a></li>
            <li class="{{ (Route::currentRouteName() == 'search') ? 'active' : '' }}"><i class="fas fa-search"></i><a href="{{url('candidate/search', Auth::user()->id)}}">search</a></li>
            <li class="{{ (Route::currentRouteName() == 'accountStatistics') ? 'active' : '' }}"><i class="fas fa-briefcase"></i><a href="{{route('accountStatistics', Auth::user()->id)}}">Account Statistics</a></li>

        </ul>
        <ul class="delete">
            <li><i class="fas fa-power-off"></i><a  href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a></li>
            {{--                                <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Profile</a></li>--}}
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
