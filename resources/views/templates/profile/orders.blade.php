@extends('layout.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('styles/profile.css') }}">
@endsection

@section('title')
    <title>Profil</title>
@endsection

@section('content')
    <div class="container mt-2">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Hlavná stránka</a></li>
                    <li class="breadcrumb-item"><a href="/profile">Profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Objednávky</li>
                </ol>
            </nav>
        </div>
        <hr class="hr">
    </div>

    <main class="container mt-2">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <section>
            <h2>Zoznam objednávok</h2>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dátum vytvorenia</th>
                            <th scope="col">Cena</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row"><a href="/orders/{{ $order->id }}">{{ $order->id }}</a></th>
                                <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                <td>{{ $order->order_items_price + $order->transport_price + $order->payment_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection
