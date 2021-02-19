@extends('layout.app')

@section('title')
    <title>Registrácia</title>
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
                    <li class="breadcrumb-item">
                        <a href="/login">Prihlásenie</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Registrácia
                    </li>
                </ol>
            </nav>
        </div>
        <hr class="hr">
    </div>

    <main class="container mt-2">
        <section>
            <div class="title-panel">
                <h3>Registrácia</h3>
            </div>
            
            <form method="POST" action="{{ route('register') }}" class="center-form">
                @csrf
                <p class="form-restriction mb-4">* - všetky údaje sú povinné.</p>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" name="email" value="{{ old('email') }}" required
                        autocomplete="email" placeholder="napr. priklad@mail.sk">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Heslo *</label>
                    <input type="password"
                        class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" required autocomplete="new-password" placeholder="aspoň 8 znakov">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Zopakujte heslo *</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"
                        name="password_confirmation" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefónne číslo *</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required
                        placeholder="napr. +421012345678">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="newsletter-check"
                        name="newsletter-check">
                    <label class="form-check-label" for="newsletter-check">
                        Súhlasím so zasielaním reklamných mailov.
                    </label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input @error('phone') is-invalid @enderror" type="checkbox" id="conditions-check"
                        name="conditions-check">
                    <label class="form-check-label" for="conditions-check">
                        * Súhlasím s <a href="">obchodnými podmienkami spoločnosti. </a>
                    </label>
                    @error('conditions-check')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary" type="submit">Registrovať</button>
                </div>
            </form>
        </section>
    </main>
@endsection