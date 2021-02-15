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
                    <li class="breadcrumb-item"><a href="/profile">Profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Osobné údaje</li>
                </ol>
            </nav>
        </div>
        <hr class="hr">
    </div>
    <main class="container mt-2">
        <!--section class="mb-4">
            <h3>Registračné údaje</h3>
                    
            <form action="" method="POST">
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
                    <label for="phone">Telefónne číslo *</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                        id="phone" name="phone" value="{{ old('phone') }}" required
                        placeholder="napr. +421012345678">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary mb-3" type="submit">Upraviť</button>
            </form>
        </section>

        <hr class="hr"-->

        <section>
            <h3>Dodacie údaje</h3>
            <p>Uložte svoje dodacie údaje a ušetrite tak čas pri nákupe tovaru.</p>
            <p class="form-restriction mt-4">* - všetky údaje sú povinné.</p>

            <form action="/deliveries" method="post">
                @csrf
                <input type="hidden" name="_method" value="put"/>

                <div class="form-group">
                    <label for="name">Meno a priezvisko *</label>
                    <input type="text" class="text-input form-control" id="name" name="name" required
                        value="{{ $delivery ? $delivery->name : old('name') }}">
                    @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="text-input form-control  @error('email') is-invalid @enderror"  required
                            autocomplete="email" id="email" name="email" placeholder="napr. priklad@mail.com"
                            value = "{{ $delivery ? $delivery->email : old('email') }}">

                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefónne číslo *</label>
                    <input type="tel" class="text-input form-control @error('phone') is-invalid @enderror " required id="phone" name="phone" placeholder=" napr. +421999888777"
                        value = "{{ $delivery ? $delivery->phone_number : old('phone') }}">
                        
                        @error('phone')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-row">
                    <div class="col-sm-8 col-md-8 form-group">
                        <label for="street">Ulica *</label>
                        <input type="text" class="text-input form-control" id="street" name="street" required
                            value="{{ $delivery ? $delivery->street : old('street') }}">

                        @error('street')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="col-sm-4 col-md-4 form-group">
                        <label for="numb">Číslo domu *</label>
                        <input type="text" class="text-input form-control" id="numb" name="numb" required
                            value="{{ $delivery ? $delivery->house_number : old('numb') }}">
                        @error('numb')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-8 col-md-8 form-group ">
                        <label for="town">Mesto *</label>
                        <input type="text" class="text-input form-control" id="town" name="town" required
                            value="{{ $delivery ? $delivery->town : old('town') }}">
                        @error('town')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="col-sm-4 col-md-4 form-group">
                        <label for="zip">PSČ *</label>
                        <input type="text" class="text-input form-control" id="zip" name="zip" required placeholder="napr. 96801"
                            value="{{ $delivery ? $delivery->zip : old('zip') }}">
                        @error('zip')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="form-group ">
                    <label for="country">Krajina *</label>
                    <input type="text" class="text-input form-control" id="country" name="country" required
                        value="{{ $delivery ? $delivery->country : old('country') }}">
                    @error('country')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <button class="btn btn-primary mb-3" type="submit">Upraviť</button>
            </form>

            @if($delivery)
                <form action="/deliveries" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete"/>
                    <button class="btn btn-secondary mb-3" type="submit">Vymazať</button>
                </form>
            @endif
        </section>
    </main>
@endsection