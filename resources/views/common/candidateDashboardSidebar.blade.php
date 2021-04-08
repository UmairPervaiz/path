<ul>
    <li class="active"><i class="fas fa-home"></i><a href="{{url('candidate/dashboard')}}">Dashboard</a></li>
    <li><i class="fas fa-user"></i><a href="edit-profile.php">Edit Profile</a></li>
    <!--                    <li><i class="fas fa-file-alt"></i><a href="resume.php">Resume</a></li>-->
    <li><i class="fas fa-edit"></i><a href="edit-resume.php">Edit Resume</a></li>
    <li><i class="fas fa-heart"></i><a href="bookmarks.php">Bookmarked</a></li>
    <li><i class="fas fa-check-square"></i><a href="applied-jobs.php">Applied Job</a></li>
    <li><i class="fas fa-search"></i><a href="search.php">search</a></li>
    <!--                    <li><i class="fas fa-comment"></i><a href="support-message_NO_NEED.php">Message</a></li> -->
</ul>
<ul class="delete">
    <li><i class="fas fa-power-off"></i><a href="index.php">Logout</a></li>
    <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Profile</a></li>
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
