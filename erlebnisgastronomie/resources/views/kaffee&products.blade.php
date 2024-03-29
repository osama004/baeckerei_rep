@extends('layouts.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kaffee & Produkte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|DM+Serif+Display:400,400i&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('ftco-32x32.png')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800">
    <link rel="stylesheet"
          href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh5u')}}"
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
@section('content')
<header role="banner">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Bäckquem</a>
            <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer" class="p-2"><span class="fa fa-twitter"></span></a>
            <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" class="p-2"><span class="fa fa-facebook"></span></a>
            <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" class="p-2"><span class="fa fa-instagram"></span></a>
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
                        <a class="nav-link active" href="{{route('kaffee&products')}}">Kaffee & Produkte</a>
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
                                    <a style="text-transform:capitalize" id="navbarDropdown"
                                       class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('/login')}}">
                                            Login
                                        </a>

                                        <a class="dropdown-item" href='/register'>
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
                                <a class="dropdown-item" href="{{route('/userprofile')}}">
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

<div><input id="searchbar" onkeyup="findProduct()" type="text"
            name="search" placeholder="Produkt finden...">
</div>

<div class="container ">
    <h1 class="menulistitem">Brotwaren</h1>
    <div class="row">
        <ul class="item-list">
        @foreach($breadProducts as $breadProduct)
                <li class="menulistitem">
            <div style="margin-top: 1em">
                <div class="item-card">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="col-md-6 ml-auto mr-auto text-center">
                            <div class="text order-1 textbox">
                                <h5 class="itemtitle">{{$breadProduct->title}}  </h5>
                                <p>{{$breadProduct->description}}
                                    <button class="infobutton">
                                        <i class="fas fa-info-circle" data-toggle="modal"
                                           data-target="#myModal{{$breadProduct->product_id}}"></i>
                                    </button>
                                </p >
                                <p class="h5" style="margin-top: -12px">
                                    {{$breadProduct->price}} €
                                    <button class="cartbutton ajaxGET" >
                                        <i  class="fas fa-cart-arrow-down"> </i>
                                        <i id="url" style="display: none">{{route('AddToCartProduct',['product_id'=>$breadProduct->product_id])}}</i>
                                    </button>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </li>
            <!-- modal popup-->
            <div class="modal fade" id="myModal{{$breadProduct->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">{{$breadProduct->title}}</h5>
                            <i style="margin-left:1em; margin-top:5px">€{{$breadProduct->price}}</i>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>{{$breadProduct->description}}</p>
                            <h5>Allergene:<br></h5>
                            @foreach($allergens as $allergen)
                                @continue($allergen -> product_id != $breadProduct->product_id)
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

<div class="container">
    <h1 class="menulistitem"> Gebäck</h1>
    <div class="row">
        <ul class="item-list">
            @foreach($pastries as $pastry)
                <li class="menulistitem">
                <div style="margin-top: 1em">
                    <div class="item-card" style="margin-right: auto; margin-left: 0">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                <div class="text order-1 textbox">
                                    <h5 class="itemtitle">{{$pastry->title}}  </h5>
                                    <p>{{$pastry->description}}
                                        <button class="infobutton">
                                            <i class="fas fa-info-circle" data-toggle="modal"
                                               data-target="#myModal{{$pastry->product_id}}"></i>
                                        </button>
                                    </p >
                                    <p class="h5" style="margin-top: -12px">
                                        {{$pastry->price}} €
                                        <button class="cartbutton ajaxGET" >
                                            <i  class="fas fa-cart-arrow-down"> </i>
                                            <i id="url" style="display: none">{{route('AddToCartProduct',['product_id'=>$pastry->product_id])}}</i>
                                        </button>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </li>
                <!-- modal popup-->
                <div class="modal fade" id="myModal{{$pastry->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">{{$pastry->title}}</h5>
                                <i style="margin-left:1em; margin-top:5px">€{{$pastry->price}}</i>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>{{$pastry->description}}</p>
                                <h5>Allergene:<br></h5>
                                @foreach($allergens as $allergen)
                                    @continue($allergen -> product_id != $pastry->product_id)
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


