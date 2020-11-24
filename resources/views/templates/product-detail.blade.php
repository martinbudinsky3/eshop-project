@extends('layout.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('styles/product-detail.css') }}">
@endsection

@section('title')
<title>{{ $product->name }}</title>
@endsection

@section('content')

<!-- Modal window that pops up after user adds product to cart -->
<div class="modal fade" id="add-to-cart-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nákup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Produkt bol pridaný do košíka</p>
            </div>
            <div class="modal-footer modal-footer-custom">
                <a href="/cart" class="btn btn-primary">Prejsť do košíka</a>
                <a href="/category/{{ $product->categories[0]->id }}" class="btn btn-secondary">Späť k nákupu</a>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="container">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Hlavná stránka</a></li>
                    <li class="breadcrumb-item"><a href="">{{ $product->categories[0]->parentCategories[0]->name }}</a></li>
                    <li class="breadcrumb-item"><a href="/category/{{ $product->categories[0]->id }}">{{ $product->categories[0]->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                </ol>
            </nav>
        </div>
        <hr>
    </div>
</div>
<div class="wrapper">
    <main class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 col-12 row-m-b">
                   
                <!--Carousel-->
                <div id="carousel-product-images" class="carousel slide " data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach ($liste_images as $key => $act_image)
                            <li data-target="#carousel-product-images" data-slide-to="{{$key}}", class = "{{$key == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                    
                        @foreach ($liste_images as $key => $act_image)
                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                <img class="d-block w-100 img-responsive"
                                    srcset="{{ asset($act_image.'_520x728.jpg')}} 520w,
                                            {{ asset($act_image.'_640x896.jpg')}} 640w" 
                                    sizes="(max-width: 576px) 520px, 640px"
                                    src="{{ asset($act_image.'_640x896.jpg')}}"
                                    alt="{{$act_image}}">
                            </div> 
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" data-target="#carousel-product-images" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-product-images" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-1 d-lg-block d-none"></div>
            <div class="col-md-5 col-sm-8 col-10 row-m-b center-col">
                <div class="product-info">
                    <header class="section-heading">
                    <h1> {{ $product->name }}</h1>
                        <a href="">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span>(150)</span>
                        </a>

                    </header>

                    <span id="price-section">
                        <strong class = "price-off"> {{ $product->price }}</strong>
                        <!--del>17.99</del-->
                    </span>

                    <!--Product form-->
                    <form action="/cart-item/{{ $product->id }}" method="POST" id="product-input">
                        @csrf

                        <div id="color-input-box">
                            <label for="color_selector">Farba:</label>
                                <select name="color" id="color_selector" onChange="showProductInColor(this)">
                                    @foreach ($liste_color as $color)
                                    <option value="{{$color->id}}" {{ (request()->get('color') == $color->id) ? 'selected' : ''}}> {{ $color->name }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div id="size-input-box">
                            <label for="size_selector">Veľkosť:</label>
                            <select name="size" id="size_selector">
                                @foreach ($liste_size as $size)
                                <option value="{{$size->size}}"> {{ $size->size }}</option>
                                @endforeach
                            </select>
                            <a href="">Veľkostná tabuľka</a>
                        </div>

                        <div id="quantity-input-box">
                            <label for="quantity-input">Množstvo:</label>
                            <div>
                                <button type="button" class="btn input-btn d-inline-block d-md-none"
                                    onclick="decrementNumberValue(this)">-</button>
                                <input type="number" name="amount" id="quantity-input" value="1" min="1">
                                <button type="button" class="btn input-btn d-inline-block d-md-none"
                                    onclick="incrementNumberValue(this)">+</button>
                            </div>
                        </div>
                        <button type="button" id="add-to-cart" data-toggle="modal"
                            data-target="#add-to-cart-modal">Pridať do košíka</button>
                        <input type="hidden" id="product" name="product" value="{{ $product->id }}">
                    </form>
                </div>
            </div>
        </div>
        <hr class="section-separator">
        <section class="row row-m-b">
            <div class="col  padded-box">
                <!--Product description and attributes-->
                <div id="product-description">
                    <h2 class="section-heading">Opis a vlastnosti produktu</h2>

                    <p>{{ $product->description }}</</p>

                    <table id="product-attributes">
                        <tr>
                            <th>Materiál:</th>
                            <td>{{ $product->material }}</</td>
                        </tr>
                        <tr>
                            <th>Značka:</th>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <hr class="section-separator">

        <!--Reviews-->
        {{-- <section class="row">
            <div class="col-12 center-box section-heading">
                <h2>Hodnotenia produktu</h2>
            </div>
            <div class="col-lg-8 col-12 center-box row-m-b">
                <article class="review center-box">
                    <p>
                        <span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </span>
                        <b>&nbsp; Adriána</b>
                        / 7.10.2020
                    </p>
                    <p>
                        Super, presne ako na obrázku.
                    </p>
                    <hr class="review-separator">
                </article>

                <article class="review center-box">
                    <p>
                        <span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </span>
                        <b>&nbsp; Adriána</b>
                        / 7.10.2020
                    </p>
                    <p>
                        Super, presne ako na obrázku.
                    </p>
                    <hr class="review-separator">
                </article>

                <article class="review center-box">
                    <p>
                        <span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </span>
                        <b>&nbsp; Adriána</b>
                        / 7.10.2020
                    </p>
                    <p>
                        Super, presne ako na obrázku.
                    </p>
                    <hr class="review-separator">
                </article>
                <!--Pagination-->
                <nav>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"> <span class="page-link pagination-three-dots">....</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">49</a></li>
                        <li class="page-item"><a class="page-link" href="#">50</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <button id="add-review" class="btn btn-primary">Pridať recenziu</button>
            </div>
            <div class="col-lg-4 col-12 row-m-b">
                <!--Reviews stats table-->
                <div class="center-box">
                    <span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span>(150)</span>
                    </span>
                    <table id="rating-table">
                        <colgroup>
                            <col span="1" class="stars-col">
                            <col span="1" class="ratio-col">
                            <col span="1">
                        </colgroup>

                        <tr>
                            <th><a href="">1 <span class="fa fa-star checked"></span></a> </th>
                            <td class="ratio-col">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                        aria-valuemax="100" style="width:20%">
                                    </div>
                                </div>
                            </td>
                            <td>(30)</td>
                        </tr>
                        <tr>
                            <th><a href="">2 <span class="fa fa-star checked"></span></a> </th>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                        aria-valuemax="100" style="width:20%">
                                    </div>
                                </div>
                            </td>
                            <td>(30)</td>
                        </tr>
                        <tr>
                            <th><a href="">3 <span class="fa fa-star checked"></span></a> </th>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                        aria-valuemax="100" style="width:20%">
                                    </div>
                                </div>
                            </td>
                            <td>(30)</td>
                        </tr>
                        <tr>
                            <th><a href="">4 <span class="fa fa-star checked"></span></a> </th>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                        aria-valuemax="100" style="width:20%">
                                    </div>
                                </div>
                            </td>
                            <td>(30)</td>
                        </tr>
                        <tr>
                            <th><a href="">5 <span class="fa fa-star checked"></span></a> </th>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                        aria-valuemax="100" style="width:20%">
                                    </div>
                                </div>
                            </td>
                            <td>(30)</td>
                        </tr>
                    </table>
                </div>
            </div>
         <hr class="section-separator">

        </section> --}}


        <!--Similar products-->
        <section class="row">
            <div class="center-box">
                <h2 class="section-heading">Podobné produkty</h2>

                <div id="carousel-similars" class="carousel slide d-none d-lg-block" data-ride="carousel">
                    <div class="carousel-inner">
                        @for($i = 0; $i < 3; $i++)
                            <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @for($j = 0; $j < 4; $j++)
                                        <div class="col-xs-6 col-md-4  col-lg-3">
                                                <a href="/product-detail/{{ $similar_products[$i*4+$j]->id }}">
                                                    <img class="d-block w-100 img-responsive"
                                                      srcset="{{asset($similar_products[$i*4+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                                {{asset($similar_products[$i*4+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                                {{asset($similar_products[$i*4+$j]->images->first()->path.'_640x896.jpg')}} 640w"
                                                                sizes="(max-width: 992px) 300px,
                                                                (max-width: 1200px) 520px, 640px"
                                                        src=" {{asset($similar_products[$i*4+$j]->images->first()->path.'_640x896.jpg')}}"
                                                        alt="{{($similar_products[$i*4+$j])->name}}">
                                                </a>
                                                <div class="carousel-caption ">
                                                    <h4 class="carousel-product-name white-image-caption">{{($similar_products[$i*4+$j])->name}}</h4>
                                                    <p> </p>
                                                </div>
                                        </div>     
                                    @endfor    
                                </div>    
                            </div>          
                        @endfor
                    </div>
                    <a class="carousel-control-prev" data-target="#carousel-similars" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-similars" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div id="carousel-similars-md" class="carousel slide d-none d-md-block d-lg-none" data-ride="carousel">
                <div class="carousel-inner">
                        @for($i = 0; $i < 4; $i++)
                            <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @for($j = 0; $j < 3; $j++)
                                        <div class="col-md-4">
                                                <a href="/product-detail/{{ $similar_products[$i*3+$j]->id }}">
                                                    <img class="d-block w-100 img-responsive"

                                                        srcset="{{asset($similar_products[$i*3+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                                {{asset($similar_products[$i*3+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                                {{asset($similar_products[$i*3+$j]->images->first()->path.'_640x896.jpg')}} 640w"
                                                                sizes="(max-width: 992px) 300px,
                                                                (max-width: 1200px) 520px, 640px"
                                                        src=" {{asset($similar_products[$i*3+$j]->images->first()->path.'_640x896.jpg')}}"
                                                        alt="{{($similar_products[$i*3+$j])->name}}">
                                                </a>
                                                <div class="carousel-caption ">
                                                    <h4 class="carousel-product-name white-image-caption">{{($similar_products[$i*3+$j])->name}}</h4>
                                                    <p> </p>
                                                </div>
                                        </div>     
                                    @endfor    
                                </div>    
                            </div>          
                        @endfor
                    </div>
                   <a class="carousel-control-prev" data-target="#carousel-similars-md" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-similars-md" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div id="carousel-similars-xs" class="carousel slide d-block d-md-none " data-ride="carousel">
                    <div class="carousel-inner">
                        @for($i = 0; $i < 6; $i++)
                            <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @for($j = 0; $j < 2; $j++)
                                        <div class="col-6">
                                                <a href="/product-detail/{{ $similar_products[$i*2+$j]->id }}">
                                                    <img class="d-block w-100 img-responsive"
                                                        srcset="{{asset($similar_products[$i*2+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                                {{asset($similar_products[$i*2+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                                {{asset($similar_products[$i*2+$j]->images->first()->path.'_640x896.jpg')}} 640w"
                                                                sizes="(max-width: 992px) 300px,
                                                                (max-width: 1200px) 520px, 640px"
                                                        src=" {{asset($similar_products[$i*2+$j]->images->first()->path.'_640x896.jpg')}}"
                                                        alt="{{($similar_products[$i*2+$j])->name}}">
                                                </a>
                                                <div class="carousel-caption ">
                                                    <h4 class="carousel-product-name white-image-caption">{{($similar_products[$i*2+$j])->name}}</h4>
                                                    <p> </p>
                                                </div>
                                        </div>     
                                    @endfor    
                                </div>    
                            </div>          
                        @endfor
                    </div>
                   <a class="carousel-control-prev" data-target="#carousel-similars-xs" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-similars-xs" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection

@section('external-scripts')
@include('layout.partials.external-scripts')
@endsection

@section('custom-scripts')
<script src="../js/product-detail.js"></script>
<script>
    $('.carousel').carousel({
        interval: false,
    });

</script>

<script>
    jQuery(document).ready(function($){

        // CREATE
        $("#add-to-cart").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();
            var formData = {
                size: jQuery('select[name=size]').val(),
                color: jQuery('select[name=color]').val(),
                product: jQuery('input[name=product]').val(),
                amount: jQuery('input[name=amount]').val()
            };

            var type = "POST";
            var ajaxurl = '/cart-item';
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
            });
        });
    });
</script>

@endsection
