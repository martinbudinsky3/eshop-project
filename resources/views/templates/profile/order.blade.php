@extends('layout.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('styles/order.css') }}">
@endsection

@section('title')
    <title>Objednávka č. {{ $order->id }}</title>
@endsection

@section('content')
<div class="container mt-2">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Hlavná stránka</a></li>
                    <li class="breadcrumb-item"><a href="/profile">Profil</a></li>
                    <li class="breadcrumb-item"><a href="/profile/orders">Objednávky</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Objednávka {{ $order->id }}</li>
                </ol>
            </nav>
        </div>
        <hr class="hr">
    </div>

    <main class="container mt-2">
        <section>
            <h2>Položky objednávky</h2>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Náhľad</th>
                            <th scope="col">Názov</th>
                            <th scope="col">Množstvo</th>
                            <th scope="col">Cena</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $orderItem)
                            @php
                                $product = $orderItem->productDesign->product;
                            @endphp
                            <tr>
                                <td>
                                    <img class="overview"
                                        src="{{ asset($product->images->first()->path.'_300x420.jpg')}}"
                                        alt="{{ $product->name }}">
                                </td>
                                <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
                                <td>{{ $orderItem->amount }}ks</td>
                                <td>{{ $orderItem->price * $orderItem->amount }}</td>
                            </tr>
                        @endforeach
                        @if($order->transport_price > 0)
                            <tr>
                                <td>
                                    <img class="overview"
                                        src="../assets/icons/delivery.png"
                                        alt="Delivery icon">
                                </td>
                                <td>Doprava</td>
                                <td>1ks</td>
                                <td>{{ $order->transport_price }}</td>
                            </tr>
                        @endif
                        @if($order->payment_price > 0)
                            <tr>
                                <td>
                                    <img class="overview"
                                         src="../assets/icons/payment.png"
                                         alt="Payment icon">
                                </td>
                                <td>Platba</td>
                                <td>1ks</td>
                                <td>{{ $order->payment_price }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-2">
                <p class="text-sm-right price">Cena spolu: <span class="price-value">{{ $finalPrice }} €</span></p>
            </div>
        </section>

        <hr class="hr">

        <section class="mb-4">
            <h2>Podrobnosti</h2>
            <div class="mt-4">
                <table class="info-table">
                    <tbody>
                        <tr>
                            <th>Doprava</th>
                            <td>{{ $order->transport->name }}</td>
                        </tr>
                        <tr>
                            <th>Platba</th>
                            <td>{{ $order->payment->name }}</td>
                        </tr>
                        <tr>
                            <th>Dátum vytvorenia</th>
                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <hr class="hr">

        <section>
            <h2>Dodacie údaje</h2>
            <div class="mt-4 order-data">
                @php
                    $delivery = $order->delivery;
                @endphp

                <b>{{ $delivery->name }}</b>
                <span>{{ $delivery->email }}</span>
                <span>{{ $delivery->phone_number }}</span>
                <span>{{ $delivery->street }}, {{ $delivery->house_number }}</span>
                <span>{{ $delivery->town }}, {{ $delivery->zip }}</span>
                <span>{{ $delivery->country }}</span>
            </div>
        </section>
    </main>
@endsection
