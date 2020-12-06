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
        @if(sizeof($cartItems) > 0)
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Košík</li>
                    <li class="breadcrumb-item"><a href="/cart/delivery">Doprava a
                            platba</a></li>
                    <li class="breadcrumb-item"><a href="/cart/data">Dodacie
                            údaje</a></li>
                   
                </ol>
            </nav>
        </div>
        <hr> 
        @endif
    </div>
</div>
<div class="wrapper">
    <main class="container">

        <header>
            <h3>Váš nákupný košík</h3>
            <p class="items-amount">Počet produktov v košíku: {{sizeof(($cartItems))}}</p>
        </header>

        <div class="items">
            
            @foreach($cartItems as $item)
            <article class="item">
                <div class="row">
                    <div class="col-12 col-md-5 mb-4 d-flex justify-content-center">
                        <div class="image-cart">
                            <a href="">
                                <img class='img-akt img-responsive'
                                    src=" {{ asset($item->productDesign->product->images->first()->path.'_300x420.jpg')}}"
                                    alt="{{$item->productDesign->product->images->first()->path}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-10 col-sm-9 col-md-7 mx-auto">
                        <h3 class="item-name mb-4">{{$item->productDesign->product->name}}</h3>
                        <p class="item-description">Velkosť: {{$item->productDesign->size}}</p>
                        <p class="item-description">Farba: {{$item->productDesign->color->name}}</p>
                        <div id="quantity-input-box" class="mb-4">
                            <form action="/cart-update/{{ (!$item->id) ? $loop->index : $item->id }}" name="quantity" method="POST">
                                @csrf 
                                <input type="hidden" name="_method" value="PUT">

                                <label for="quantity-input" class="d-block d-sm-inline-block">Množstvo:</label>
                                <button type="button" class="btn input-btn d-inline-block d-md-none"
                                    onclick=" decrementNumberValue(this)">-</button>
                                <input type="number" name="quantity-input" id="quantity-input" value="{{$item->amount}}" min="1" >
                                <button type="button" class="btn input-btn d-inline-block d-md-none"
                                    onclick="incrementNumberValue(this)">+</button>
                                <input id="quantity-submit" class="d-block mt-2" type="submit" >
                            </form>
                        </div>
                        <p class="final-price" id="final-price">Cena: {{$item->productDesign->product->price}} €</p>
                        <!--Delete icon-->
                        <form action="/cart-delete/{{ (!$item->id) ? $loop->index : $item->id }}" method="POST">
                         @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <div class="icons ">
                                <input type=image class="edit-item" alt="Vymazať" title="Vymazať" src="../assets/icons/delete_icon.png">
                            </div>
                        </form>
                    </div>
                </div>
            </article>
             @endforeach
             
            <hr>

            @if(sizeof($cartItems) == 0)
            <p>V košíku sa nenachádzajú žiadne produkty.</p>
            @endif

            <div class="row summary">
                <div class="col-12">
                    <p class="summary-price text-sm-right" id="summary-price">CENA SPOLU: <span>{{$final_price}} €</span></p>

                    @if(sizeof($cartItems) > 0)
                    <button class="submit-button mb-3" onclick="window.location.href = '{{ url('cart/delivery') }}'">POKRAČOVAŤ</button>
                    @endif

                    <a href="/" class="back-link float-left">
                        Späť do obchodu
                    </a>
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