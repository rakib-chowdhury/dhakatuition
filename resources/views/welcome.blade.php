<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} | Excelence In Home Tutoring</title>

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/css/bootstrap.css?1422792965') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('/css/font-awesome.min.css?1422792965') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('/css/select2.min.css?1425466319') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('/css/home.css?1422792965') }}" />

        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
    <!----------------------------------------------
     ! Home
     !---------------------------------------------->
    <section id="home">
        <!-- header section -->
        <header id="headerSection">
            <div class="container">
                <div class="row">
                    <!-- log0 -->
                    <div class="col-sm-4 logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/images/logo.png') }}" alt="Dhaka Tuitions" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-sm-8 header_menu">
                        <ul class="nav nav-pills pull-right">
                            <li><a href="{{ url('/') }}">HOME</a></li>
                            <li><a href="{{ url('/offers') }}">JOBS</a></li>
                            <li><a href="{{ url('/tutors') }}">TUTORS</a></li>
                            <li><a href="{{ url('/About_us') }}">ABOUT US</a></li>
                            <li><a href="{{ url('/#contact') }}">CONTACT</a></li>
                            @if (Auth::guest())

                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="caret"></span>
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
                                                {{ csrf_field() }}
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
        <!-- slider Section -->
        <section class="hero">
            <div class="container">
            	@include('includes.flashMessage')
                <div class="hero_content text-center">
                    <h2>Meet <b>Tutor</b></h2>
                    <h3><span>/Excellence</span> in Home Tutoring</h3>
                    <div class="hero_search">
                        <form action="{{ url('/offers') }}" class="form-inline">
                            <div class="form-group">
                                <label for="searchCity"><i class="fa fa-map-marker"></i></label>
                                <select name="location"  id="location" class="singleSelect form-control" placeholder="location"></select>
                            </div>
                            <div class="form-group">
                                <label for="medium"><i class="fa fa-location-arrow"></i></label>
                                <select name="medium" id="medium" class="singleSelect form-control" placeholder="Medium"></select>
                            </div>
                            <div class="form-group">
                                <label for="classes"><i class="fa fa-location-arrow"></i></label>
                                <select name="classes"  id="classes" class="singleSelect form-control" placeholder="Classes"></select>
                            </div>
                            <div class="form-group">
                                <label for="subject"><i class="fa fa-location-arrow"></i></label>
                                <select name="subject"  id="subject" class="singleSelect form-control" placeholder="Subject"></select>
                            </div>
                            <div class="form-group">
                                <label for="searchCity" class="select"><i class="fa fa-user"></i></label>
                                <select name="userChose" id="search_select_cat" class="singleSelect form-control "><option></option></select>
                            </div>
                            <div class="form-group">
                                <button class="btn search_submit_btn"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="auth_div">
                        <p>Are you become a Tutor? Please
                            <a href="{{ url('/login') }}">Login</a> OR
                            <a href="{{ url('/register') }}">Register</a>
                        </p>
                    </div>
                    <div class="offer_div">
                        <p><span>For Parents</span> <a href="{{ url('/offer_post') }}" class="tuition_btn">Post Tuition</a> Without Authenticate</p>
                    </div>
                </div>

            </div>
        </section>
    </section>


    <!----------------------------------------------
     ! Features
     !---------------------------------------------->
    <section id="features">
        <div class="container">
            <div class="section_title text-center">
                <h2>FEATURES</h2>
                <img src="{{ asset('/images/title_bar.png') }}" alt="title bar">
            </div>
            <div class="row">
                <article class="col-sm-4 feature text-center">
                    <div class="feature_thumb">
                        <img src="{{ asset('/images/tutor.jpg') }}" alt="tutor">
                    </div>
                    <div class="feature_content">
                        <h1><span>2455</span> TUTORS</h1>
                        <h4>Lorem ipsum dolor sit amet, consectetur.</h4>
                    </div>
                </article>
                <article class="col-sm-4 feature text-center">
                    <div class="feature_thumb">
                        <img src="{{ asset('/images/opportunity.jpg') }}" alt="opportunity">
                    </div>
                    <div class="feature_content">
                        <h1><span>2455</span> opportunities</h1>
                        <h4>Lorem ipsum dolor sit amet, consectetur.</h4>
                    </div>
                </article>
                <article class="col-sm-4 feature text-center">
                    <div class="feature_thumb">
                        <img src="{{ asset('/images/branches.jpg') }}" alt="branches">
                    </div>
                    <div class="feature_content">
                        <h1><span>2455</span> Locations</h1>
                        <h4>Lorem ipsum dolor sit amet, consectetur.</h4>
                    </div>
                </article>
            </div>
        </div>
    </section>


    <!----------------------------------------------
     ! Tutors
     !---------------------------------------------->
    <section id="tutors">
        <div class="container">
            <div class="section_title text-center">
                <h2>MEET TOP TUTOR</h2>
                <img src="{{ asset('/images/title_bar.png') }}" alt="title bar">
            </div>
            <div class="row" id="tutorSlide">
                <div class="col-sm-3  tutor text-center">
                    <div class="tutor_thumb">
                        <img src="{{ asset('/images/profile.jpg') }}" alt="tutor" class="img-responsive">
                        <div class="thumb_hover text-left">
                            <h4>Expert in tutoring</h4>
                            <h4>ON <span>Bangla</span><span>English</span> Medium</h4>
                            <p>At <span>English</span><span>Math</span><span>Biology</span></p>
                        </div>
                    </div>
                    <div class="tutor_content">
                        <h3>Eti</h3>
                        <p>At <b>Banani</b></p>
                    </div>
                </div>
                <div class="col-sm-3 tutor text-center">
                    <div class="tutor_thumb">
                        <img src="{{ asset('/images/tutors/1.jpg') }}" alt="tutor" class="img-responsive">
                        <div class="thumb_hover text-left">
                            <h4>Expert in tutoring</h4>
                            <h4>ON <span>Bangla</span><span>English</span> Medium</h4>
                            <p>At <span>English</span><span>Math</span><span>Biology</span></p>
                        </div>
                    </div>
                    <div class="tutor_content">
                        <h3>Rezia</h3>
                        <p>At <b>Banani</b></p>
                    </div>
                </div>
                <div class="col-sm-3 tutor text-center">
                    <div class="tutor_thumb">
                        <img src="{{ asset('/images/tutors/2.jpg') }}" alt="tutor" class="img-responsive">
                        <div class="thumb_hover text-left">
                            <h4>Expert in tutoring</h4>
                            <h4>ON <span>Bangla</span><span>English</span> Medium</h4>
                            <p>At <span>English</span><span>Math</span><span>Biology</span></p>
                        </div>
                    </div>
                    <div class="tutor_content">
                        <h3>Sakil</h3>
                        <p>At <b>Banani</b></p>
                    </div>
                </div>
                <article class="col-sm-3 tutor text-center">
                    <div class="tutor_thumb">
                        <img src="{{ asset('/images/tutors/3.jpg') }}" alt="tutor" class="img-responsive">
                        <div class="thumb_hover text-left">
                            <h4>Expert in tutoring</h4>
                            <h4>ON <span>Bangla</span><span>English</span> Medium</h4>
                            <p>At <span>English</span><span>Math</span><span>Biology</span></p>
                        </div>
                    </div>
                    <div class="tutor_content">
                        <h3>Kamrul</h3>
                        <p>At <b>Banani</b></p>
                    </div>
                </article>
            </div>
        </div>
    </section>


    <!----------------------------------------------
     ! Testimonial
     !---------------------------------------------->
    <section id="testimonial">
        <div class="container-fluid">
            <div class="section_title text-center">
                <h2>Our Achievement</h2>
                <img src="{{ asset('/images/title_bar.png') }}" alt="title bar">
            </div>
            <div id="testimonial_slide" class="testimonial_slide carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="carousel-caption test-center">
                            <img src="{{ asset('/images/tutor.jpg') }}" alt="guardian">
                            <div class="caption_content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem magnam neque quia ratione tempora. Corporis dolor fugit iusto laborum unde?</p>
                                <h4><span>#</span>Md. Abul</h4>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-caption test-center">
                            <img src="{{ asset('/images/tutor.jpg') }}" alt="guardian">
                            <div class="caption_content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem magnam neque quia ratione tempora. Corporis dolor fugit iusto laborum unde?</p>
                                <h4><span>#</span>Md. Abul dsfds</h4>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-caption test-center">
                            <img src="{{ asset('/images/tutor.jpg') }}" alt="guardian">
                            <div class="caption_content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem magnam neque quia ratione tempora. Corporis dolor fugit iusto laborum unde?</p>
                                <h4><span>#</span>Md. Abul</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#testimonial_slide" role="button" data-slide="prev"><i class="fa fa-arrow-left"></i></a>
                <a class="right carousel-control" href="#testimonial_slide" role="button" data-slide="next"><i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </section>


    <!----------------------------------------------
     ! Contact
     !---------------------------------------------->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 contact_address">
                    <address>
                        <strong>Dhaka Tuitions.</strong><br>
                        House no. 2, Flat no. 205<br>
                        Eindira road, Firmgate, Dhaka<br>
                        <abbr title="Phone">Mobile no.</abbr> (+88) 01710544500
                    </address>

                    <address>
                        <strong>Email</strong><br>
                        <a href="mailto:#">support@dhakatuitions.com</a>
                    </address>
                </div>
                <div class="col-sm-9 contact_form">
                    <div class="form pull-left" style="width: 92%">
                        <h3>Say Hello</h3>
                        <form action="{{ url('/send_contact_mail') }}" class="form">
                            <div class="row">
                                <div class=" col-sm-6 form-group {{ $errors->has('name')?'error': '' }}">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                    @include('errors.formValidateError',['inputName'=>'name'])
                                </div>
                                <div class=" col-sm-6 form-group {{ $errors->has('email')?'error': '' }}">
                                    <label for="Email">Email</label>
                                    <input type="email" name="email" class="form-control" required pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*">
                                    <span style='color:peru'>*Please Enter Valid Mail Address for sending mail.</span>
                                    @include('errors.formValidateError',['inputName'=>'email'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('message')?'error': '' }}">
                                <label for="message">Message</label>
                                <textarea name="message" class="form-control" required></textarea>
                                @include('errors.formValidateError',['inputName'=>'message'])
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn pull-right"><i class="fa fa-envelope-o"></i> Send Message</button>
                            </div>
                        </form>
                    </div>
                    <div class="link pull-right" style="width: 6%">
                        <ul class="nav text-center">
                            <li><a target="_blank" href="https://www.facebook.com/Dhakatuition"><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>@include('includes.flashMessage')
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
            All Right Reserved By Dhakatuitions.com
        </p>
    </footer>

    <!----------------------------------------------
     ! js intrigate
     !---------------------------------------------->
    {{--<script type="javascript" src="{{ asset('/js/app.js') }}"></script>--}}
    <script src="js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="{{ asset('/js/libs/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/coreData.js') }}"></script>

    <script>

        $(document).ready(function() {

            $(".singleSelect").select2({ width: '70%' });
            $("#search_select_cat").select2({
                placeholder: 'Looking For',
                data: [
                    {id: 1, text: 'Tutor' },
                    {id: 2, text: 'Offer' }
                ]
            });
            $('#testimonial_slide').carousel();
        });

    </script>
    </body>
</html>
