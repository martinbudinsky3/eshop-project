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
                        <li class="breadcrumb-item"><a href="/cart/delivery">Doprava a
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
                            <button class="login-button" onClick="window.location='/cart/login';"
                                type="button">PRIHLÁSENIE</button>
                        </div>
                    </div>
                </div>
                <hr>
            @endguest
            <section>
                <div class="form1">
                    <h3>Fakturačné údaje</h3>
                    <p class="form-restriction">Všetky údaje sú povinné.</p>

                    <form action="/cart/sent" id="delivery-form" method="get">
                        @csrf
                        <div class="form-group">
                            <label for="name">Meno a priezvisko</label>
                            <input type="text" class="text-input form-control" id="name" name="name" required placeholder="meno a priezvisko"
                                value = "{{ (empty($data)) ? old('name') : $data['name'] }}">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="text-input form-control  @error('email') is-invalid @enderror"  required
                                    autocomplete="email" id="email" name="email" placeholder="napr. example@mail.com"
                                    value = "{{ (empty($data)) ? old('email') : $data['email'] }}">

                                @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="phone">Telefónne číslo</label>
                            <input type="tel" class="text-input form-control @error('phone') is-invalid @enderror " required id="phone" name="phone" placeholder="+421xxxxxxxxx"
                                value = "{{ (empty($data)) ? old('phone') : $data['phone'] }}">
                                
                                @error('phone')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror

                        </div>

                        <div class="form-row">
                            <div class="col-sm-8 col-md-8 form-group">
                                <label for="street">Ulica</label>
                                <input type="text" class="text-input form-control" id="street" name="street" required placeholder="ulica"
                                    value="{{ old('street') }}">

                                @error('street')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-sm-4 col-md-4 form-group">
                                <label for="numb">Číslo domu</label>
                                <input type="text" class="text-input form-control" id="numb" name="numb" required placeholder="číslo domu"
                                    value="{{ old('numb') }}">
                                @error('numb')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-8 col-md-8 form-group ">
                                <label for="town">Mesto</label>
                                <input type="text" class="text-input form-control" id="town" name="town" required placeholder="mesto"
                                    value="{{ old('town') }}">
                                @error('town')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-sm-4 col-md-4 form-group">
                                <label for="zip">PSČ</label>
                                <input type="text" class="text-input form-control" id="zip" name="zip" required placeholder="napr. 96801"
                                value="{{ old('zip') }}">
                                @error('zip')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="country">Krajina</label>
                            <input type="text" class="text-input form-control" id="country" name="country" required placeholder="krajina"
                                value="{{ old('country') }}">
                            @error('country')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter-check">
                                <label class="form-check-label" for="newsletter-check">
                                    Odoslať na inú adresu</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" required id="conditions-check">
                                <label class="form-check-label" for="conditions-check">
                                    Súhlasím s <a href="">obchodnými podmienkami spoločnosti. </a></label>
                            </div>
                        </div>
                    </form>
                </div>

                <hr>
                <div class="container summary">
                    <p class="summary-cart">Hodnota tovaru: <span>{{ $items_price }} €</span></p>
                    <p class="summary-cart">Platba: <span>{{ $payment_price }} €</span></p>
                    <p class="summary-pay">Doprava: <span>{{ $transport_price }} €</span></p>
                    <p class="summary-price">CENA SPOLU: <span>{{ $final_price }} €</span></p>
                
                    <button class="submit-button mb-3" type="submit" form="delivery-form">Odoslať</button>
                    <a href="/cart/delivery" class="back-link float-left">Späť</a>

                </div>
            </section>
        </main>
    </div>

    <div class="clearfix"></div>
@endsection
