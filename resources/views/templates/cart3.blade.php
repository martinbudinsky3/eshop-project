@extends('layout.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('styles/cart3.css') }}">
@endsection

@section('title')
    <title>Dodacie údaje</title>
@endsection

@section('content')
    <div class="container mt-2">
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
        <hr class="hr">
    </div>
    <main class="container mt-2">
        @guest
            <div class="mb-1">
                <div class="row">
                    <div class="col-12 text-center p-2">
                        <p><strong>Máte už u nás konto? Ušetrite čas a prihláste sa.</strong></p>
                        <button class="login-button btn btn-info" onClick="window.location='/cart/login';"
                            type="button">Prihlásenie</button>
                    </div>
                </div>
            </div>
            <hr class="hr">
        @endguest
        <section>
            <h3>Dodacie údaje</h3>
            <p class="form-restriction">* - všetky údaje sú povinné.</p>

            <form action="/order" id="delivery-form" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Meno a priezvisko *</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        value="{{ old('name') ? old('name') : ($delivery ? $delivery->name : '') }}">
                    @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror"  required
                            autocomplete="email" id="email" name="email" placeholder="napr. priklad@mail.com"
                            value = "{{ old('email') ? old('email') :
                                ($delivery ? $delivery->email :
                                (Auth::check() ? Auth::user()->email :
                                ''))
                        }}">

                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefónne číslo *</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror " required id="phone" name="phone" placeholder=" napr. +421999888777"
                        value = "{{ old('phone') ? old('phone') :
                            ($delivery ? $delivery->phone_number :
                            (Auth::check() ? Auth::user()->phone :
                            ''))
                        }}">

                        @error('phone')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-row">
                    <div class="col-sm-8 col-md-8 form-group">
                        <label for="street">Ulica *</label>
                        <input type="text" class="form-control" id="street" name="street" required
                            value="{{ old('street') ? old('street') : ($delivery ? $delivery->street : '') }}">

                        @error('street')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="col-sm-4 col-md-4 form-group">
                        <label for="numb">Číslo domu *</label>
                        <input type="text" class="form-control" id="numb" name="numb" required
                            value="{{ old('numb') ? old('numb') : ($delivery ? $delivery->house_number : '') }}">
                        @error('numb')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-8 col-md-8 form-group ">
                        <label for="town">Mesto *</label>
                        <input type="text" class="form-control" id="town" name="town" required
                            value="{{ old('town') ? old('town') : ($delivery ? $delivery->town : '') }}">
                        @error('town')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="col-sm-4 col-md-4 form-group">
                        <label for="zip">PSČ *</label>
                        <input type="text" class="form-control" id="zip" name="zip" required placeholder="napr. 96801"
                        value="{{ old('zip') ? old('zip') : ($delivery ? $delivery->zip : '') }}">
                        @error('zip')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="form-group ">
                    <label for="country">Krajina *</label>
                    <input type="text" class="form-control" id="country" name="country" required
                        value="{{ old('country') ? old('country') : ($delivery ? $delivery->country : '') }}">
                    @error('country')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <!--div class="form-check">
                    <input class="form-check-input" type="checkbox" id="newsletter-check">
                    <label class="form-check-label" for="newsletter-check">
                        Odoslať na inú adresu</label>
                </div-->

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" required id="conditions-check">
                    <label class="form-check-label" for="conditions-check">
                        * Súhlasím s <a href="">obchodnými podmienkami spoločnosti. </a></label>
                </div>
            </form>

            <hr class="hr">
            <div class="summary">
                <p>Hodnota tovaru: <span>{{ $productsPrice }} €</span></p>
                <p>Platba: <span>{{ $paymentPrice }} €</span></p>
                <p>Doprava: <span>{{ $transportPrice }} €</span></p>
                <p>CENA SPOLU: <span>{{ $finalPrice }} €</span></p>
            </div>

            <div class="d-flex mt-2">
                <a href="/cart/delivery" class="back-link mr-auto">
                    Späť
                </a>

                <button class="btn btn-primary mb-3"  type="submit" form="delivery-form">Odoslať</button>
            </div>
        </section>
    </main>
@endsection
