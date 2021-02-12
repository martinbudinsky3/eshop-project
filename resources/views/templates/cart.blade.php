@extends('layout.app')

@section('title')
    <title>Cart</title>
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('styles/cart1.css') }}">
@endsection

@section('content')
    <div class="container mt-2">
        @if(sizeof($cartItems) > 0)
            <!--Breadcrumb-->
            <div class="center-box">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Košík</li>
                        <li class="breadcrumb-item">
                            <a href="/cart/delivery">Doprava a platba</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/order/create">Dodacie údaje</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <hr class="hr"> 
        @endif
    </div>

    <main class="container mt-2">
        <header>
            <h3>Váš nákupný košík</h3>

            @if(sizeof($cartItems) > 0)
                <p>Počet produktov v košíku: {{sizeof(($cartItems))}}</p>
            @endif
        </header>


        @foreach($cartItems as $item)
            <article class="cart-card py-4">
                <div class="row">
                    <div class="col-12 col-md-5 col-lg-4 mb-4 d-flex justify-content-center">
                        <a href="/products/{{ $item->productDesign->product->id }}">
                            <img class='img-cart img-responsive'
                                src=" {{ asset($item->productDesign->product->images->first()->path.'_300x420.jpg')}}"
                                alt="{{$item->productDesign->product->images->first()->path}}">
                        </a>
                    </div>
                    <div class="col-10 col-sm-9 col-md-7 col-lg-8 mx-auto">
                        <h3 class="mb-4">{{$item->productDesign->product->name}}</h3>
                        <p>Velkosť: {{$item->productDesign->size}}</p>
                        <p>Farba: {{$item->productDesign->color->name}}</p>

                        <div id="quantity-input-box" class="mb-4">
                            <form action="/cart-item/{{ (!$item->id) ? $loop->index : $item->id }}" name="quantity" method="POST">
                                @csrf 
                                <input type="hidden" name="_method" value="PUT">

                                <label for="quantity-input" class="d-block d-sm-inline-block">Množstvo:</label>
                                <button type="button" class="btn input-btn d-inline-block d-md-none" onclick="decrementNumberValue(this)">-</button>
                                <input type="number" name="quantity-input" id="quantity-input" value="{{$item->amount}}" min="1" >
                                <button type="button" id="increment-btn" class="btn input-btn d-inline-block d-md-none" onclick="incrementNumberValue(this)">+</button>
                                <input id="quantity-submit" class="d-block mt-2" type="submit" value="Zmeniť">
                            </form>
                        </div>
                        
                        <p class="final-price" id="final-price">Cena: {{$item->productDesign->product->price}} €</p>
                        <!--Delete icon-->
                        <form action="/cart-item/{{ (!$item->id) ? $loop->index : $item->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <input type=image class="icon" alt="Vymazať" title="Vymazať" src="../assets/icons/delete_icon.png">
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
        
        @if(sizeof($cartItems) == 0)
        <div class="my-5">
            <p>V košíku sa nenachádzajú žiadne produkty.</p>
        </div>
        @endif

        @if(sizeof($cartItems) > 0)
            <div class="summary">
                <p class="text-sm-right">CENA SPOLU: <span>{{$final_price}} €</span></p>
            </div>
        @endif

        <div class="d-flex mt-2 mb-3">
            <a href="/" class="back-link mr-auto">
                Späť do obchodu
            </a>

            @if(sizeof($cartItems) > 0)
                <a class="btn btn-primary" href ="cart/delivery/">Pokračovať</a>
            @endif
        </div>
    </main>
@endsection

@section('custom-scripts')
    <script src="../js/number-buttons.js"></script>
@endsection