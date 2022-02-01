
<!DOCTYPE html>
<html lang="en">
<head>
    <title>EG - Kaffee & Produkte</title>
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
            <a class="navbar-brand" href="/">Erlebnisgastronomie</a>
            <a href="https://www.twitter.com" class="p-2"><span class="fa fa-twitter"></span></a>
            <a href="https://www.facebook.com" class="p-2"><span class="fa fa-facebook"></span></a>
            <a href="https://www.instagram.com" class="p-2"><span class="fa fa-instagram"></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav ml-auto pl-lg-5 pl-0">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>

                    <div class="divider"></div>

                    <li class="nav-item">
                        <a class="nav-link active" href="kaffee&products">Kaffee & Produkte</a>
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
                    <div class="divider"></div>

                    <li class="nav-item" href="warenkorb">
                        <a class="nav-link" href="warenkorb">
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
                    <h1 data-aos="fade-up mb-5">Kaffee & Produkte</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section bg-light  top-slant-white bottom-slant-gray">

    <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
            <div class="row" data-aos="fade">
                <div class="col-md-12 text-center heading-wrap">
                    <h2>Unsere Speisekarte</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach($sandwiches as $sandwich)
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <div class="bg-image order-2 speisekarte"  data-aos="fade">
                        <img
                            src="images/{{$sandwich->image_id}}"
                            alt="" style="">
                    </div>
                    <div class="text order-1">
                        <h3> {{$sandwich->name}}</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">{{$sandwich->price}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container">
        @foreach($breads as $bread)
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <div class="bg-image order-2 speisekarte"  data-aos="fade">
                        <img
                            src="images/{{$bread->image_id}}"
                            alt="" style="">
                    </div>
                    <div class="text order-1">
                        <h3> {{$bread->name}}</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">{{$bread->price}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container">
        @foreach($sweets as $sweet)
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <div class="bg-image order-2 speisekarte"  data-aos="fade">
                        <img
                            src="images/{{$sweet->image_id}}"
                            alt="" style="">
                    </div>
                    <div class="text order-1">
                        <h3> {{$sweet->name}}</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">{{$sweet->price}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container">
        @foreach($others as $other)
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <div class="bg-image order-2 speisekarte"  data-aos="fade">
                        <img
                            src="images/{{$other->image_id}}"
                            alt="" style="">
                    </div>
                    <div class="text order-1">
                        <h3> {{$other->name}}</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">{{$other->price}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>





</section> <!-- .section -->

<footer class="site-footer" role="contentinfo">

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 mb-5">
                <h3>Über uns</h3>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>


            </div>
            <div class="col-md-5 mb-5">
                <div class="mb-5">
                    <h3>Öffnungszeiten</h3>
                    <p><strong class="d-block font-weight-normal text-black">Sunday-Thursday</strong> 5AM - 10PM</p>
                </div>

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
            <div class="col-md-3">

            </div>
        </div>

    </div>
</footer>
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
