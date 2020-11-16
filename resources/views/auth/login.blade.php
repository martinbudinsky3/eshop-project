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
                        <a class="register-page" href="#" onClick="window.location='register.html';">Zaregistrujte
                            sa.</a>
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
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
*/ ?>