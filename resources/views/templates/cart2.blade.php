@extends('layout.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('styles/cart2.css') }}">
@endsection

@section('title')
    <title>Cart</title>
@endsection

@section('content')
    <div class="wrapper">
        <div class="container">
            <!--Breadcrumb-->
            <div class="center-box">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/cart">Košík</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doprava a platba</li>
                        <li class="breadcrumb-item"><a href="/cart/data">Dodacie
                                údaje</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
        </div>
    </div>

    <div class="wrapper">
        <main class="container items">
            <section>
                <h3>Výber dopravy a platby</h3>
                <form action="/cart/data/"  id="cart-form" class="row item" method="get">
                    @csrf
                    <div class="col-xs-10  col-sm-6 col-md-5 col-lg-5 bloky">
                        <fieldset>
                            <legend class="select-title">
                                Zvoľte dopravu
                            </legend>
                            <div class="radio-buttons">
                                <input type="radio" class="radio-input" id="delivery1" value = 1 name="delivery"
                                    {{ $transport->id == 1 ? 'checked' : '' }} 
                                    onchange="transportSelectHandler('{{ $transports[0]->name }}', {{ $transports[0]->price }}, {{ $transport->price }}, {{ $final_price }})">
                                <label class="radio-label" for="delivery1">{{ $transports[0]->name }}</label>
                                <div class="row">
                                    <div class="col">
                                        <p class="price-delivery">{{ $transports[0]->price == 0 ? 'Zadarmo' : $transports[0]->price }} €</p>
                                    </div>
                                    <div class="col">
                                        <p class="time-delivery"> dnes od 15:00</p>
                                    </div>
                                </div>

                                <input type="radio" class="radio-input" id="delivery2"  value=2 name="delivery"
                                    {{ $transport->id == 2 ? 'checked' : '' }} 
                                    onchange="transportSelectHandler('{{ $transports[1]->name }}', {{ $transports[1]->price }}, {{ $transport->price }}, {{ $final_price }})">
                                <label class="radio-label" for="delivery2">{{ $transports[1]->name }}</label>
                                <div class="row">
                                    <div class="col">
                                        <p class="price-delivery">{{ $transports[1]->price == 0 ? 'Zadarmo' : $transports[1]->price }} €</p>
                                    </div>
                                    <div class="col">
                                        <p class="time-delivery">5.10</p>
                                    </div>
                                </div>
                                <input type="radio" class="radio-input" id="delivery3" value =3  name="delivery"
                                    {{ $transport->id == 3 ? 'checked' : '' }} 
                                    onchange="transportSelectHandler('{{ $transports[2]->name }}', {{ $transports[2]->price }}, {{ $transport->price }}, {{ $final_price }})">
                                <label class="radio-label" for="delivery3">{{ $transports[2]->name }}</label>
                                <div class="row">
                                    <div class="col">
                                        <p class="price-delivery">{{ $transports[2]->price == 0 ? 'Zadarmo' : $transports[2]->price }} €</p>
                                    </div>
                                    <div class="col">
                                        <p class="time-delivery">zajtra</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-10  col-sm-5 col-md-5 col-lg-5 bloky">
                        <fieldset>
                            <legend class="select-title">
                                Zvoľte platbu
                            </legend>
                            <div class="radio-buttons">
                                <div>
                                    <input type="radio" class="radio-input" id="pay4" name="pay" value=1 
                                        {{ $payment->id == 1 ? 'checked' : '' }} 
                                        onchange="paymentSelectHandler('{{ $payments[0]->name }}', {{ $payments[0]->price }}, {{ $payment->price }}, {{ $final_price }})">
                                    <label class="radio-label" for="pay4">{{ $payments[0]->name }}</label>
                                    <div class="col">
                                        <p class="pay-description">{{ $payments[0]->price == 0 ? 'Zadarmo' : $payments[0]->price }} €</p>
                                    </div>
                                </div>

                                <div>
                                    <input type="radio" class="radio-input" id="pay1" name="pay"  value=2 
                                        {{ $payment->id == 2 ? 'checked' : '' }} 
                                        onchange="paymentSelectHandler('{{ $payments[1]->name }}', {{ $payments[1]->price }}, {{ $payment->price }}, {{ $final_price }})">
                                    <label class="radio-label" for="pay1">{{ $payments[1]->name }}</label>
                                    <div class="col">
                                        <p class="pay-description">{{ $payments[1]->price == 0 ? 'Zadarmo' : $payments[1]->price }} €</p>
                                    </div>
                                </div>

                                <div>
                                    <input type="radio" class="radio-input" id="pay2" name="pay" value=3 
                                        {{ $payment->id == 3 ? 'checked' : '' }} 
                                        onchange="paymentSelectHandler('{{ $payments[2]->name }}', {{ $payments[2]->price }}, {{ $payment->price }}, {{ $final_price }})">
                                    <label class="radio-label" for="pay2">{{ $payments[2]->name }}</label>
                                    <div class="col">
                                        <p class="pay-description">{{ $payments[2]->price == 0 ? 'Zadarmo' : $payments[2]->price }} €</p>
                                    </div>
                                </div>

                                <div>
                                    <input type="radio" class="radio-input" id="pay3" name="pay" value=4 
                                        {{ $payment->id == 4 ? 'checked' : '' }} 
                                        onchange="paymentSelectHandler('{{ $payments[3]->name }}', {{ $payments[3]->price }}, {{ $payment->price }}, {{ $final_price }})">
                                    <label class="radio-label" for="pay3">{{ $payments[3]->name }}</label>
                                    <div class="col">
                                        <p class="pay-description">{{ $payments[3]->price == 0 ? 'Zadarmo' : $payments[3]->price }} €</p>
                                    </div>
                                </div>

                                <div>
                                    <input type="radio" class="radio-input" id="pay5" name="pay" value="5" 
                                        {{ $payment->id == 5 ? 'checked' : '' }} 
                                        onchange="paymentSelectHandler('{{ $payments[4]->name }}', {{ $payments[4]->price }}, {{ $payment->price }}, {{ $final_price }})">
                                    <label class="radio-label" for="pay3">{{ $payments[4]->name }}</label>
                                    <div class="col">
                                        <p class="pay-description">{{ $payments[4]->price == 0 ? 'Zadarmo' : $payments[4]->price }} €</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>

                <div class="row summary">
                    <div class="col-12">
                        <p class="summary-delivery" id ='summary-delivery'>Doprava: <span>{{$transport->name}}</span></p>
                        <p class="summary-pay" id = 'summary-pay'>Platba: <span>{{$payment->name}}</span></p>
                        <p class="summary-price" id='summary-price'>CENA SPOLU: <span>{{$final_price}} €</span></p>

                        <button class="submit-button mb-3"  form="cart-form" type="submit">POKRAČOVAŤ</button>

                        <a href="/cart" class="back-link float-left">Späť</a>
                    </div>
                </div>

            </section>
        </main>
    </div>

    <div class="clearfix"></div>
@endsection

@section('custom-scripts')
    <script src="../js/cart2.js"></script>
@endsection
