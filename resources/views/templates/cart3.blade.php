@extends('layout.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('styles/cart3.css') }}">
@endsection

@section('title')
<title>Dodacie údaje</title>
@endsection

@section('content')
<div class="wrapper">
    <div class="container">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/cart">Košík</a></li>
                    <li class="breadcrumb-item"><a href="/cart2">Doprava a
                            platba</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dodacie
                        údaje</li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
</div>
<div class="wrapper">
    <main class="container">
        @guest
            <div class=" container sing-or-register">
                <div class="row item">
                    <div class="col-xs-10  col-sm-6 col-md-5 col-lg-5 register-box">
                        <p><strong>Máte už v nás konto? Ušetrite čas a prihláste sa.</strong></p>
                        <button class="login-button" onClick="window.location='login.html';"
                            type="button">PRIHLÁSENIE</button>
                    </div>
                </div>
            </div>
        @endguest

        <hr>
        <section>
            <div class="form1">
                <h3>Fakturačné údaje</h3>
                <p class="form-restriction">Všetky údaje sú povinné.</p>


                <form action="/cart/sent" id="delivery-form" method="get">

                    <div class="form-group">
                        <label for="name">Meno a priezvisko</label>
                        <input type="text" class="text-input form-control" id="name" name="name" placeholder="meno a priezvisko"
                         value = {{ (empty($data)) ? "": $data['name']}}>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="text-input form-control" id="email" name="email" placeholder="napr. example@mail.com"
                         value = {{ (empty($data)) ? "": $data['email']}}>
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefónne číslo</label>
                        <input type="tel" class="text-input form-control" id="phone" name="phone" placeholder="+421xxxxxxxxx"
                        value = {{ (empty($data)) ? "": $data['phone']}}>

                    </div>

                    <div class="form-row">
                        <div class="col-sm-8 col-md-8 form-group">
                            <label for="street">Ulica</label>
                            <input type="text" class="text-input form-control" id="street" name="street" placeholder="ulica">
                        </div>
                        <div class="col-sm-4 col-md-4 form-group">
                            <label for="numb">Číslo domu</label>
                            <input type="text" class="text-input form-control" id="numb" name="numb" placeholder="číslo domu">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-8 col-md-8 form-group ">
                            <label for="town">Mesto</label>
                            <input type="text" class="text-input form-control" id="town" name="town" placeholder="mesto">
                        </div>
                        <div class="col-sm-4 col-md-4 form-group">
                            <label for="zip">PSČ</label>
                            <input type="text" class="text-input form-control" id="zip" name="zip" placeholder="napr. 96801">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="country">Krajina</label>
                        <input type="text" class="text-input form-control" id="country" name="country" placeholder="krajina">
                    </div>


                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="newsletter-check">
                            <label class="form-check-label" for="newsletter-check">
                                Odoslať na inú adresu</label>
                        </div>
                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" id="conditions-check">
                            <label class="form-check-label" for="conditions-check">
                                Súhlasím s <a href="">obchodnými podmienkami spoločnosti. </a></label>
                        </div>
                    </div>

                </form>
            </div>

            <hr>
            <div class="container summary">
                <p class="summary-cart"><span>Hodnota tovaru: </span>{{$items_price}} €</p>
                <p class="summary-cart"><span>Platba: </span>{{$payment_price}} €</p>
                <p class="summary-pay"><span>Doprava: </span>{{$transport_price}} €</p>
                <p class="summary-price"><span>CENA SPOLU: </span>{{$final_price}} €</p>

                <a href="/cart/delivery" class="back-link">Späť</a>
               
                <button class="submit-button" type="submit" form="delivery-form">Odoslať</button>
            </div>
        </section>
    </main>
</div>

<div class="clearfix"></div>
@endsection
