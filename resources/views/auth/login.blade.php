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
            <div class="title-panel">
                <h3>Prihlásenie</h3>
            </div>

            <form method="POST" action="{{ route('login') }}" id="login-form" class="center-form">
                @csrf
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Heslo *</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror " id="password" name="password" required autocomplete="current-password">
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
            
                <div class="mt-3 center-box">
                    <button class="btn btn-primary" type="submit">
                        Prihlásiť
                    </button>
                </div>
            </form>

            <div class="mt-4 center-box">
                <p class="mb-0">Ešte nemáte účet?</p>
                <a class="register-page" href="/register">Zaregistrujte sa.</a>
            </div>
        </section>
    </main>
@endsection
