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
                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
        <hr class="hr">
    </div>

    <main class="container mt-2">
        <nav class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                <div class="d-flex">
                    <a href="/profile/orders">
                        <img src="../assets/icons/order-icon.png" alt="" class="img-responsive profile-icon">
                    </a>
                    <div class="p-2">
                        <a href="/profile/orders" class="profile-link">História objednávok</a>
                        <p class="small-text">Sledujte svoje objednávky</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                <div class="d-flex">
                    <a href="/profile/info">
                        <img src="../assets/icons/profile-icon.png" alt="" class="img-responsive profile-icon">            
                    </a>
                    <div class="p-2">
                        <a href="/profile/info" class="profile-link">Osobné údaje</a>
                        <p class="small-text">Upravte svoje osobné údaje</p>
                    </div>
                </div>
            </div>
        </nav>
    </main>
@endsection