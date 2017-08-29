<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Excellence in home tutoring</title>

    <!-- style -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/bootstrap.css?1422792965') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/font-awesome.min.css?1422792965') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/home.css?1422792965') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/materialadmin.css?1422792965') }}" />
    @yield('customCss')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
<!----------------------------------------------
 ! Home
 !---------------------------------------------->
<!-- header section -->
<header id="headerSection" class="headerSectionBackground">
    <div class="container">
        <div class="row">
            <!-- log0 -->
            <div class="col-sm-4 logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('/images/logo.png') }}" alt="tutorola" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-8 header_menu">
                <ul class="nav nav-pills pull-right">
                    <li><a href="{{ url('/') }}">HOME</a></li>
                    <li><a href="{{ url('/offers') }}">JOBS</a></li>
                    <li><a href="{{ url('/tutors') }}">TUTORS</a></li>
                    <li><a href="{{ url('/about') }}">ABOUT US</a></li>
                    <li><a href="{{ url('/#contact') }}">CONTACT</a></li>
                    @if (Auth::guest())

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php $role = (Auth::user()->role==1)?'admin':'tutor'; ?>
                                <li><a href="{{ url('/'. $role .'/panel') }}"><i class="fa fa-dashcube"></i>Dashboard</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header><!-- /header section -->

<!----------------------------------------------
 ! Features
 !---------------------------------------------->
<section id="" class="no-padding style-default-bright">
    <div class="container">
        <div class="card no-margin">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</section>


<!----------------------------------------------
 ! Footer
 !---------------------------------------------->
<section id="footer">
    <div class="container">
        <div class="row">
            <article class="col-sm-4 footer_subscribe">
                <h4>Subscribe </h4>
                <form action="" class="form">
                    <input type="email" class="form-control" placeholder="subscribe">
                    <button class="btn"><i class="fa fa-long-arrow-right"></i></button>
                </form>
            </article>
            <article class="col-sm-3 footer_link">
                <h4>Quick Link</h4>
                <ul class="nav row">
                    <li class="col-xs-6"><a href="">Home</a></li>
                    <li class="col-xs-6"><a href="">Jobs</a></li>
                    <li class="col-xs-6"><a href="">Tutors</a></li>
                    <li class="col-xs-6"><a href="">Contact</a></li>
                    <li class="col-xs-6"><a href="">AboutUs</a></li>
                    <li class="col-xs-6"><a href="">Locations</a></li>
                </ul>
            </article>
            <article class="col-sm-5 text-center footer_about">
                <img src="{{ asset('/images/logo.png') }}" alt="logo">
                <p class="text-left">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam aut cupiditate doloremque, ducimus enim excepturi iste molestiae neque, nulla omnis pariatur provident quam qui quos ratione, sapiente similique voluptatibus.
                    <a href="">More...</a>
                </p>
            </article>
        </div>
    </div>
</section>
<footer class="text-center">
    <p class="copy_right">
        All Right Reserved By Tutorola.com
    </p>
</footer>

<!----------------------------------------------
 ! js intrigate
 !---------------------------------------------->
<script src="{{ asset('/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('/js/libs/bootstrap/bootstrap.min.js') }}"></script>
@yield('customJs')
</body>
</html>

