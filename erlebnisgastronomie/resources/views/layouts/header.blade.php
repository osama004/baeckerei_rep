
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

                                        <a class="dropdown-item" href="/register">
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
