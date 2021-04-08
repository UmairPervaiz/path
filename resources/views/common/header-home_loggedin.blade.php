<header class=" ">

    <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto job-browse">
                <li class="nav-item dropdown">
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Browse Jobs</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="search-by">
                            <h5>BY Category</h5>
                            <ul>
                                <li><a href="#">Accounting / Finance <span>(233)</span></a></li>
                                <li><a href="#">Education <span>(46)</span></a></li>
                                <li><a href="#">Design & Creative <span>(156)</span></a></li>
                                <li><a href="#">Health Care <span>(98)</span></a></li>
                                <li><a href="#">Engineer & Architects <span>(188)</span></a></li>
                                <li><a href="#">Marketing & Sales <span>(124)</span></a></li>
                                <li><a href="#">Garments / Textile <span>(584)</span></a></li>
                                <li><a href="#">Customer Support <span>(233)</span></a></li>
                            </ul>
                        </li>
                        <li class="search-by">
                            <h5>BY LOcation</h5>
                            <ul>
                                <li><a href="#">Kuwait <span>(508)</span></a></li>
                                <li><a href="#">United Arab Emirates<span>(96)</span></a></li>
                                <li><a href="#">Saudi Arabia <span>(155)</span></a></li>
                                <li><a href="#">Qatar <span>(24)</span></a></li>
                                <li><a href="#">Oman <span>(10)</span></a></li>
                                <li><a href="#">Bahrain <span>(268)</span></a></li>
                                <li><a href="#">Jordon <span>(46)</span></a></li>
                                <li><a href="#">Lebanon <span>(12)</span></a></li>
                                <li><a href="#">Eygpt <span>(456)</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto main-nav " >





                <!--            <li class="menu-item post-job"><a title="Title" href="post-job.php"><i class="fas fa-plus"></i>Post a Job</a></li>-->
            </ul>
            <ul class="navbar-nav ml-auto account-nav">

                <li class="menu-item login-popup"><button title="Title" type="button" data-toggle="modal" data-target="#exampleModalLong">Login</button></li>
                <li class="menu-item login-popup"><button title="Title" type="button" data-toggle="modal" data-target="#exampleModalLong2">Registration</button></li>
            </ul>
        </div>
    </nav>
    <!-- Modal -->
    <div class="account-entry">
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="user"></i>Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="form-group">
                                <input type="email" placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="more-option">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="#">Forget Password?</a>
                            </div>
                            <button class="button primary-bg btn-block">Login</button>
                        </form>
                        <div class="shortcut-login">
                            <p>Don't have an account? <a href="#">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="account-type">
                            <a href="#" class="candidate-acc active"><i data-feather="user"></i>Candidate</a>
                            <a href="#" class="employer-acc"><i data-feather="briefcase"></i>Employer</a>
                        </div>
                        <form action="#">
                            <div class="form-group">
                                <input type="text" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="more-option terms">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        I accept the <a href="#">terms & conditions</a>
                                    </label>
                                </div>
                            </div>
                            <button class="button primary-bg btn-block">Register</button>
                        </form>
                        <div class="shortcut-login">
                            <p>Already have an account? <a href="#">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
