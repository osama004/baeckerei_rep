<!DOCTYPE html>
<html lang="en">
<head>
    <title>EG - Kaffee & Produkte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|DM+Serif+Display:400,400i&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('ftco-32x32.png')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800">
    <link rel="stylesheet"
          href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u')}}"
          crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
                    aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
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
                                    <a style="text-transform:capitalize" id="navbarDropdown"
                                       class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="login">
                                            Login
                                        </a>

                                        <a class="dropdown-item" href="register">
                                            Registrieren
                                        </a>


                                    </div>
                                </li>
                            @endif
                        @endif

                    @else
                        <li class="nav-item dropdown">
                            <a style="text-transform:capitalize" id="navbarDropdown" class="nav-link dropdown-toggle"
                               href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                               v-pre>
                                <i class="fas fa-user"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile">
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
                    <h1 data-aos="fade-up mb-5">Kaffee & Produkte</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix mb-5 pb-5">
    <div class="container-fluid">
        <div class="row" data-aos="fade">
            <div class="col-md-12 text-center heading-wrap">
                <h2>Unsere Speisekarte</h2>
            </div>
        </div>
    </div>
</div>
<h1 class="product-category"> Sandwiches</h1>
<div class="container">
    <div class="row">
        @foreach($sandwiches as $sandwich)
            <div class="col-md-6 ml-auto mr-auto text-center" style="margin-top: 1em">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="text order-1">
                            <h3> {{$sandwich->bezeichnung}} </h3>
                            <p>{{$sandwich->description}}
                                <i class="fas fa-info-circle" data-toggle="modal"
                                   data-target="#myModal{{$sandwich->product_id}}"></i>
                            </p>
                            {{$sandwich->product_id}}
                            <p class="text-primary h3">{{$sandwich->price}}
                                <i  class="fas fa-cart-arrow-down" style="margin-left:2em">
                                    <button onclick="location.href='{{route('AddToCartProduct',['product_id'=>$sandwich->product_id])}}'" >add</button>
                                </i>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="bg-image order-2 speisekarte" data-aos="fade">
                            <img
                                src="images/{{$sandwich->image}}"
                                alt="" style="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal popup-->
            <div class="modal fade" id="myModal{{$sandwich->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">{{$sandwich->bezeichnung}}</h4>
                            <i style="margin-left:1em; margin-top:5px">{{$sandwich->price}}</i>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>{{$sandwich->description}}</p>
                            <p>Allergene:</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach
    </div>
</div>
<h1 class="product-category"> Brote</h1>

<div class="container">
    <div class="row">
        @foreach($breads as $bread)
            <div class="col-md-6 ml-auto mr-auto text-center" style="margin-top: 1em">
                <div class="row">

                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="text order-1">
                            <h3> {{$bread->bezeichnung}}</h3>
                            <p>{{$bread->description}}
                                <i class="fas fa-info-circle" data-toggle="modal"
                                   data-target="#myModal{{$bread->product_id}}"></i>
                            </p>
                            <p class="text-primary h3">{{$bread->price}}
                                <i class="fas fa-cart-arrow-down" style="margin-left:2em"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="bg-image order-2 speisekarte" data-aos="fade">
                            <img
                                src="images/{{$bread->image}}"
                                alt="" style="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal popup-->
            <div class="modal fade" id="myModal{{$bread->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">{{$bread->bezeichnung}}</h4>
                            <i style="margin-left:1em; margin-top:5px">{{$bread->price}}</i>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>{{$bread->description}}</p>
                            <p>Allergene:</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<h1 class="product-category"> Süßspeisen</h1>

<div class="container">
    <div class="row">
        @foreach($sweets as $sweet)
            <div class="col-md-6 ml-auto mr-auto text-center" style="margin-top: 1em">
                <div class="row">

                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="text order-1">
                            <h3> {{$sweet->bezeichnung}}</h3>
                            <p>{{$sweet->description}}
                                <i class="fas fa-info-circle" data-toggle="modal"
                                   data-target="#myModal{{$sweet->product_id}}"></i>
                            </p>
                            <p class="text-primary h3">{{$sweet->price}}
                                <i class="fas fa-cart-arrow-down" style="margin-left:2em"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="bg-image order-2 speisekarte" data-aos="fade">
                            <img
                                src="images/{{$sweet->image}}"
                                alt="" style="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal popup-->
            <div class="modal fade" id="myModal{{$sweet->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">{{$sweet->bezeichnung}}</h4>
                            <i style="margin-left:1em; margin-top:5px">{{$sweet->price}}</i>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>{{$sweet->description}}</p>
                            <p>Allergene:</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<h1 class="product-category"> Sonstiges</h1>

<div class="container">
    <div class="row">
        @foreach($others as $other)
            <div class="col-md-6 ml-auto mr-auto text-center" style="margin-top: 1em">
                <div class="row">

                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="text order-1">
                            <h3> {{$other->bezeichnung}}</h3>
                            <p>{{$other->description}}
                                <i class="fas fa-info-circle" data-toggle="modal"
                                   data-target="#myModal{{$other->product_id}}"></i>
                            </p>
                            <p class="text-primary h3">{{$other->price}}
                                <i class="fas fa-cart-arrow-down" style="margin-left:2em"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="bg-image order-2 speisekarte" data-aos="fade">
                            <img
                                src="images/{{$other->image}}"
                                alt="" style="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal popup-->
            <div class="modal fade" id="myModal{{$other->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">{{$other->bezeichnung}}</h4>
                            <i style="margin-left:1em; margin-top:5px">{{$other->price}}</i>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>{{$other->description}}</p>
                            <p>Allergene:</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- FOOTER -->
<footer class="site-footer" role="contentinfo">

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 mb-5">
                <h3>Über uns</h3>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor
                    blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>


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
                    <li class="d-block"><span class="d-block text-black">Telefon:</span><span>+1 242 4942 290</span>
                    </li>
                    <li class="d-block"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span>
                    </li>
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

<script
    src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous')}}"></script>
<script
    src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa')}}"></script>
<script src="{{asset('js/respond.js')}}"></script>


</body>
</html>
