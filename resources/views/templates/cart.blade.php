@extends('layout.app')

@section('title')
<title>Cart</title>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('styles/cart1.css') }}">
@endsection

@section('content')
<div class="wrapper">
    <div class="container">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Košík</li>
                    <li class="breadcrumb-item"><a href="/cart2">Doprava a
                            platba</a></li>
                    <li class="breadcrumb-item"><a href="/cart3">Dodacie
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
            <p class="items-amount">Počet produktov v košíku: {{sizeof(($cart->cartItems))}}</p>
        </header>

        <div class="container items">
            @foreach($cart->cartItems as $item)

            <article class="row item">

                <div class="col-xs-12  col-sm-5 col-md-4 col-lg-3 center-col">
                    <div class="image-cart">
                        <a href="{{ route('product-detail',['product'=>$item->product->id])}}">
                                <img class='img-akt'
                                    src=" {{ asset($item->product->images->first()->path.'_300x420.jpg')}}"
                                    alt="{{$item->product->images->first()->path}}"
                                    >
                        </a>
                    </div>
                </div>
                <div class="col-xs-12  col-sm-5 col-md-5 col-lg-6  center-col">
                    <h3 class="item-name">{{$item->product->name}}</h3>
                    <p class="item-description">Velkosť: {{$item->productDesign->size}}</p>
                    <p class="item-description">Farba: {{$item->productDesign->color->name}}</p>
                   <div id="quantity-input-box">
                            <label for="quantity-input">Množstvo:</label>
                            <div>
                                <button type="button" class="btn input-btn d-inline-block d-md-none"
                                    onclick=" decrementNumberValue(this)">-</button>
                                <input type="number" name="quantity-input" id="quantity-input" value="{{$item->amount}}" min="1">
                                <button type="button" class="btn input-btn d-inline-block d-md-none"
                                    onclick="incrementNumberValue(this)">+</button>
                            </div>
                        </div>
                    <p class="final-price">Cena: {{$item->product->price}}</p>
    
                </div>
                <div class="col-xs-12  col-sm-2 col-md-2 col-lg-3  item_edit">
                    <form action="/cart-delete/{{$item->id}}" method="POST">
                            @csrf

                        <div class="icons">
                        <input type="hidden" name="_method" value="DELETE">
                        {{-- .  <img class="edit-item" alt="upraviť" title="Upraviť" src="../assets/icons/edit_icon.png"> --}}
                        <input type=image class="edit-item" alt="Vymazať" title="Vymazať" src="../assets/icons/delete_icon.png">

                        </div>
                    </form>
                </div>
            </article>
                    <hr>

             @endforeach

            <?php 
            $final_price = 0;
             foreach($cart->cartItems as $item)
{                $final_price = $final_price+$item->product->price*$item->amount;
}             ?>
            <div class="row summary">
                <div class="col-12">
                    <p class="summary-price" id="summary-price"><span>CENA SPOLU: </span> {{$final_price}}</p>
                    <a href="/product-category" class="back-link">
                        Späť do obchodu
                    </a>
                    <button class="submit-button" type="submit" onclick= "location.href='{{ route('cart2')}}'">
                        POKRAČOVAŤ
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<div class="clearfix"></div>
@endsection

@section('external-scripts')
@include('layout.partials.external-scripts')
@endsection


@section('custom-scripts')
<script src="../js/cart.js"></script>
@endsection