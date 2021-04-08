<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand pull-left" href="{{route('adminDashboard')}}">Path Admin <span class="sml_t">3</span></a>
            <ul class="nav navbar-nav" id="mobile-nav">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-list-alt"></span> Forms <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?uid=1&amp;page=form_elements">Form elements</a></li>
                        <li><a href="index.php?uid=1&amp;page=form_extended">Extended form elements</a></li>
                        <li><a href="index.php?uid=1&amp;page=form_validation">Form Validation</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-th"></span> Components <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?uid=1&amp;page=alerts_btns">Alerts &amp; Buttons</a></li>
                        <li><a href="index.php?uid=1&amp;page=icons">Icons</a></li>
                        <li><a href="index.php?uid=1&amp;page=notifications">Notifications</a></li>
                        <li><a href="index.php?uid=1&amp;page=tables">Tables</a></li>
                        <li><a href="index.php?uid=1&amp;page=tables_more">Tables (more examples)</a></li>
                        <li><a href="index.php?uid=1&amp;page=tabs_accordion">Tabs &amp; Accordion</a></li>
                        <li><a href="index.php?uid=1&amp;page=tooltips">Tooltips, Popovers</a></li>
                        <li><a href="index.php?uid=1&amp;page=typography">Typography</a></li>
                        <li><a href="index.php?uid=1&amp;page=widgets">Widget boxes</a></li>
                        <li class="dropdown">
                            <a href="#">Sub menu <b class="caret-right"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Sub menu 1.1</a></li>
                                <li><a href="#">Sub menu 1.2</a></li>
                                <li><a href="#">Sub menu 1.3</a></li>
                                <li>
                                    <a href="#">Sub menu 1.4 <b class="caret-right"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Sub menu 1.4.1</a></li>
                                        <li><a href="#">Sub menu 1.4.2</a></li>
                                        <li><a href="#">Sub menu 1.4.3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-wrench"></span> Plugins <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?uid=1&amp;page=charts">Charts</a></li>
                        <li><a href="index.php?uid=1&amp;page=calendar">Calendar</a></li>
                        <li><a href="index.php?uid=1&amp;page=datatable">Datatable</a></li>
                        <li><a href="index.php?uid=1&amp;page=dynamic_tree">Dynamic tree</a></li>
                        <li><a href="index.php?uid=1&amp;page=editable_elements">Editable elements</a></li>
                        <li><a href="index.php?uid=1&amp;page=file_manager">File Manager</a></li>
                        <li><a href="index.php?uid=1&amp;page=floating_header">Floating List Header</a></li>
                        <li><a href="index.php?uid=1&amp;page=google_maps">Google Maps</a></li>
                        <li><a href="index.php?uid=1&amp;page=gallery">Gallery Grid</a></li>
                        <li><a href="index.php?uid=1&amp;page=wizard">Wizard</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-file"></span> Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?uid=1&amp;page=blog_page"> Blog Page</a></li>
                        <li><a href="index.php?uid=1&amp;page=chat"> Chat</a></li>
                        <li><a href="error_404.html"> Error 404</a></li>
                        <li><a href="index.php?uid=1&amp;page=invoice"> Invoice</a></li>
                        <li><a href="index.php?uid=1&amp;page=mailbox">Mailbox</a></li>
                        <li><a href="index.php?uid=1&amp;page=search_page">Search page</a></li>
                        <li><a href="index.php?uid=1&amp;page=user_profile">User profile</a></li>
                        <li><a href="index.php?uid=1&amp;page=user_static">User profile (static)</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav user_menu pull-right">
                <li class="hidden-phone hidden-tablet">
                    <div class="nb_boxes clearfix">
                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
                    </div>
                </li>
                <li class="divider-vertical hidden-sm hidden-xs"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="flag-gb"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"><i class="flag-de"></i> Deutsch</a></li>
                        <li><a href="javascript:void(0)"><i class="flag-fr"></i> Français</a></li>
                        <li><a href="javascript:void(0)"><i class="flag-es"></i> Español</a></li>
                        <li><a href="javascript:void(0)"><i class="flag-ru"></i> Pусский</a></li>
                    </ul>
                </li>
                <li class="divider-vertical hidden-sm hidden-xs"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('admin/img/user_avatar.png')}}" alt="" class="user_avatar">{{Auth::user()->name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?uid=1&amp;page=user_profile">My Profile</a></li>
                        <li><a href="javascrip:void(0)">Another action</a></li>
                        <li class="divider"></li>
                        {{--										<li><a href="index.php">Log Out</a></li>--}}
                        <li>
                            <a class="ti-power-off" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="myMail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">New Messages</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                <table class="table table-condensed table-striped" data-provides="rowlink">
                    <thead>
                    <tr>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Size</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Declan Pamphlett</td>
                        <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                        <td>23/05/2012</td>
                        <td>25KB</td>
                    </tr>
                    <tr>
                        <td>Erin Church</td>
                        <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                        <td>24/05/2012</td>
                        <td>15KB</td>
                    </tr>
                    <tr>
                        <td>Koby Auld</td>
                        <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                        <td>25/05/2012</td>
                        <td>28KB</td>
                    </tr>
                    <tr>
                        <td>Anthony Pound</td>
                        <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                        <td>25/05/2012</td>
                        <td>33KB</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default">Go to mailbox</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myTasks">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">New Tasks</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                <table class="table table-condensed table-striped" data-provides="rowlink">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Summary</th>
                        <th>Updated</th>
                        <th>Priority</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>P-23</td>
                        <td><a href="javascript:void(0)">Admin should not break if URL…</a></td>
                        <td>23/05/2012</td>
                        <td><span class="label label-danger">High</span></td>
                        <td>Open</td>
                    </tr>
                    <tr>
                        <td>P-18</td>
                        <td><a href="javascript:void(0)">Displaying submenus in custom…</a></td>
                        <td>22/05/2012</td>
                        <td><span class="label label-warning">Medium</span></td>
                        <td>Reopen</td>
                    </tr>
                    <tr>
                        <td>P-25</td>
                        <td><a href="javascript:void(0)">Featured image on post types…</a></td>
                        <td>22/05/2012</td>
                        <td><span class="label label-success">Low</span></td>
                        <td>Updated</td>
                    </tr>
                    <tr>
                        <td>P-10</td>
                        <td><a href="javascript:void(0)">Multiple feed fixes and…</a></td>
                        <td>17/05/2012</td>
                        <td><span class="label label-warning">Medium</span></td>
                        <td>Open</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default">Go to task manager</button>
            </div>
        </div>
    </div>
</div>
