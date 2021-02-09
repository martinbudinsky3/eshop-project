@extends('layout.app')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('styles/product-category.css') }}">
@endsection

@section('title')
    @if($search)
        <title>{{ $title }}</title>
    @else
        <title>{{ $category->name }}</title>
    @endif
@endsection

@section('content')
<div class="wrapper center-col">
    <div class="container-fluid">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    @if($search)
                        <li class="breadcrumb-item"><a href="/">Hlavná stránka</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vyhľadávanie</li>
                    @else
                        <li class="breadcrumb-item"><a href="/">Hlavná stránka</a></li>
                        <li class="breadcrumb-item"><a href="">{{ $category->parentCategories[0]->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    @endif
                </ol>
            </nav>
        </div>
        <hr class="hr">
    </div>
</div>
<div class="wrapper center-col">
    <main class="container-fluid">
        @if(!$products->isEmpty())
            <div class="row row-smaller-m-b sort-selection">
                <!--Sorting selection-->
                <div class="col-xl-8 col-lg-7 col-md-6"></div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-12 ">
                    <label for="sort-order" id="sort-label">Zoradiť podľa:</label>
                    <select name="sort-order" id="sort-order" onChange=showSorted(this)>
                        <option value="1" {{ (!request()->has('sort') || request()->get('sort') == 1) ? 'selected' : ''}}>Cena vzostupne</option>
                        <option value="2" {{ (request()->get('sort') == 2) ? 'selected' : ''}}>Cena zostupne</option>
                    </select>
                </div>
            </div>
            <div class="row row-m-b">
                <!--Left filter-->
                <div class="col-lg-2 col-md-3 filter d-md-block d-none" id="left-filter">
                    <form method="get" action="{{ url()->current().'?'.http_build_query(request()->except('page')) }}">
                        @csrf
                        <fieldset class="filter-category">
                            <legend>
                                <h4>Farba</h4>
                            </legend>
                            <ul>
                                @foreach($colors as $color)
                                <li>
                                    <input type="checkbox" id="{{ $color->id }}-color-left" name="color[]" value="{{ $color->id }}"
                                        {{ (request()->has('color') && in_array($color->id, request()->get('color'))) ? 'checked' : '' }}>
                                    <label for="{{ $color->id }}-color-left">{{ $color->name }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </fieldset>

                        <fieldset class="filter-category">
                            <legend>
                                <h4>Veľkosť</h4>
                            </legend>
                            <ul>
                                @foreach($sizes as $size)
                                <li>
                                    <input type="checkbox" id="{{ $size }}-size-left" name="size[]" value="{{ $size }}"
                                        {{ (request()->has('size') && in_array($size, request()->get('size'))) ? 'checked' : '' }}>
                                    <label for="{{ $size }}-size-left">{{ $size }}</label>
                                </li>
                                @endforeach

                            </ul>
                        </fieldset>

                        <fieldset class="filter-category">
                            <legend>
                                <h4>Značka</h4>
                            </legend>
                            <ul>
                                @foreach($brands as $brand)
                                    <li>
                                        <input type="checkbox" id="{{ $brand->id }}-brand-left" name="brand[]" value="{{ $brand->id }}"
                                            {{ (request()->has('brand') && in_array($brand->id, request()->get('brand'))) ? 'checked' : '' }}>
                                        <label for="{{ $brand->id }}-brand-left">{{ $brand->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                        <input type="submit" value="Filtrovať" class="btn btn-primary">
                    </form>
                </div>
                <div class="col ">
                    <div class="row ">
                        <!--Top filter-->
                        <div class="col-12 d-md-none d-block row-smaller-m-b">
                            <div id="top-filter">
                                <button class="dropdown-button" onclick="toggleTopFilterMenu()">
                                    <span class="dropdown-button-content">
                                        Filter
                                        <i class="caret "></i>
                                    </span>
                                </button>
                                <div id="top-filter-menu" class="filter d-none d-md-none">
                                    <form method="GET" action="{{ url()->current().'?'.http_build_query(request()->except('page')) }}">
                                        @csrf
                                        <fieldset class="filter-category">
                                            <legend>
                                                <h4>Farba</h4>
                                            </legend>
                                            <ul>
                                                @foreach($colors as $color)
                                                    <li>
                                                        <input type="checkbox" id="{{ $color->id }}-color-top" name="color[]" value="{{ $color->id }}"
                                                            {{ (request()->has('color') && in_array($color->id, request()->get('color'))) ? 'checked' : '' }}>
                                                        <label for="{{ $color->id }}-color-top">{{ $color->name }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </fieldset>

                                        <fieldset class="filter-category">
                                            <legend>
                                                <h4>Veľkosť</h4>
                                            </legend>
                                            <ul>
                                                @foreach($sizes as $size)
                                                    <li>
                                                        <input type="checkbox" id="{{ $size }}-size-top" name="size[]" value="{{ $size }}"
                                                            {{ (request()->has('size') && in_array($size, request()->get('size'))) ? 'checked' : '' }}>
                                                        <label for="{{ $size }}.-size-top">{{ $size }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </fieldset>

                                        <fieldset class="filter-category">
                                            <legend>
                                                <h4>Značka</h4>
                                            </legend>
                                            <ul>
                                                @foreach($brands as $brand)
                                                    <li>
                                                        <input type="checkbox" id="{{ $brand->id }}-brand-top" name="brand[]" value="{{ $brand->id }}"
                                                            {{ (request()->has('brand') && in_array($brand->id, request()->get('brand'))) ? 'checked' : '' }}>
                                                        <label for="{{ $brand->id }}-brand-top">{{ $brand->name }}</label>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </fieldset>
                                        <input type="submit" value="Filtrovať" class="btn btn-primary">
                                        <button type="button" id="close-filter" class="btn btn-secondary"
                                            onclick="toggleTopFilterMenu()">Zavrieť</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--Pagination-->
                        @component('layout.partials.pagination', ['pagination' => $products])

                        @endcomponent

                        <!--Products-->
                        @foreach($products as $product)
                            <article class="col-lg-3 col-sm-4 col-6 row-m-b">
                                <div class="image-content">

                                    <a href="/products/{{ $product->id }}">
                                        @php
                                            $image = $product->images->first()->path;
                                        @endphp
                                        <img class="img-responsive" srcset="{{ asset($image.'_300x420.jpg') }} 300w,
                                                    {{ asset($image.'_520x728.jpg') }} 520w,
                                                    {{ asset($image.'_640x896.jpg') }} 640w" sizes="(max-width: 992px) 300px,
                                                        (max-width: 1200px) 520px,
                                                        640px" src="{{ asset($image.'_640x896.jpg') }}" alt="{{ $product->name }}">
                                    </a>
                                    <div class="color-box">
                                        @foreach($product->colors->unique() as $color)
                                            <div style="background-color: #{{ $color->hex_code }};" class="color"></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-info">
                                        <strong>{{ $product->name }}</strong><br>
                                        <!--del>17.99</del--><strong>{{ $product->price }}</strong>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                        <!--Pagination-->
                        @component('layout.partials.pagination', ['pagination' => $products])

                        @endcomponent
                    </div>
                </div>
            </div>

            <hr class="section-separator hr">

            <div class="container center-col">
                <!--Recommended products-->
                @component('layout.partials.carousel', 
                    ['heading' => $search ? 'Najpredávanejšie' : 'Najpredávanejšie v tejto kategórií', 'carouselId' => 'carousel-rec', 'data' => $recommendedProducts])
                @endcomponent 
            </div>
           

        @else
            <div class="row row-m-b">
                <div class="col-12 pt-5 pb-5">
                    <h1 class="text-center error-message">Zodpovedajúce položky neboli nájdené</h1>
                </div>
            </div>
        @endif
    </main>
</div>
@endsection

@section('external-scripts')
    @include('layout.partials.external-scripts')
@endsection

@section('custom-scripts')
    <script src="../js/product-category.js"></script>
    <script src="../js/carousel.js"></script>
@endsection
