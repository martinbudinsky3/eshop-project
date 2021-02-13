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
                                <td>{{ $orderItem->price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                <img class="overview"
                                    src="../assets/icons/delivery.png"
                                    alt="{{ $product->name }}">
                            </td>
                            <td>Doprava a platba</td>
                            <td>1ks</td>
                            <td>{{ $transportPaymentPrice }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-2">
                <p class="text-sm-right price">Cena spolu: <span class="price-value">{{ $order->price }} €</span></p>
            </div>
        </section>
    </main>
@endsection