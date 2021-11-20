
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Erlebnisgastronomie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|DM+Serif+Display:400,400i&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('ftco-32x32.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav ml-auto pl-lg-5 pl-0">

                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kaffee">Kaffee & Produkte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wochenkarte">Wochenkarte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="regionales">Regionale Produkte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="app">App</a>
                    </li>


                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Einloggen') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrieren') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

                    <li class="nav-item">
                        <a class="nav-link" href="kontakt">Kontakt</a>
                    </li>
                </ul>





            </div>
        </div>
    </nav>
</header>
<!-- END header -->

<div class="slider-wrap">
    <section class="home-slider owl-carousel">


        <div class="slider-item" style="background-image: url('img/hero_1.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 ">
                        <h1 data-aos="fade-up mb-5">Eat, Drinks at Gourmet</h1>
                        <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-white btn-outline-white">Get Started</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url('img/hero_2.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 ">
                        <h1 data-aos="fade-up mb-5">Enjoy delicious food at Gourmet</h1>
                        <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-white btn-outline-white">Get Started</a></p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END slider -->
</div>


<section class="section bg-light py-5  bottom-slant-gray">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <img src="{{asset('img/hero_1.jpg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="text-left heading-wrap">
                    <h2 data-aos="fade-up">The Restaurant</h2>
                </div>
                <!-- <h3 class="mb-4">Welcome To Our Restaurant</h3> -->
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ut enim quam laboriosam illum amet.</p>
                <p>Obcaecati nisi ipsum possimus necessitatibus tempore, illo id facere magni quisquam quam quaerat accusamus dolores?</p>
                <p><img src="{{asset('img/signature.png')}}" alt="Image" class="img-fluid w-25"></p>
            </div>

        </div>
    </div>
</section>


<section class="section pb-0">
    <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade">
            <div class="col-md-7 text-center heading-wrap">
                <h2 data-aos="fade-up">Best &amp; Good</h2>
                <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-4">
                <img src="{{asset('img/dishes_1.jpg')}}" alt="Image" class="img-fluid about_img_1" data-aos="fade" data-aos-delay="200">
            </div>
            <div class="col-lg-4">
                <img src="{{asset('img/about_1.jpg')}}" alt="Image" class="img-fluid about_img_1" data-aos="fade" data-aos-delay="200">
            </div>
            <div class="col-lg-4">
                <img src="{{asset('img/dishes_3.jpg')}}" alt="Image" class="img-fluid about_img_1" data-aos="fade" data-aos-delay="500">
            </div>
        </div>
    </div>
</section>

<section class="section ">

    <div class="clearfix mb-5 pb-5">
        <div class="container-fluid mb-5">
            <div class="row" data-aos="fade">
                <div class="col-md-12 text-center heading-wrap">
                    <h2>Special Menu</h2>
                </div>
            </div>
        </div>
        <div class="owl-carousel centernonloop">
            <a href="#" class="item-dishes" data-aos="fade-right" data-aos-delay="100">
                <div class="text">
                    <p class="dishes-price">$11.50</p>
                    <h2 class="dishes-heading">Organic tomato salad, gorgonzola cheese, capers</h2>
                </div>
                <img src="{{asset('img/dishes_1.jpg')}}" alt="" class="img-fluid">
            </a>
            <a href="#" class="item-dishes" data-aos="fade-right" data-aos-delay="200">
                <div class="text">
                    <p class="dishes-price">$12.00</p>
                    <h2 class="dishes-heading">Baked broccoli</h2>
                </div>
                <img src="{{asset('img/dishes_2.jpg')}}" alt="" class="img-fluid">
            </a>
            <a href="#" class="item-dishes" data-aos="fade-right" data-aos-delay="300">
                <div class="text">
                    <p class="dishes-price">$11.00</p>
                    <h2 class="dishes-heading">Spicy meatballs</h2>
                </div>
                <img src="{{asset('img/dishes_3.jpg')}}" alt="" class="img-fluid">
            </a>
            <a href="#" class="item-dishes" data-aos="fade-right" data-aos-delay="400">
                <div class="text">
                    <p class="dishes-price">$12.00</p>
                    <h2 class="dishes-heading">Eggplant parmigiana</h2>
                </div>
                <img src="{{asset('img/dishes_4.jpg')}}" alt="" class="img-fluid">
            </a>
        </div>
    </div>

</section> <!-- .section -->

