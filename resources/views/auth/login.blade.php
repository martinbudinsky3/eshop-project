@extends('layout.app')

@section('title')
    <title>Prihlásenie</title>
@endsection

@section('content')
    <div class="container mt-2">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Hlavná stránka</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Prihlásenie
                    </li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
    <main class="container mt-2">
        <section>
            <div class="row">
                <div class="col-12 title-panel">
                    <h3>Prihlásenie</h3>
                </div>
            </div>

            <div class="center-box">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
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

                <div>
                    <button class="btn btn-primary" type="submit" form="login-form">
                        Prihlásiť
                    </button>
                </div>
                <div class="mt-4">
                    <p class="mb-0">Ešte nemáte účet?</p>
                    <a class="register-page" href="/register">Zaregistrujte sa.</a>
                </div>
            </div>
        </section>
    </main>
@endsection
