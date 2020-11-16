@extends('layout.app')

@section('title')
<title>Registrácia</title>
@endsection

@section('content')
<div class="wrapper">
    <div class="container">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" onClick="window.location='../index.html';">Hlavná
                            stránka</a></li>
                    <li class="breadcrumb-item"><a href="#" onClick="window.location='login.html';">Prihlásenie</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Registrácia</li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
</div>
<div class="wrapper">
    <main class="container">
        <section>
            <div class="row register">
                <div class="col-12 title-panel" id="register-panel">
                    <h3>Registrácia</h3>
                </div>
            </div>

            <div class="container wrapper">
                <div id="form-register">

                    <form method="POST" action="{{ route('register') }}" id="register-form">
                        @csrf

                        <div class="form-group col-md-6 offset-md-3">
                            <p class="form-restriction">Všetky údaje sú povinné.</p>

                            <label for="email">Email </label>
                            <input type="email" class="text-input form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" placeholder="priklad@mail.sk">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label for="password">Heslo </label>
                            <input type="password"
                                class="text-input form-control @error('password') is-invalid @enderror" id="password"
                                name="password" required autocomplete="new-password" placeholder="Aspoň 8 znakov">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label for="password_again">Zopakujte heslo</label>
                            <input type="password" class="text-input form-control" id="password_again"
                                name="password_again" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label for="phone">Telefónne číslo </label>
                            <input type="text" class="text-input form-control" id="phone" name="phone" required
                                placeholder="+421xxxxxxxxx">
                        </div>

                        <div class="form-check col-md-6 offset-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="conditions-check"
                                    name="conditions-check">
                                <label class="form-check-label" for="conditions-check">
                                    <a href="">Súhlasím s obchodnými podmienkami spoločnosti. </a>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter-check"
                                    name="newsletter-check">
                                <label class="form-check-label" for="newsletter-check">
                                    Súhlasím so zasielaním reklamných mailov.
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <div id="register-button" class="row login_button">
                    <div class="col-12 center-box">
                        <button class="login-button" type="submit" form="register-form">REGISTROVAŤ</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection




<?php /*
@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
*/?>