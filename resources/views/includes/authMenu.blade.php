<div id="menubar"  class="">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="">
                <span class="text-lg text-bold text-primary ">TUTOROLA</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">
            @if(Auth::user()->role == 1)
            <li>
                <a href="{{ url('/admin/panel') }}" >
                    <div class="gui-icon"><i class="fa fa-dashcube"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/offers') }}">
                    <div class="gui-icon"><i class="fa fa-briefcase"></i></div>
                    <span class="title">Offers</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/tutors') }}" >
                    <div class="gui-icon"><i class="fa fa-user-secret"></i></div>
                    <span class="title">Tutors</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{ url('admin/info') }}">
                    <div class="gui-icon"><i class="fa fa-sliders"></i></div>
                    <span class="title">Tutoring Info</span>
                </a>
            </li>
            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-book"></i></div>
                    <span class="title">Education Info</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ url('/admin/education/label') }}" ><span class="title">Education-Label</span></a></li>
                    <li><a href="{{ url('/admin/education/major') }}" ><span class="title">Major-Group</span></a></li>
                    <li><a href="{{ url('/admin/education/curriculum') }}" ><span class="title">Curriculum</span></a></li>
                </ul><!--end /submenu -->
            </li>
            <li>
                <a href="{{ url('/admin/location') }}">
                    <div class="gui-icon"><i class="fa fa-map-marker"></i></div>
                    <span class="title">Location Info</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/notification') }}" >
                    <div class="gui-icon"><i class="fa fa-bell-o"></i></div>
                    <span class="title">Notification</span>
                </a>
            </li>
                <li>
                    <a href="{{ url('/admin/about') }}" >
                        <div class="gui-icon"><i class="glyphicon glyphicon-user"></i></div>
                        <span class="title">About Us</span>
                    </a>
                </li>
            {{--tutor menu -- -- -- -- -- -- -- --- -- -- -- -- -- -- --}}
            @else
            <li>
                <a href="{{ url('/tutor/panel') }}" >
                    <div class="gui-icon"><i class="fa fa-dashcube"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/tutor/offers') }}">
                    <div class="gui-icon"><i class="fa fa-briefcase"></i></div>
                    <span class="title">Offers</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/tutor/profile') }}">
                    <div class="gui-icon"><i class="fa fa-user-md"></i></div>
                    <span class="title">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/tutor/settings') }}" >
                    <div class="gui-icon"><i class="fa fa-sliders"></i></div>
                    <span class="title">Settings</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/tutor/status') }}" >
                    <div class="gui-icon"><i class="fa fa-line-chart"></i></div>
                    <span class="title">Status</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/tutor/notification') }}" >
                    <div class="gui-icon"><i class="fa fa-bell-o"></i></div>
                    <span class="title">notification</span>
                </a>
            </li>
            @endif
        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2017</span> <strong>TutorOla</strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->