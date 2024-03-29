@extends('layouts.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wochenkarte</title>
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
@section('content')
<header role="banner">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Bäckquem</a>
            <a href="https://www.twitter.com" class="p-2" target="_blank" rel="noopener noreferrer"><span class="fa fa-twitter"></span></a>
            <a href="https://www.facebook.com" class="p-2" target="_blank" rel="noopener noreferrer"><span class="fa fa-facebook"></span></a>
            <a href="https://www.instagram.com" class="p-2" target="_blank" rel="noopener noreferrer"><span class="fa fa-instagram"></span></a>
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
                        <a class="nav-link" href="{{route('kaffee&products')}}">Kaffee & Produkte</a>
                    </li>

                    <div class="divider"></div>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('weeklyCart')}}">Wochenkarte</a>
                    </li>

                    <div class="divider"></div>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('regionalProducts')}}">Regionale Produkte</a>
                    </li>

                    <div class="divider"></div>

                    <li class="nav-item">
                        <a class="nav-link" href="app">App</a>
                    </li>

                    <div class="divider"></div>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Kontakt</a>
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
                                        <a class="dropdown-item" href="{{route('/login')}}" >
                                            Login
                                        </a>

                                        <a class="dropdown-item" href="/register" >
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
                                <a class="dropdown-item" href="{{route('/userprofile')}}" >
                                    Mein Profil
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Ausloggen') }}
                                </a>
                                @if($userData -> isAdmin())
                                    <a class="dropdown-item" href="{{route('adminDisplayProducts')}}">
                                        Admin Dashboard
                                    </a>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <div class="divider"></div>

                    <li class="nav-item" href="{{route('shoppingcart')}}">
                        <a class="nav-link" href="{{route('shoppingcart')}}">
                            <i class="fas fa-shopping-cart">
                                 <span id ="cartAjax" class="cart-with-numbers">
                                     @if(Session::has('cart'))
                                         {{ Session::get('cart')->totalQuantity }}
                                     @endif
                                </span>
                            </i>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- END header -->

<div class="slider-wrap">
    <div class="slider-item" style="background-image: url('/storage/images/new_filler_1.jpeg');">
        <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-8 text-center col-sm-12 ">
                    <h1 data-aos="fade-up mb-5">Wochenkarte</h1>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
            <div class="row" data-aos="fade">
                <div class="col-md-12 text-center heading-wrap">
                    <h2 class="menulistitem">Das wöchentliche Angebot:</h2>
                </div>
            </div>
        </div>
    </div>


<div class="container ">
    <div class="row">
        <ul class="item-list">
            @foreach($weeklyProducts as $weeklyProduct)
                <li class="menulistitem">
                    <div style="margin-top: 1em">
                        <div class="item-card">
                            <div class="row">
                                {{ csrf_field() }}
                                <div class="col-md-6 ml-auto mr-auto text-center">
                                    <div class="text order-1 textbox">
                                        <h5 class="itemtitle">{{$weeklyProduct->title}}  </h5>
                                        <p>{{$weeklyProduct->description}}
                                            <button class="infobutton">
                                                <i class="fas fa-info-circle" data-toggle="modal"
                                                   data-target="#myModal{{$weeklyProduct->product_id}}"></i>
                                            </button>
                                        </p >
                                        <p class="h5" style="margin-top: -12px">
                                            {{$weeklyProduct->price}} €
                                            <button class="cartbutton ajaxGET" >
                                                <i  class="fas fa-cart-arrow-down"> </i>
                                                <i id="url" style="display: none">{{route('AddToCartProduct',['product_id'=>$weeklyProduct->product_id])}}</i>
                                            </button>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
                <!-- modal popup-->
                <div class="modal fade" id="myModal{{$weeklyProduct->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">{{$weeklyProduct->title}}</h5>
                                <i style="margin-left:1em; margin-top:5px">€{{$weeklyProduct->price}}</i>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>{{$weeklyProduct->description}}</p>
                                <h5>Allergene:<br></h5>
                                @foreach($allergens as $allergen)
                                    @continue($allergen -> product_id != $weeklyProduct->product_id)
                                    <p>{{$allergen -> name}}:  {{$allergen -> type}},    {{$allergen ->describe_type}}</p>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.ajaxGET').click(function(e){
            e.preventDefault();
            var url = $(this).find('#url').text();
            var _token = $("input[name='_token']").val();
            $.ajax({
                method:"GET",
                url:url,
                data:{_token: _token},
                success:function(data,status,XHR){
                    //alert(data[1]['totalQuantity']);
                    // var totalQuantity = data[1];
                    $('#cartAjax').text(data[1]['totalQuantity']);
                },
                error:function(xhr,status,error){
                    alert(error);
                }
            });
        });
    });
</script>


@endsection
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
