
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bäckquem</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|DM+Serif+Display:400,400i&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('ftco-32x32.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link href="{{asset('/css/all.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">


    <link rel="stylesheet" href="{{asset('fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<header role="banner">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Bäckquem</a>
            <a href="https://www.twitter.com" class="p-2"><span class="fa fa-twitter"></span></a>
            <a href="https://www.facebook.com" class="p-2"><span class="fa fa-facebook"></span></a>
            <a href="https://www.instagram.com" class="p-2"><span class="fa fa-instagram"></span></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav ml-auto pl-lg-5 pl-0">





                        <li class="nav-item">
                            <a class="nav-link active" href="/">Home</a>
                        </li>

                        <div class="divider"></div>

                        <li class="nav-item">
                            <a class="nav-link" href="kaffee&products">Kaffee & Produkte</a>
                        </li>

                        <div class="divider"></div>

                        <li class="nav-item">
                            <a class="nav-link" href="wochenkarte">Wochenkarte</a>
                        </li>

                        <div class="divider"></div>

                        <li class="nav-item">
                            <a class="nav-link" href="regionales">Regionale Produkte</a>
                        </li>

                        <div class="divider"></div>

                        <li class="nav-item">
                            <a class="nav-link" href="app">App</a>
                        </li>

                        <div class="divider"></div>





                        <li class="nav-item">
                            <a class="nav-link" href="kontakt">Kontakt</a>
                        </li>

                        <div class="divider"></div>

                        @guest
                            @if (Route::has('login'))
                                @if (Route::has('register'))
                                    <li class="nav-item dropdown">
                                        <a  style="text-transform:capitalize"  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-user"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="login" >
                                                Login
                                            </a>

                                            <a class="dropdown-item" href="register" >
                                                Registrieren
                                            </a>
                                        </div>
                                    </li>
                                    <div class="divider"></div>

                                @endif
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a  style="text-transform:capitalize"  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="profile" >
                                        Mein Profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Ausloggen') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>


                        @endguest

                        <li class="nav-item" href="shoppingcart">
                            <a class="nav-link" href="shoppingcart">
                              <i class="fas fa-shopping-cart"></i>
                            </a>

                        </li>
                    </ul>
            </div>
        </div>
    </nav>
</header>
<!-- END header -->

<div class="slider-wrap">
    <div class="slider-item" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-8 text-center col-sm-12 ">
                    <h1 data-aos="fade-up mb-5">HOME</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section bg-light py-5  bottom-slant-gray">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <img src="{{asset('images/hero_1.jpg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="text-left heading-wrap">
                    <h2 data-aos="fade-up">The Restaurant</h2>
                </div>
                <!-- <h3 class="mb-4">Welcome To Our Restaurant</h3> -->
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ut enim quam laboriosam illum amet.</p>
                <p>Obcaecati nisi ipsum possimus necessitatibus tempore, illo id facere magni quisquam quam quaerat accusamus dolores?</p>
                <p><img src="{{asset('images/signature.png')}}" alt="Image" class="img-fluid w-25"></p>
            </div>

        </div>
    </div>
</section>



    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="blog d-block">
                    <a class="bg-image d-block" href="single.html" style="background-image: url('images/dishes_1.jpg');"></a>
                    <div class="text">
                        <h3><a href="single.html">How To Bake A Good Taste Food</a></h3>
                        <p class="sched-time">
                            <span> April 22, 2018</span> <br>
                        </p>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

                        <p><a href="#" class="btn btn-primary btn-sm">Read More</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 mb-5">
                <h3>Über uns</h3>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>


            </div>
            <div class="col-md-5 mb-5">
                    <h3>Öffnungszeiten</h3>
                    <p><strong class="d-block font-weight-normal text-black">Sunday-Thursday</strong> 5AM - 10PM</p>
            </div>
            <div class="col-md-3 mb-5">
                <h3>Kontaktdaten</h3>
                <ul class="list-unstyled footer-link">
                    <li class="d-block">
                        <span class="d-block text-black">Adresse:</span>
                        <span>Jägerstraße 62, 1200 Wien Österreich </span></li>
                    <li class="d-block"><span class="d-block text-black">Telefon:</span><span>+1 242 4942 290</span></li>
                    <li class="d-block"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
                </ul>
            </div>
        </div>

    </div>
</footer>

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#cf1d16"/></svg>
</div>

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>

<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific-popup-options.js')}}"></script>


<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
