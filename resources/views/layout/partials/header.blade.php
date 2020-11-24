<?php
    $logged = session()->get('user');

    if($logged){
        $cart = $logged->cart;
    }
    else{
        $cart = session()->get('cart');
    }
?>


<!--Page header-->
<div class="wrapper">
    <header class="container">
        <div class="row page-header">
            <!--Logo-->
            <div id="logo-box" class="col-2 col-4-sm d-md-block">
                <a href="/">
                    <picture>
                        <source media="(min-width: 576px)" srcset="{{ asset('assets/images/logo.png') }}">
                        <img src="{{ asset('assets/images/logo-cropped.png') }}" alt="Logo">
                    </picture>
                </a>
            </div>
            <!--Icon nav + Search-->
            <div id="icons-box" class="col-10 col-8-sm d-md-flex vertical-reverse ">
                <div class="header-icons">
                    <a href="/cart" class="cart-link">
                        <i class="fa fa-shopping-cart icon" aria-hidden="true"></i>
                    </a>

                    <!--Profile button-->
                    <div id="profile-dropdown">
                        <button class="icon-btn" onclick="handleProfileButtonClick()">
                            <i class="fa fa-user icon" aria-hidden="true"></i>
                        </button>

                        <!--Profile menu-->
                        <nav id="profile-menu" class="pop-up d-none">
                            <!--Close menu button-->
                            <button class="left-menu-close icon-btn d-inline-block d-sm-none" onclick="closeMenu()">
                                <i class="fa fa-times-circle icon" aria-hidden="true"></i>
                            </button>

                            
                            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>

                            <ul>
                                @guest
                                    <li>
                                        <a href="/login">Prihlásenie</a>
                                    </li>
                                    <li>
                                        <a href="/register">Registrácia</a>
                                    </li>

                                @else
                                    <!--Logged in user-->
                                    <!--h4>{{ Auth::user()->name }}</h4-->
                                    <li>
                                        <a href="">Profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="logout(event)">Odhlásenie</a>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>

                    <!--Search button - < 768px-->
                    <button class="icon-btn d-inline-block d-md-none" id="search-icon"
                        onclick="handleSearchButtonClick()">
                        <i class="fa fa-search icon"></i>
                    </button>

                    <!--Search bar - >= 768px-->
                    <div class="d-none d-md-block">
                        <form method="GET" action="/product-detail">
                            <input type="text" name="search" class="search-full-text"
                                placeholder="Zadajte hľadaný výraz">
                            <button type="submit" class="icon-btn">
                                <i class="fa fa-search icon"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!--Search bar - < 768px-->
            <div id="search-bar" class="col-12 d-none d-md-none">
                <button class="icon-btn">
                    <i class="fa fa-times-circle icon" aria-hidden="true" onclick="handleSearchButtonClick()"></i>
                </button>
                <form method="GET" action="/product-detail" id="search-form-xs">
                    <input type="text" name="search" class="search-full-text"
                        placeholder="Zadajte hľadaný výraz" id="search-input-xs">
                    <button type="submit" id="search-submit-xs" class="icon-btn">
                        <i class="fa fa-search icon"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>
</div>
