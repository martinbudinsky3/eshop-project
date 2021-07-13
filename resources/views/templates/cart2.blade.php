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
                        <li class="breadcrumb-item">
                            <a href="/cart">Košík</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Doprava a platba
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/order/create">Dodacie údaje</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <hr class="hr">
        </div>
    </div>

    <main class="container mt-2">
        <section>
            <h3>Výber dopravy a platby</h3>

            <div class="mt-4">
                <form action="/order/create/" id="cart-form" method="get">
                    @csrf
                    <div class="row justify-content-around">
                        <div class="col-10 col-sm-5 card mb-2">
                            <div class="card-body">
                                <fieldset>
                                    <legend class="select-title">
                                        Zvoľte dopravu
                                    </legend>
                                    <div>
                                        @foreach($transports as $transport)
                                            <input type="radio" class="radio-input" id="transport{{ $transport->id }}" value={{ $transport->id }} name="transport"
                                                {{ $selectedTransport->id == $transport->id ? 'checked' : '' }}
                                                onchange="transportSelectHandler('{{ $transport->name }}', {{ $transport->price }}, {{ $selectedTransport->price }}, {{ $finalPrice }})">

                                            <label class="radio-label" for="transport{{ $transport->id }}">{{ $transport->name }}</label>
                                            <div class="row">
                                                <div class="col price">
                                                    <p>{{ $transport->price == 0 ? 'Zadarmo' : $transport->price }} €</p>
                                                </div>
                                                <!--div class="col">
                                                    <p class="time-delivery"> dnes od 15:00</p>
                                                </div-->
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-10 col-sm-5 card mb-2">
                            <div class="card-body">
                                <fieldset>
                                    <legend class="select-title">
                                        Zvoľte platbu
                                    </legend>
                                    <div>
                                        @foreach($payments as $payment)
                                            <input type="radio" class="radio-input" id="payment{{ $payment->id }}" value={{ $payment->id }} name="payment"
                                                {{ $payment->id == $selectedPayment->id ? 'checked' : '' }}
                                                onchange="paymentSelectHandler('{{ $payment->name }}', {{ $payment->price }}, {{ $selectedPayment->price }}, {{ $finalPrice }})">
                                            <label class="radio-label" for="payment"{{ $payment->id }}>{{ $payment->name }}</label>
                                            <div class="price">
                                                <p>{{ $payment->price == 0 ? 'Zadarmo' : $payment->price }} €</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="summary">
                <p id='summary-delivery'>Doprava: <span>{{$selectedTransport->name}}</span></p>
                <p id='summary-pay'>Platba: <span>{{$selectedPayment->name}}</span></p>
                <p id='summary-price'>CENA SPOLU: <span>{{$finalPrice}} €</span></p>
            </div>

            <div class="d-flex mt-2">
                <a href="/cart" class="back-link mr-auto">
                    Späť
                </a>

                <button class="btn btn-primary mb-3" type="submit" form="cart-form">Pokračovať</button>
            </div>
        </section>
    </main>
@endsection

@section('custom-scripts')
    <script src="../js/cart2.js"></script>
@endsection