<section class="section bg-light  top-slant-white bottom-slant-gray">

    <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
            <div class="row" data-aos="fade">
                <div class="col-md-12 text-center heading-wrap">
                    <h2>Our Menu</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="sched d-block d-lg-flex">
                    <div class="bg-image order-2" style="background-image: url('img/dishes_4.jpg');" data-aos="fade"></div>
                    <div class="text order-1">
                        <h3>Baked new Zealand mussels </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">$12.00</p>
                    </div>

                </div>

                <div class="sched d-block d-lg-flex">
                    <div class="bg-image" style="background-image: url('img/dishes_1.jpg');" data-aos="fade"></div>
                    <div class="text">
                        <h3>Spicy Calamari and beans</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">$12.00</p>

                    </div>

                </div>

            </div>

            <div class="col-md-6">
                <div class="sched d-block d-lg-flex">
                    <div class="bg-image order-2" style="background-image: url('img/dishes_2.jpg');" data-aos="fade"></div>
                    <div class="text order-1">
                        <h3>Bacon wrapped wild gulf prawns</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">$18.00</p>

                    </div>

                </div>

                <div class="sched d-block d-lg-flex">
                    <div class="bg-image" style="background-image: url('img/dishes_3.jpg');" data-aos="fade"></div>
                    <div class="text">
                        <h3>Seared ahi tuna fillet*, honey-ginger sauce</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">$16.00</p>

                    </div>

                </div>

            </div>
        </div>

        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="sched d-block d-lg-flex">
                    <div class="bg-image order-2" style="background-image: url('img/dishes_4.jpg');" data-aos="fade"></div>
                    <div class="text order-1">
                        <h3>Baked new Zealand mussels </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">$12.00</p>
                    </div>

                </div>

                <div class="sched d-block d-lg-flex">
                    <div class="bg-image" style="background-image: url('img/dishes_1.jpg');" data-aos="fade"></div>
                    <div class="text">
                        <h3>Spicy Calamari and beans</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">$12.00</p>

                    </div>

                </div>

            </div>

            <div class="col-md-6">
                <div class="sched d-block d-lg-flex">
                    <div class="bg-image order-2" style="background-image: url('img/dishes_2.jpg');" data-aos="fade"></div>
                    <div class="text order-1">
                        <h3>Bacon wrapped wild gulf prawns</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">$18.00</p>

                    </div>

                </div>

                <div class="sched d-block d-lg-flex">
                    <div class="bg-image" style="background-image: url('img/dishes_3.jpg');" data-aos="fade"></div>
                    <div class="text">
                        <h3>Seared ahi tuna fillet*, honey-ginger sauce</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                        <p class="text-primary h3">$16.00</p>

                    </div>

                </div>

            </div>
        </div>


    </div>
</section> <!-- .section -->



<section class="section relative-higher">

    <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
            <div class="row" data-aos="fade">
                <div class="col-md-12 text-center heading-wrap">
                    <h2>Testimonial</h2>
                    <!-- <span class="back-text">Testimonial</span> -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="owl-carousel centernonloop2">
                    <div class="slide" data-aos="fade-left" data-aos-delay="100">
                        <blockquote class="testimonial">
                            <p>&ldquo; Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. &rdquo;</p>
                            <div class="d-flex author">
                                <img src="{{asset('img/person_1.jpg')}}" alt="" class="mr-4">
                                <div class="author-info">
                                    <h4>Mellisa Howard</h4>
                                    <p>CEO, XYZ Company</p>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                    <div class="slide" data-aos="fade-left" data-aos-delay="200">
                        <blockquote class="testimonial">
                            <p>&ldquo; Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. &rdquo;</p>
                            <div class="d-flex author">
                                <img src="{{asset('img/person_2.jpg')}}" alt="" class="mr-4">
                                <div class="author-info">
                                    <h4>Mike Richardson</h4>
                                    <p>CEO, XYZ Company</p>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                    <div class="slide" data-aos="fade-left" data-aos-delay="300">
                        <blockquote class="testimonial">
                            <p>&ldquo; Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. &rdquo;</p>
                            <div class="d-flex author">
                                <img src="{{asset('img/person_3.jpg')}}" alt="" class="mr-4">
                                <div class="author-info">
                                    <h4>Charles White</h4>
                                    <p>CEO, XYZ Company</p>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>




    </div>
</section> <!-- .section -->

<section class="section  bg-light top-slant-white">
    <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
            <div class="row" data-aos="fade">
                <div class="col-md-12 text-center heading-wrap">
                    <h2>Blog</h2>
                    <span class="back-text">Our Blog</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="blog d-block">
                    <a class="bg-image d-block" href="single.html" style="background-image: url('img/dishes_1.jpg');"></a>
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
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="blog d-block">
                    <a class="bg-image d-block" href="single.html" style="background-image: url('img/dishes_2.jpg');"></a>
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

</section> <!-- .section -->

<footer class="site-footer" role="contentinfo">

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 mb-5">
                <h3>About Us</h3>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>
                <ul class="list-unstyled footer-link d-flex footer-social">
                    <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
                    <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
                </ul>

            </div>
            <div class="col-md-5 mb-5">
                <div class="mb-5">
                    <h3>Opening Hours</h3>
                    <p><strong class="d-block font-weight-normal text-black">Sunday-Thursday</strong> 5AM - 10PM</p>
                </div>
                <div>
                    <h3>Contact Info</h3>
                    <ul class="list-unstyled footer-link">
                        <li class="d-block">
                            <span class="d-block text-black">Address:</span>
                            <span>34 Street Name, City Name Here, United States</span></li>
                        <li class="d-block"><span class="d-block text-black">Phone:</span><span>+1 242 4942 290</span></li>
                        <li class="d-block"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <h3>Quick Links</h3>
                <ul class="list-unstyled footer-link">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Disclaimers</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3">

            </div>
        </div>
        <div class="row">
            <div class="col-12 text-md-center text-left">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </p>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#cf1d16"/></svg></div>

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
