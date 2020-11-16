@extends('layout.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('styles/cart2.css') }}">
@endsection

@section('title')
<title>Cart</title>
@endsection

@section('content')
<div class="wrapper">
    <div class="container">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/cart">Košík</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doprava a platba</li>
                    <li class="breadcrumb-item"><a href="/cart3">Dodacie
                            údaje</a></li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
</div>

<div class="wrapper">
    <main class="container items">
        <section>
            <h3>Výber dopravy a platby</h3>
            <form action="POST" target="_blank" id="cart-form" class="row item">
                <div class="col-xs-10  col-sm-6 col-md-5 col-lg-5 bloky">
                    <fieldset>
                        <legend class="select-title">
                            Zvoľte dopravu
                        </legend>
                        <div class="radio-buttons">
                            <input type="radio" class="radio-input" id="delivery1" name="delivery1">
                            <label class="radio-label" for="delivery1">Osobný odber</label>
                            <div class="row">
                                <div class="col">
                                    <p class="price-delivery">Zadarmo</p>
                                </div>
                                <div class="col">
                                    <p class="time-delivery"> dnes od 15:00</p>
                                </div>
                            </div>

                            <input type="radio" class="radio-input" id="delivery2" name="delivery1" checked>
                            <label class="radio-label" for="delivery2">Doručenie kuriérom</label>
                            <div class="row">
                                <div class="col">
                                    <p class="price-delivery">4.60€</p>
                                </div>
                                <div class="col">
                                    <p class="time-delivery">5.10</p>
                                </div>
                            </div>
                            <input type="radio" class="radio-input" id="delivery3" name="delivery1">
                            <label class="radio-label" for="delivery3">Pošta</label>
                            <div class="row">
                                <div class="col">
                                    <p class="price-delivery">1.76€</p>
                                </div>
                                <div class="col">
                                    <p class="time-delivery">zajtra</p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-10  col-sm-5 col-md-5 col-lg-5 bloky">
                    <fieldset>
                        <legend class="select-title">
                            Zvoľte platbu
                        </legend>
                        <div class="radio-buttons">
                            <div>
                                <input type="radio" class="radio-input" id="pay4" name="pay" checked>
                                <label class="radio-label" for="pay4">Kartou online</label>
                                <div class="col">
                                    <p class="pay-description">Zadarmo</p>
                                </div>
                            </div>

                            <div>
                                <input type="radio" class="radio-input" id="pay1" name="pay">
                                <label class="radio-label" for="pay1">VúB e-platby</label>
                                <div class="col">
                                    <p class="pay-description">Zadarmo</p>
                                </div>
                            </div>

                            <div>
                                <input type="radio" class="radio-input" id="pay2" name="pay">
                                <label class="radio-label" for="pay2">Platba kuriérovi</label>
                                <div class="col">
                                    <p class="pay-description">3.60€</p>
                                </div>
                            </div>

                            <div>
                                <input type="radio" class="radio-input" id="pay3" name="pay">
                                <label class="radio-label" for="pay3">Bankový prevod</label>
                                <div class="col">
                                    <p class="pay-description">Zadarmo</p>
                                </div>
                            </div>

                            <div>
                                <input type="radio" class="radio-input" id="pay5" name="pay">
                                <label class="radio-label" for="pay3">Kredit</label>
                                <div class="col">
                                    <p class="pay-description">Zadarmo</p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
            <div class="row summary">
                <div class="col-12">
                    <!--table>
                        <tr>
                            <th>Doprava:</th>
                            <td>Doručenie kuriérom</td>
                        </tr>
                        <tr>
                            <th>Platba:</th>
                            <td>Kartou online</td>
                        </tr>
                        <tr>
                            <th>Cena spolu:</th>
                            <td>40.20€</td>
                        </tr>

                    </table-->
                    <p class="summary-delivery"> <span>Doprava: </span>Doručenie kuriérom</p>
                    <p class="summary-pay"> <span>Platba: </span> Kartou online</p>
                    <p class="summary-price"> <span>CENA SPOLU: </span> 40.20€</p>

                    <a href="/cart" class="back-link">Späť</a>
                    <button class="submit-button" type="submit"
                        form="cart-form">
                        POKRAČOVAŤ</button>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="clearfix"></div>
@endsection
