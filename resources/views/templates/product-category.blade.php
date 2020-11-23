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
        <hr>
    </div>
</div>
<div class="wrapper center-col">
    <main class="container-fluid">
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

                                <a href="/product-detail/{{ $product->id }}">
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
                                <!--div class="cart">
                                    <a href="">
                                        <img src="../assets/icons/cart-icon.png" alt="" class="img-responsive">
                                    </a>
                                </div-->
                            </div>
                        </article>
                    @endforeach

                    <!--Pagination-->
                    @component('layout.partials.pagination', ['pagination' => $products])
                    
                    @endcomponent
                </div>
            </div>
        </div>

        <hr class="section-separator">

        <!--Recommended products-->
        <section class="row row-m-b">
            <div class="col-12 center-box">
                @if($search)
                <h2 class="section-heading">Najpredávanejšie</h2>
                @else
                <h2 class="section-heading">Najpredávanejšie v tejto kategórií</h2>
                @endif
                <div id="carousel-rec" class="carousel slide d-none d-lg-block" data-ride="carousel">
                    <div class="carousel-inner">
                    @for($i = 0; $i < 3; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 4; $j++)
                                <div class="col-lg-3 ">
                                    <a href="/product-detail/{{ $recommendedProducts[$i*4+$j]->id }}"> 
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($recommendedProducts[$i*4+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($recommendedProducts[$i*4+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($recommendedProducts[$i*4+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($recommendedProducts[$i*4+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $recommendedProducts[$i*4+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">{{ $recommendedProducts[$i*4+$j]->name }}</h4>
                                        <p></p>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                    </div>

                    <a class="carousel-control-prev" data-target="#carousel-rec" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-rec" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div id="carousel-rec-md" class="carousel slide d-none d-md-block d-lg-none" data-ride="carousel">
                    <div class="carousel-inner">
                        @for($i = 0; $i < 4; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 3; $j++)
                                <div class="col-md-4 ">
                                    <a href="/product-detail/{{ $recommendedProducts[$i*3+$j]->id }}">
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($recommendedProducts[$i*3+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($recommendedProducts[$i*3+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($recommendedProducts[$i*3+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($recommendedProducts[$i*3+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $recommendedProducts[$i*3+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">
                                            {{ $recommendedProducts[$i*3+$j]->name }}
                                        </h4>
                                        <p></p>
                                    </div> 
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor
                    </div>

                    <a class="carousel-control-prev" data-target="#carousel-rec-md" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-rec-md" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div id="carousel-rec-xs" class="carousel slide d-block d-md-none " data-ride="carousel">
                    <div class="carousel-inner">
                        @for($i = 0; $i < 6; $i++)
                        <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @for($j = 0; $j < 2; $j++)
                                <div class="col-6">
                                    <a href="/product-detail/{{ $recommendedProducts[$i*2+$j]->id }}">
                                        <img class="d-block w-100 img-responsive" srcset="{{asset($recommendedProducts[$i*2+$j]->images->first()->path.'_300x420.jpg')}} 300w,
                                                    {{asset($recommendedProducts[$i*2+$j]->images->first()->path.'_520x728.jpg')}} 520w,
                                                    {{asset($recommendedProducts[$i*2+$j]->images->first()->path.'_640x896.jpg')}} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="{{asset($recommendedProducts[$i*2+$j]->images->first()->path.'_640x896.jpg')}}"
                                            alt="{{ $recommendedProducts[$i*2+$j]->name }}">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">
                                            {{ $recommendedProducts[$i*2+$j]->name }}
                                        </h4>
                                        <p></p>
                                    </div> 
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor  
                    </div>  
                    <a class="carousel-control-prev" data-target="#carousel-rec-xs" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-rec-xs" role="button" data-slide="next">
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
<script src="../js/product-category.js"></script>

<script>
    $('.carousel').carousel({
        interval: false,
    });

</script>
@endsection
