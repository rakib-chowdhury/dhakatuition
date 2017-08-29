<header id="header" class="header-inverse">
    {{--class="header-inverse"--}}
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="{{ url('/')  }}">
                            <img src="{{ asset('/images/logo.png') }}" alt="tutorola" class="img-responsive">
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                <li>
                    <!-- Search form -->
                    <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <li class="dropdown hidden-xs">
                    <a id="offerButton" href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-bell"></i><sup id="offer" class="badge style-danger">0</sup>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Latest Info From Parents</li>
                        <div id="offerNotification"></div>
                        <li><a href="{{ url('/'. Auth::user()->role == 1?'admin':'tutor'.'/offer/notification') }}">View all <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
                <li class="dropdown hidden-xs">
                    <a id="NotificatonButton" href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i><sup id="secretInfo" class="badge style-danger">0</sup>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Latest Info From {{ Auth::user()->role == 1?'Tutor':'Admin' }}</li>
                        <div id="AdminNotification"></div>
                        <li><a href="{{ url('/'. Auth::user()->role == 1?'admin':'tutor'.'/offer/notification') }}">View all <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="{{ asset('/images/avatar.png') }}" alt="" />
                        <span class="profile-info">{{ Auth::user()->first_name .' '. Auth::user()->last_name }}<small>ID - {{ Auth::user()->id }}</small></span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li><a href="">My profile</a></li>
                        <li><a href="">My Status <span class="badge style-success pull-right">Free</span></a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off text-danger"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>