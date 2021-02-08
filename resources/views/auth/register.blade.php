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
                        <li class="breadcrumb-item">
                            <a href="#" onClick="window.location='../index.html';">Hlavná stránka</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" onClick="window.location='login.html';">Prihlásenie</a>
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
                    <div id="form-register" class="col-md-6 offset-md-3">

                        <form method="POST" action="{{ route('register') }}" id="register-form">
                            @csrf
                            <p class="form-restriction">Všetky údaje sú povinné.</p>
                            <div class="form-group ">
                                <label for="name">Meno a priezvisko </label>
                                <input type="text" class="text-input form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group ">

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

                            <div class="form-group ">
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

                            <div class="form-group ">
                                <label for="password_confirmation">Zopakujte heslo</label>
                                <input type="password" class="text-input form-control @error('password') is-invalid @enderror" id="password_confirmation"
                                    name="password_confirmation" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="phone">Telefónne číslo </label>
                                <input type="text" class="text-input form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required
                                    placeholder="+421xxxxxxxxx">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check ">
                                @error('conditions-check')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-check">
                                    <input class="form-check-input @error('phone') is-invalid @enderror" type="checkbox" id="conditions-check"
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