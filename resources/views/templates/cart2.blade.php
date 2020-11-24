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
            <form action="/cart/data/"  id="cart-form" class="row item" method="get">
                <div class="col-xs-10  col-sm-6 col-md-5 col-lg-5 bloky">
                    <fieldset>
                        <legend class="select-title">
                            Zvoľte dopravu
                        </legend>
                        <div class="radio-buttons">
                            <input type="radio" class="radio-input" id="delivery1" value=1 name="delivery"  checked onchange = "my_function(1,'Osobný odber',0,{{$final_price}})">
                            <label class="radio-label" for="delivery1">Osobný odber</label>
                            <div class="row">
                                <div class="col">
                                    <p class="price-delivery">Zadarmo</p>
                                </div>
                                <div class="col">
                                    <p class="time-delivery"> dnes od 15:00</p>
                                </div>
                            </div>

                            <input type="radio" class="radio-input" id="delivery2"  value=2 name="delivery" onchange = "my_function(1,'Doručenie kuriérom',5.10,{{$final_price}})">
                            <label class="radio-label" for="delivery2">Doručenie kuriérom</label>
                            <div class="row">
                                <div class="col">
                                    <p class="price-delivery">4.60€</p>
                                </div>
                                <div class="col">
                                    <p class="time-delivery">5.10</p>
                                </div>
                            </div>
                            <input type="radio" class="radio-input" id="delivery3" value =3  name="delivery" onchange = "my_function(1,'Pošta',1.76,{{$final_price}})">
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
                                <input type="radio" class="radio-input" id="pay4" name="pay" value=1 checked  onchange = "my_function(2,'Kartou online',0,{{$final_price}})">
                                <label class="radio-label" for="pay4">Kartou online</label>
                                <div class="col">
                                    <p class="pay-description">Zadarmo</p>
                                </div>
                            </div>

                            <div>
                                <input type="radio" class="radio-input" id="pay1" name="pay"  value=2  onchange = "my_function(2,'Vúb e-platby',0,{{$final_price}})">
                                <label class="radio-label" for="pay1">VúB e-platby</label>
                                <div class="col">
                                    <p class="pay-description">Zadarmo</p>
                                </div>
                            </div>

                            <div>
                                <input type="radio" class="radio-input" id="pay2" name="pay" value=3  onchange = "my_function(2,'Platba kuriérovi',3.60,{{$final_price}})">
                                <label class="radio-label" for="pay2">Platba kuriérovi</label>
                                <div class="col">
                                    <p class="pay-description">3.60€</p>
                                </div>
                            </div>

                            <div>
                                <input type="radio" class="radio-input" id="pay3" name="pay" value=4  onchange = "my_function(2,'Bankový prevod',0,{{$final_price}})">
                                <label class="radio-label" for="pay3">Bankový prevod</label>
                                <div class="col">
                                    <p class="pay-description">Zadarmo</p>
                                </div>
                            </div>

                            <div>
                                <input type="radio" class="radio-input" id="pay5" name="pay" value="5" onchange = "my_function(2,'Kredit',0,{{$final_price}})">
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
                    <p class="summary-delivery" id ='summary-delivery'> <span>Doprava: </span>{{$transport->name}}</p>
                    <p class="summary-pay" id = 'summary-pay'> <span>Platba: </span> {{$payment->name}}</p>
                    <p class="summary-price" id='summary-price'> <span>CENA SPOLU: </span>{{$final_price}}</p>

                    <a href="/cart" class="back-link">Späť</a>

                    <input class="submit-button"  form="cart-form" type="submit" value = POKRAČOVAŤ>
                </div>
            </div>

        </section>
    </main>
</div>

<div class="clearfix"></div>
@endsection

@section('custom-scripts')

<script>
let delivery_price = 0;
let payment_price = 0;

function my_function(group,val,act_price,final_price){

    console.log("changed");
    console.log("value ",val);
    if(group==1)
        {
        let p = document.getElementById('summary-delivery');
        p.innerHTML ='<span>Doprava: </span> ' +  val;
        delivery_price = act_price;
    }
     if(group==2)
         {
        let p = document.getElementById('summary-pay');
        p.innerHTML ='<span>Platba: </span> ' +  val;
        payment_price = act_price;
    
    }
     let p = document.getElementById('summary-price');
     price = final_price + delivery_price + payment_price;
     price =  Math.round(price * 100) / 100;
     p.innerHTML ='<span>CENA SPOLU: </span> ' +  price;
    
}
</script>

@endsection
