@extends('layouts.index')
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Warenkorb</title>
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
                        <a class="nav-link" href="{{route('weeklyCart')}}">Wochenkarte</a>
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

                                        <a class="dropdown-item" href="{{route('/register')}}" >
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
                                <a class="dropdown-item" href="{{ route('logout')}}"
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
                            <i class="fas fa-shopping-cart" style =  "color: #A1E944">
                                @if(Session::has('cart'))
                                    <span class="cart-with-numbers">
                                        {{ Session::get('cart')->totalQuantity }}
                                   </span>
                                @endif
                            </i>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="slider-wrap">
    <div class="slider-item" style="background-image: url('images/new_filler_1.jpg');">
       <div class="container">
           <div class ="row">
               <div class="col-md-6 offset-md-3">
                   <div class="card">
                       <div >
                           @include('alerts.emptyCart')
                       </div>
                       <div class = "card-header">
                           Ihr Warenkorb:
                       </div>
                       <div class="card-body">
                           @foreach($cartItems ->items as $item)
                               <div style="margin-top: 15px">
                               <tr>
                                   <td class="cart_description">
                                       <h4><a href="">{{$item['data']['title']}}</a>
                                           <a class="cart_quantity_delete" href="{{ route('DeleteItemFromCart',['product_id' => $item['data']['product_id']]) }}"><i class="fa fa-times"></i></a>
                                       </h4>
                                       <p>{{$item['data']['description']}} </p>
                                   </td>
                                   <td class="cart_price">
                                       <p>{{$item['data']['price']}}€</p>
                                   </td>
                                   <td class="cart_quantity">
                                       <div class="cart_quantity_button">
                                           <a class="cart_quantity_down" href="{{route('DecreaseSingleProduct', ['product_id' => $item['data']['product_id']])}}"> - </a>
                                           <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['quantity']}}" autocomplete="off" size="2">
                                           <a class="cart_quantity_up" href="{{route('IncreaseSingleProduct', ['product_id' => $item['data']['product_id']])}}"> + </a>
                                       </div>
                                   </td>
                                   <td class="cart_delete">
                                   </td>

                               </tr>
                               </div>
                           @endforeach
                               <hr>
                               <ul class="col-sm-6">
                                   <div class="total_area">
                                       <ul>
                                           <li>Anzahl der Items: <span>{{$cartItems->totalQuantity}}</span></li>
                                           <li>Gesamtpreis: <span>{{number_format($cartItems->totalPrice,2, ',')}}€</span></li>
                                       </ul>
                                   </div>

                               </ul>
                       </div>
                       @if (Route::has('login'))
                               <button type="submit" class="btn btn-primary float-right" onclick="location.href='{{route('CreateOrder')}}'" >Bestellen</button>
                       @else
                           <button type="submit" class="btn btn-primary float-right" onclick="location.href='{{route('/login')}}'">Bestellen</button>
                       @endif
                   </div>
               </div>
           </div>
       </div>
    </div>

</div>
@endsection

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
