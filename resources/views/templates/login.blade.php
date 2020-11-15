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
                    <form id="login-form">

                        <div class="row form">
                            <div class="col-12 form-group ">
                                <label for="email">Email *</label>
                                <input type="text" class="text-input form-control" id="email" placeholder="Email">
                            </div>

                            <div class="col-12 form-group ">
                                <label for="password">Heslo *</label>
                                <input type="text" class="text-input form-control" id="password" placeholder="Heslo">
                                <a class="forgot-password" href="#" onClick="window.location='register.html';">Zabudli
                                    ste heslo? </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>


            <div class="container">
                <div id="login-button" class="row login_button">
                    <div class="col-12 center-box">
                        <button class="login-button" onClick="window.location='../index.html';" type="submit"
                            form="login-form">PRIHLÁSENIE</button>
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
