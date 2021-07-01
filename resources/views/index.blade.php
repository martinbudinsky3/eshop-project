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
                            <h2 class="center-text h2">Jesenný výpredaj</h2>
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
                            <h3 class="image-caption white-image-caption h3">25% zľava na blúzky</h3>
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
                            <h3 class="image-caption white-image-caption h3">Čižmy</h3>
                        </div>
                    </div>
                </article>
            </div>

            <!--New products-->
            @component('layout.partials.carousel',
                ['heading' => 'Novinky', 'carouselId' => 'carousel-news', 'data' => $news])
            @endcomponent

            <!--Best reviewed products-->
            @component('layout.partials.carousel',
                ['heading' => 'Najlepšie hodnotené', 'carouselId' => 'carousel-bests', 'data' => $bests])
            @endcomponent

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
                            <h2 class="center-text h2">Čo nosiť v tejto sezóne</h2>
                            <a href="" class="link-button">Zistite viac >></a>
                        </div>
                    </div>
                </article>
            </div>
        </main>
        <aside class="container">
            @auth
                @if($survey)
                    <div class="row row-m-b justify-content-center">
                        <section class="col-4 card">
                            <div class="card-body">
                                <h2 class="card-title center-text">Anketa</h2>
                                <form action="/votes" method="POST">
                                    <fieldset>
                                        <legend>{{$survey->text}}</legend>

                                        @foreach($survey->answers as $answer)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="{{$answer->id}}"
                                                       id="{{$answer->id}}" {{$loop->first ? "checked" : ""}}>
                                                <label class="form-check-label" for="{{$answer->id}}">
                                                    {{$answer->text}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </fieldset>

                                    <input class="btn btn-primary mt-3" type="submit" value="Hlasovať">
                                </form>
                            </div>
                        </section>
                    </div>
                @endif
            @endauth
        </aside>
    </div>
@endsection

@section('external-scripts')
    @include('layout.partials.external-scripts')
@endsection

@section('custom-scripts')
    <script src="../js/carousel.js"></script>
@endsection
