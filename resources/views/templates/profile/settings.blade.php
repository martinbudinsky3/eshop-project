@extends('layout.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('styles/settings.css') }}">
@endsection

@section('title')
    <title>Nastavenia</title>
@endsection

@section('content')
    <div class="container mt-2">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Hlavná stránka</a></li>
                    <li class="breadcrumb-item"><a href="/profile">Profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nastavenia</li>
                </ol>
            </nav>
        </div>
        <hr class="hr">
    </div>
    <main class="container mt-2">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <section id="change-password" class="mb-5 section">
            <h3>Zmena hesla</h3>
                    
            <form action="/user/password" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="current_password" class="col-form-label">Staré heslo:</label>
                    <input type="password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" 
                        name="current_password">
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password" class="col-form-label">Nové heslo:</label>
                    <input type="password" id="new_password" class="form-control @error('new_password') is-invalid @enderror"
                        name="new_password">
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation" class="col-form-label">Potvrdenie nového hesla:</label>
                    <input type="password" id="new_password_confirmation" class="form-control"
                        name="new_password_confirmation">
                </div>
                <input type="submit" class="btn btn-primary" value="Uložiť"/>
            </form>
        </section>

        <hr class="hr">

        <section id="change-phone" class="mb-5 section">
            <h3>Zmena telefónneho čísla</h3>
                    
            <form action="/user/phone" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                
                <div class="form-group">
                    <label for="phone" class="col-form-label">Telefónne číslo:</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <input type="submit" class="btn btn-primary" value="Uložiť" />
            </form>
        </section>
    </main>
@endsection
