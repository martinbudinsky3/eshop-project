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

                    <form id="register-form">

                        <div class="form-group col-md-6 offset-md-3">
                            <p class="form-restriction">Všetky údaje sú povinné.</p>

                            <label for="email">Email </label>
                            <input type="text" class="text-input form-control" id="email" placeholder="Email">
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label for="password">Heslo </label>
                            <input type="text" class="text-input form-control" id="password" placeholder="********">
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label for="password_again">Zopakujte heslo</label>
                            <input type="text" class="text-input form-control" id="password_again"
                                placeholder="********">
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label for="phone">Telefónne číslo </label>
                            <input type="text" class="text-input form-control" id="phone" placeholder="Heslo">
                        </div>

                        <div class="form-check col-md-6 offset-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="conditions-check">
                                <label class="form-check-label" for="conditions-check">
                                    Súhlasím s <a href="">obchodnými podmienkami spoločnosti. </a></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter-check">
                                <label class="form-check-label" for="newsletter-check">
                                    Súhlasím so zasielaním reklamných mailov.</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <div id="register-button" class="row login_button">
                    <div class="col-12 center-box">
                        <button class="login-button" onClick="window.location='../index.html';" type="submit"
                            form="register-form">REGISTROVAŤ</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