<div class="container">
    <h1 class="menulistitem"> Süßspeisen</h1>
    <div class="row">
        <ul class="item-list">
        @foreach($sweets as $sweet)
                <li class="menulistitem">
            <div style="margin-top: 1em">
                <div class="item-card">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="col-md-6 ml-auto mr-auto text-center">
                            <div class="text order-1 textbox">
                                <h5 class="itemtitle">{{$sweet->title}}  </h5>
                                <p>{{$sweet->description}}
                                    <button class="infobutton">
                                        <i class="fas fa-info-circle" data-toggle="modal"
                                           data-target="#myModal{{$sweet->product_id}}"></i>
                                    </button>
                                </p >
                                <p class="h5" style="margin-top: -12px">
                                    {{$sweet->price}} €
                                    <button class="cartbutton ajaxGET" >
                                        <i  class="fas fa-cart-arrow-down"> </i>
                                        <i id="url" style="display: none">{{route('AddToCartProduct',['product_id'=>$sweet->product_id])}}</i>
                                    </button>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </li>
            <!-- modal popup-->
            <div class="modal fade" id="myModal{{$sweet->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">{{$sweet->title}}</h5>
                            <i style="margin-left:1em; margin-top:5px">€{{$sweet->price}}</i>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>{{$sweet->description}}</p>
                            <h5>Allergene:<br></h5>
                            @foreach($allergens as $allergen)
                                @continue($allergen -> product_id != $sweet->product_id)
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


<div class="container">
    <h1 class="menulistitem"> Getränke</h1>
    <div class="row">
        <ul class="item-list">
            @foreach($drinks as $drink)
                <li class="menulistitem">
                <div style="margin-top: 1em">
                    <div class="item-card">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                <div class="text order-1 textbox">
                                    <h5 class="itemtitle">{{$drink->title}}  </h5>
                                    <p>{{$drink->description}}
                                        <button class="infobutton">
                                            <i class="fas fa-info-circle" data-toggle="modal"
                                               data-target="#myModal{{$drink->product_id}}"></i>
                                        </button>
                                    </p >
                                    <p class="h5" style="margin-top: -12px">
                                        {{$drink->price}} €
                                        <button class="cartbutton ajaxGET" >
                                            <i  class="fas fa-cart-arrow-down"> </i>
                                            <i id="url" style="display: none">{{route('AddToCartProduct',['product_id'=>$drink->product_id])}}</i>
                                        </button>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </li>
                <!-- modal popup-->
                <div class="modal fade" id="myModal{{$drink->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">{{$drink->title}}</h5>
                                <i style="margin-left:1em; margin-top:5px">€{{$drink->price}}</i>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>{{$drink->description}}</p>
                                <h5>Allergene:<br></h5>
                                @foreach($allergens as $allergen)
                                    @continue($allergen -> product_id != $drink->product_id)
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


<div class="container">
    <h1 class="menulistitem"> Sonstiges</h1>
    <div class="row">
        <ul class="item-list">
            @foreach($others as $other)
                <li class="menulistitem">
                <div style="margin-top: 1em">
                    <div class="item-card">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                <div class="text order-1 textbox">
                                    <h5 class="itemtitle">{{$other->title}}  </h5>
                                    <p>{{$other->description}}
                                        <button class="infobutton">
                                            <i class="fas fa-info-circle" data-toggle="modal"
                                               data-target="#myModal{{$other->product_id}}"></i>
                                        </button>
                                    </p >
                                    <p class="h5" style="margin-top: -12px">
                                        {{$other->price}} €
                                        <button class="cartbutton ajaxGET" >
                                            <i  class="fas fa-cart-arrow-down"> </i>
                                            <i id="url" style="display: none">{{route('AddToCartProduct',['product_id'=>$other->product_id])}}</i>
                                        </button>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </li>
                <!-- modal popup-->
                <div class="modal fade" id="myModal{{$other->product_id}}" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">{{$other->title}}</h5>
                                <i style="margin-left:1em; margin-top:5px">€{{$other->price}}</i>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>{{$other->description}}</p>
                                <h5>Allergene:<br></h5>
                                @foreach($allergens as $allergen)
                                    @continue($allergen -> product_id != $other->product_id)
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

<script src="{{asset('js/adminpanel.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>

<script
    src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous')}}"></script>
<script
    src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa')}}"></script>
<script src="{{asset('js/respond.js')}}"></script>


</body>
</html>
