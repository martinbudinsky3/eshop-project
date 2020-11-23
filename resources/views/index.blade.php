@extends('layout.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('styles/homepage.css') }}">
@endsection

@section('title')
<title>E-shop</title>
@endsection

@section('content')
<div class="wrapper">
    <main class="container">
        <div class="row row-m-b">
            <article class="col-sm-12">
                <div class="image-content center-box">
                    <a href="">
                        <picture>
                            <source media="(max-width: 767px)" srcset="assets/images/banner_autumn_600.jpg">
                            <source media="(max-width: 992px)" srcset="assets/images/banner_autumn_800.jpg">
                            <img src="assets/images/banner_autumn.jpg" alt="Žena v klobúku" class="img-responsive">
                        </picture>
                    </a>
                    <div class="image-elements banner-image-elements center-box">
                        <h2 class="center-text ">Jesenný výpredaj</h2>
                        <a href="" class="link-button">Zistite viac >></a>
                    </div>
                </div>
            </article>
        </div>

        <div class="row ">
            <article class="col-sm-12 col-md-6 row-m-b">
                <div class="image-content center-box">
                    <a href="">
                        <img srcset="assets/images/blouse_poster_400.jpg 400w,
                                    assets/images/blouse_poster.jpg 612w" sizes="(max-width: 420px) 400px,
                                    612px" src="assets/images/blouse_poster.jpg" class="img-responsive"
                            alt="Fotka blúzky">
                    </a>
                    <div class="image-elements medium-image-elements center-box">
                        <h3 class="image-caption white-image-caption">25% zľava na blúzky</h3>
                        <a href="" class="link-button">Zistite viac >></a>
                    </div>
                </div>
            </article>
            <article class="col-sm-12 col-md-6 row-m-b">
                <div class="image-content center-box">
                    <!--div class="image-elements price-on-image center-box">
                            <div>
                                <p><strong>-50%</strong></p>
                                <p>24.99</p>
                            </div>
                        </div-->
                    <a href="">
                        <img srcset="assets/images/boots_400.jpg 400w,
                                    assets/images/boots.jpg 612w" sizes="(max-width: 420px) 400px,
                                    612px" src="assets/images/boots.jpg" class="img-responsive" alt="Fotka čižiem">
                    </a>
                    <div class="image-elements medium-image-elements">
                        <h3 class="image-caption white-image-caption">Čižmy</h3>
                    </div>
                </div>
            </article>
        </div>

        <div class="row row-m-b">
            <section class="col-12 center-box">
                <h2 class="section-heading center-text">Novinky</h2>
                <div id="carousel-news" class="carousel slide d-none d-lg-block" data-ride="carousel">
                    <div class="carousel-inner">
                    @for($i = 0; $i < 3; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 4; $j++)
                                <div class="col-lg-3 ">
                                    <a href="product-detail/{{ $news[$i*4+$j]->id }}"> 
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($news[$i*4+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($news[$i*4+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($news[$i*4+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($news[$i*4+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $news[$i*4+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">{{ $news[$i*4+$j]->name }}</h4>
                                        <p></p>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                    </div>
                    <a class="carousel-control-prev" data-target="#carousel-news" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-news" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <div id="carousel-news-md" class="carousel slide d-none d-md-block d-lg-none" data-ride="carousel">
                    <div class="carousel-inner">
                        @for($i = 0; $i < 4; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 3; $j++)
                                <div class="col-md-4 ">
                                    <a href="product-detail/{{ $news[$i*3+$j]->id }}">
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($news[$i*3+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($news[$i*3+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($news[$i*3+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($news[$i*3+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $news[$i*3+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">
                                            {{ $news[$i*3+$j]->name }}
                                        </h4>
                                        <p></p>
                                    </div> 
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor
                    </div>
                    <a class="carousel-control-prev" data-target="#carousel-news-md" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-news-md" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div id="carousel-news-xs" class="carousel slide d-block d-md-none " data-ride="carousel">
                    <div class="carousel-inner">
                        @for($i = 0; $i < 6; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 2; $j++)
                                <div class="col-6">
                                    <a href="product-detail/{{ $news[$i*2+$j]->id }}">
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($news[$i*2+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($news[$i*2+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($news[$i*2+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($news[$i*2+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $news[$i*2+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">
                                            {{ $news[$i*2+$j]->name }}
                                        </h4>
                                        <p></p>
                                    </div> 
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor  
                    </div>  
                    <a class="carousel-control-prev" data-target="#carousel-news-xs" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-news-xs" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        </div>


        <!--The bests carousels-->
        <div class="row row-m-b">
            <section class="col-12 center-box">
                <h2 class="section-heading center-text">Najlepšie hodnotené</h2>
                <div id="carousel-bests" class="carousel slide d-none d-lg-block" data-ride="carousel">
                    <div class="carousel-inner">
                    @for($i = 0; $i < 3; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 4; $j++)
                                <div class="col-lg-3 ">
                                    <a href="product-detail/{{ $bests[$i*4+$j]->id }}"> 
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($bests[$i*4+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($bests[$i*4+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($bests[$i*4+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($bests[$i*4+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $bests[$i*4+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">{{ $bests[$i*4+$j]->name }}</h4>
                                        <p></p>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                    </div>

                    <a class="carousel-control-prev" data-target="#carousel-bests" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-bests" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <div id="carousel-bests-md" class="carousel slide d-none d-md-block d-lg-none" data-ride="carousel">
                    <div class="carousel-inner">
                        @for($i = 0; $i < 4; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 3; $j++)
                                <div class="col-md-4 ">
                                    <a href="product-detail/{{ $bests[$i*3+$j]->id }}">
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($bests[$i*3+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($bests[$i*3+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($bests[$i*3+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($bests[$i*3+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $bests[$i*3+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">
                                            {{ $bests[$i*3+$j]->name }}
                                        </h4>
                                        <p></p>
                                    </div> 
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor
                    </div>

                    <a class="carousel-control-prev" data-target="#carousel-bests-md" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-bests-md" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>



                <div id="carousel-bests-xs" class="carousel slide d-block d-md-none " data-ride="carousel">
                    <div class="carousel-inner">
                        @for($i = 0; $i < 6; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 2; $j++)
                                <div class="col-6">
                                    <a href="product-detail/{{ $bests[$i*2+$j]->id }}">
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($bests[$i*2+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($bests[$i*2+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($bests[$i*2+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($bests[$i*2+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $bests[$i*2+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">
                                            {{ $bests[$i*2+$j]->name }}
                                        </h4>
                                        <p></p>
                                    </div> 
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor  
                    </div> 
                        
                    <a class="carousel-control-prev" data-target="#carousel-bests-xs" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-bests-xs" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        </div>

        <div class="row row-m-b">
            <article class="col-sm-12">
                <div class="image-content center-box">
                    <a href="">
                        <picture>
                            <source media="(max-width: 767px)" srcset="assets/images/banner_autumn_600.jpg">
                            <source media="(max-width: 992px)" srcset="assets/images/banner_autumn_800.jpg">
                            <img src="assets/images/banner_autumn.jpg" alt="Žena v klobúku" class="img-responsive">
                        </picture>
                    </a>
                    <div class="image-elements banner-image-elements center-box">
                        <h2 class="center-text">Čo nosiť v tejto sezóne</h2>
                        <a href="" class="link-button">Zistite viac >></a>
                    </div>
                </div>
            </article>
        </div>
    </main>
</div>
@endsection

@section('external-scripts')
@include('layout.partials.external-scripts')
@endsection

@section('custom-scripts')
<script>
    $('.carousel').carousel({
        interval: false,
    });

</script>
@endsection
