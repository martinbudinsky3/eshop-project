@extends('layout.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('styles/profile-info.css') }}">
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
        <!--Phone number change modal-->
        <div class="modal fade" id="modal-phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Zmena telefónneho čísla</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/phone" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="phone" class="col-form-label">Telefónne číslo:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary">Zmeniť</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Password change modal-->
        <div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Zmena telefónneho čísla</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/password" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="phone" class="col-form-label">Staré heslo:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Nové heslo:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Nové heslo:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary">Zmeniť</button>
                    </div>
                </div>
            </div>
        </div>

        <section class="mb-5">
            <h3>Registračné údaje</h3>

            <table class="mt-4 mb-4 registration-info table-responsive">
                <tbody>
                    <tr>
                        <th>Email:</th>
                        <td>
                            {{ Auth::user()->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>Telefónne číslo:</th>
                        <td>
                            {{ Auth::user()->phone }}
                            <a href="/profile/settings/#change-phone" class="button-icon">
                                <img class="edit-icon img-responsive" src="../assets/icons/edit_icon.png" alt="">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="/profile/settings/#change-password" class="btn btn-primary">Zmeniť heslo</a>
        </section>

        <hr class="hr">

        <section>
            <h3>Dodacie údaje</h3>
            <p>Uložte svoje dodacie údaje a ušetrite tak čas pri nákupe tovaru.</p>
            <p class="form-restriction mt-4">* - všetky údaje sú povinné.</p>

            <form action="/deliveries" method="post">
                @csrf
                <input type="hidden" name="_method" value="put"/>

                <div class="form-group">
                    <label for="name">Meno a priezvisko *</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        value="{{ $delivery ? $delivery->name : old('name') }}">
                    @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror"  required
                            autocomplete="email" id="email" name="email" placeholder="napr. priklad@mail.com"
                            value = "{{ $delivery ? $delivery->email : old('email') }}">
                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefónne číslo *</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror " required
                           id="phone" name="phone" placeholder=" napr. +421999888777"
                           value = "{{ $delivery ? $delivery->phone : old('phone') }}">
                    @error('phone')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="col-sm-8 col-md-8 form-group">
                        <label for="street">Ulica *</label>
                        <input type="text" class="form-control" id="street" name="street" required
                            value="{{ $delivery ? $delivery->street : old('street') }}">
                        @error('street')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="col-sm-4 col-md-4 form-group">
                        <label for="house_number">Číslo domu *</label>
                        <input type="text" class="form-control" id="house_number" name="house_number" required
                            value="{{ $delivery ? $delivery->house_number : old('house_number') }}">
                        @error('house_number')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-8 col-md-8 form-group ">
                        <label for="town">Mesto *</label>
                        <input type="text" class="form-control" id="town" name="town" required
                            value="{{ $delivery ? $delivery->town : old('town') }}">
                        @error('town')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="col-sm-4 col-md-4 form-group">
                        <label for="zip">PSČ *</label>
                        <input type="text" class="form-control" id="zip" name="zip" required placeholder="napr. 96801"
                            value="{{ $delivery ? $delivery->zip : old('zip') }}">
                        @error('zip')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="form-group ">
                    <label for="country">Krajina *</label>
                    <input type="text" class="form-control" id="country" name="country" required
                        value="{{ $delivery ? $delivery->country : old('country') }}">
                    @error('country')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <button class="btn btn-primary mb-3" type="submit">Uložiť</button>
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

@section('external-scripts')
    @include('layout.partials.external-scripts')
@endsection
