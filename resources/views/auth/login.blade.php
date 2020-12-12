@extends('layout.app')

@section('title')
<title>Prihlásenie</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Prihlásenie</li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
</div>
<div class="wrapper">
    <main class="container">
        <section>
            <div class="row login">
                <div class="col-12 title-panel" id="login-panel">
                    <h3>Prihlásenie</h3>
                </div>
            </div>

            <div class="container wrapper">
                <div class="center-box">
                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf

                        <div class="row form">
                            <div class="col-12 form-group ">
                                <label for="email">Email *</label>
                                <input type="email" class="text-input form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 form-group ">
                                <label for="password">Heslo *</label>
                                <input type="password" class="text-input form-control @error('password') is-invalid @enderror " id="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @if (Route::has('password.request'))
                                <a class="forgot-password" href="{{ route('password.request') }}">
                                    Zabudli ste heslo? 
                                </a>
                                @endif
                            </div>

                        </div>
                    </form>
                </div>
            </div>


            <div class="container">
                <div id="login-button" class="row login_button">
                    <div class="col-12 center-box">
                        <button class="login-button" type="submit" form="login-form">
                            PRIHLÁSENIE
                        </button>
                    </div>
                </div>
                <div id="register-row" class="row register center-box">
                    <div id="register-b" class="register">
                        <p>Ešte nemáte účet?</p>
                        <a class="register-page" href="/register">Zaregistrujte
                            sa.</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection