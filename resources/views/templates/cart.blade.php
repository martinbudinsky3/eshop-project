@extends('layout.app')

@section('title')
<title>Cart</title>
@endsection

@section('title')
<link rel="stylesheet" href="../styles/cart1.css">
@endsection

@section('content')
<div class="wrapper">
    <div class="container">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Košík</li>
                    <li class="breadcrumb-item"><a href="#" onClick="window.location='cart2.html';">Doprava a
                            platba</a></li>
                    <li class="breadcrumb-item"><a href="#" onClick="window.location='cart3.html';">Dodacie
                            údaje</a></li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
</div>
<div class="wrapper">
    <main class="container">

        <header>
            <h3>Váš nákupný košík</h3>
            <p class="items-amount">Počet produktov v košíku: 2 </p>
        </header>

        <div class="container items">
            <article class="row item">
                <div class="col-xs-12  col-sm-5 col-md-4 col-lg-3 item-picture">
                    <div class="image-content">
                        <a href="product-detail.html">
                            <picture>
                                <source media="(max-width: 576px)" srcset="../assets/images/bluzka1_400x600.jpg">
                                <img src="../assets/images/bluzka1_600x800.jpg" alt="Blúzka s volánom"
                                    class="img-responsive">
                            </picture>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12  col-sm-5 col-md-5 col-lg-6  item-descript">
                    <h3 class="item-name">Blúzka so vzorom</h3>
                    <p class="item-description">Velkosť: XS</p>
                    <p class="item-description">Farba: Biela </p>
                    <div class="amount">
                        <label for="amount-input">Množstvo:</label><br>
                        <button class="button">+</button>
                        <input type="text" id="amount-input" class="txt-input" placeholder=" 2">
                        <button class="button">-</button>
                    </div>
                    <p class="final-price">Cena: 22€</p>
                </div>
                <div class="col-xs-12  col-sm-2 col-md-2 col-lg-3  item_edit">
                    <div class="icons">
                        <img class="edit-item" alt="upraviť" title="Upraviť" src="../assets/icons/edit_icon.png">
                        <img class="edit-item" alt="Vymazať" title="Vymazať" src="../assets/icons/delete_icon.png">
                    </div>
                </div>
            </article>


            <article class="row item">
                <div class="col-xs-12  col-sm-5 col-md-4 col-lg-3 item-picture">
                    <div class="image-content">
                        <a href="product-detail.html">
                            <picture>
                                <source media="(max-width: 576px)" srcset="../assets/images/bluzka2_400x600.jpg">
                                <img src="../assets/images/bluzka2_550x800.jpg" alt="Blúzka s volánom"
                                    class="img-responsive">
                            </picture>
                        </a>>
                    </div>
                </div>
                <div class="col-xs-12  col-sm-5 col-md-5 col-lg-6  item_descript">
                    <h3 class="item-name">Volánová blúzka</h3>
                    <p class="item-description">Veľkosť: M</p>
                    <p class="item-description">Farba: Biela </p>
                    <div class="amount">
                        <label for="amount-input1">Množstvo:</label><br>
                        <button class="button">+</button>
                        <input type="text" id="amount-input1" class="txt-input" placeholder="1">
                        <button class="button">-</button>
                    </div>
                    <p class="final-price">Cena: 10€</p>
                </div>
                <div class="col-xs-12  col-sm-2 col-md-2 col-lg-3  item_edit">
                    <div class="icons">
                        <img class="edit-item" alt="Upraviť" title="Upraviť" src="../assets/icons/edit_icon.png">
                        <img class="edit-item" alt="Vymazať" title="Vymazať" src="../assets/icons/delete_icon.png">
                    </div>
                </div>
            </article>
            <hr>
            <div class="row summary">
                <div class="col-12">
                    <p class="summary-price"><span>CENA SPOLU: </span>32€</p>
                    <a href="/cart" class="back-link">
                        Späť do obchodu
                    </a>
                    <button class="submit-button" type="submit">
                        POKRAČOVAŤ
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<div class="clearfix"></div>
@endsection
