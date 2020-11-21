@extends('layout.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('styles/product-category.css') }}">
@endsection

@section('title')
<title>{{ $category->name }}</title>
@endsection

@section('content')
<div class="wrapper center-col">
    <div class="container-fluid">
        <!--Breadcrumb-->
        <div class="center-box">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Hlavná stránka</a></li>
                    <li class="breadcrumb-item"><a href="#">Ženy</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blúzky</li>
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
                <form action="" method="GET">
                    <fieldset class="filter-category">
                        <legend>
                            <h4>Farba</h4>
                        </legend>
                        <ul>
                            <li>
                                <input type="checkbox" id="white" name="white">
                                <label for="white">biela</label>
                            </li>
                            <li>
                                <input type="checkbox" id="black" name="black">
                                <label for="black">čierna</label>
                            </li>
                            <li>
                                <input type="checkbox" id="purple" name="purple">
                                <label for="purple">fialová</label>
                            </li>
                            <li>
                                <input type="checkbox" id="blue" name="blue">
                                <label for="blue">modrá</label>
                            </li>
                            <li>
                                <input type="checkbox" id="green" name="green">
                                <label for="green"> zelená</label>
                            </li>
                        </ul>
                    </fieldset>

                    <fieldset class="filter-category">
                        <legend>
                            <h4>Veľkosť</h4>
                        </legend>
                        <ul>
                            <li>
                                <input type="checkbox" id="xxs" name="xxs">
                                <label for="xxs">XXS</label>
                            </li>
                            <li>
                                <input type="checkbox" id="xs" name="xs">
                                <label for="xs">XS</label>
                            </li>
                            <li>
                                <input type="checkbox" id="s" name="s">
                                <label for="s">S</label>
                            </li>
                            <li>
                                <input type="checkbox" id="m" name="m">
                                <label for="m">M</label>
                            </li>
                            <li>
                                <input type="checkbox" id="l" name="l">
                                <label for="l">L</label>
                            </li>
                            <li>
                                <input type="checkbox" id="xl" name="xl">
                                <label for="xl">XL</label>
                            </li>
                            <li>
                                <input type="checkbox" id="xxl" name="xxl">
                                <label for="xxl">XXL</label>
                            </li>
                        </ul>
                    </fieldset>

                    <fieldset class="filter-category">
                        <legend>
                            <h4>Značka</h4>
                        </legend>
                        <ul>
                            <li>
                                <input type="checkbox" id="rainbow" name="rainbow">
                                <label for="rainbow">RAINBOW</label>
                            </li>
                            <li>
                                <input type="checkbox" id="fashionweek" name="fashionweek">
                                <label for="fashionweek">Fashionweek</label>
                            </li>
                            <li>
                                <input type="checkbox" id="esmara" name="esmara">
                                <label for="esmara">Esmara</label>
                            </li>
                            <li>
                                <input type="checkbox" id="amando" name="amando">
                                <label for="amando">Amando</label>
                            </li>
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
                                            <li>
                                                <input type="checkbox" id="white-top" name="white">
                                                <label for="white-top">biela</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="black-top" name="black">
                                                <label for="black-top">čierna</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="purple-top" name="purple">
                                                <label for="purple-top">fialová</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="blue-top" name="blue">
                                                <label for="blue-top">modrá</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="green-top" name="green">
                                                <label for="green-top"> zelená</label>
                                            </li>
                                        </ul>
                                    </fieldset>

                                    <fieldset class="filter-category">
                                        <legend>
                                            <h4>Veľkosť</h4>
                                        </legend>
                                        <ul>
                                            <li>
                                                <input type="checkbox" id="xxs-top" name="xxs">
                                                <label for="xxs-top">XXS</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="xs-top" name="xs">
                                                <label for="xs-top">XS</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="s-top" name="s">
                                                <label for="s-top">S</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="m-top" name="m">
                                                <label for="m-top">M</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="l-top" name="l">
                                                <label for="l-top">L</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="xl-top" name="xl">
                                                <label for="xl-top">XL</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="xxl-top" name="xxl">
                                                <label for="xxl-top">XXL</label>
                                            </li>
                                        </ul>
                                    </fieldset>

                                    <fieldset class="filter-category">
                                        <legend>
                                            <h4>Značka</h4>
                                        </legend>
                                        <ul>
                                            <li>
                                                <input type="checkbox" id="rainbow-top" name="rainbow">
                                                <label for="rainbow-top">RAINBOW</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="fashionweek-top" name="fashionweek">
                                                <label for="fashionweek-top">Fashionweek</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="esmara-top" name="esmara">
                                                <label for="esmara-top">Esmara</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="amando-top" name="amando">
                                                <label for="amando-top">Amando</label>
                                            </li>
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
                    @component('layout.partials.pagination', ['pagination' => $category->products])

                    @endcomponent

                    <!--Products-->
                    @foreach($category->products as $product)
                        <article class="col-lg-3 col-sm-4 col-6 row-m-b">
                            <div class="image-content">
                                <a href="">
                                    @php
                                        $image = $product->images->first()->path;
                                    @endphp
                                    <img class="img-responsive" srcset="{{ asset($image.'_300x420.jpg') }} 300w,
                                                {{ asset($image.'_520x728.jpg') }} 520w,
                                                {{ asset($image.'_640x896.jpg') }} 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="$image_640x896.jpg" alt="Úpletový sveter">
                                </a>
                                <div class="color-box">
                                    <div style="background-color: black;" class="color"></div>
                                    <div style="background-color: yellow;" class="color"></div>
                                    <div style="background-color: white;" class="color"></div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-info">
                                    <strong>{{ $product->name }}</strong><br>
                                    <!--del>17.99</del--><strong>{{ $product->price }}</strong>
                                </div>
                                <div class="cart">
                                    <a href="">
                                        <img src="../assets/icons/cart-icon.png" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach

                    <!--Pagination-->
                    @component('layout.partials.pagination', ['pagination' => $category->products])

                    @endcomponent
                </div>
            </div>
        </div>

        <hr class="section-separator">

        <!--Recommended products-->
        <section class="row row-m-b">
            <div class="col-12 center-box">
                <h2 class="section-heading">Najpredávanejšie v tejto kategórií</h2>
                <div id="carousel-rec" class="carousel slide d-none d-lg-block" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/pulover-dlhy-rukav_300x420.jpg 300w,
                                                    ../assets/images/pulover-dlhy-rukav_520x728.jpg 520w,
                                                    ../assets/images/pulover-dlhy-rukav_640x896.jpg 640w" sizes="(max-width: 992px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/pulover-dlhy-rukav_640x896.jpg"
                                            alt="Úpletový sveter">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Úpletový sveter</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/kosela-s-dlhym-rukavom_300x420.jpg 300w,
                                                    ../assets/images/kosela-s-dlhym-rukavom_520x728.jpg 520w,
                                                    ../assets/images/kosela-s-dlhym-rukavom.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/kosela-s-dlhym-rukavom.jpg"
                                            alt="Károvaná košeľa">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Károvaná košeľa</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive"
                                            srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_300x420.jpg 300w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_520x728.jpg 520w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px"
                                            src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg"
                                            alt="Tričko s dlhým rukávom">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tričko s dlhým rukávom
                                        </h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/tielko_300x420.jpg 300w,
                                                    ../assets/images/tielko_520x728.jpg 520w,
                                                    ../assets/images/tielko_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/tielko_640x896.jpg" alt="Tielko">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tielko</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/strecova-bluzka_300x420.jpg 300w,
                                                    ../assets/images/strecova-bluzka_520x728.jpg 520w,
                                                    ../assets/images/strecova-bluzka_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/strecova-bluzka_640x896.jpg"
                                            alt="Strečová blúzka">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Strečová blúzka</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/pulover-dlhy-rukav_300x420.jpg 300w,
                                                    ../assets/images/pulover-dlhy-rukav_520x728.jpg 520w,
                                                    ../assets/images/pulover-dlhy-rukav_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/pulover-dlhy-rukav_640x896.jpg"
                                            alt="Úpletový sveter">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Úpletový sveter</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/kosela-s-dlhym-rukavom_300x420.jpg 300w,
                                                    ../assets/images/kosela-s-dlhym-rukavom_520x728.jpg 520w,
                                                    ../assets/images/kosela-s-dlhym-rukavom.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/kosela-s-dlhym-rukavom.jpg"
                                            alt="Károvaná košeľa">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Károvaná košeľa</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive"
                                            srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_300x420.jpg 300w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_520x728.jpg 520w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px"
                                            src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg"
                                            alt="Tričko s dlhým rukávom">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tričko s dlhým rukávom
                                        </h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/tielko_300x420.jpg 300w,
                                                    ../assets/images/tielko_520x728.jpg 520w,
                                                    ../assets/images/tielko_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/tielko_640x896.jpg" alt="Tielko">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tielko</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/strecova-bluzka_300x420.jpg 300w,
                                                    ../assets/images/strecova-bluzka_520x728.jpg 520w,
                                                    ../assets/images/strecova-bluzka_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/strecova-bluzka_640x896.jpg"
                                            alt="Strečová blúzka">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Strečová blúzka</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/pulover-dlhy-rukav_300x420.jpg 300w,
                                                    ../assets/images/pulover-dlhy-rukav_520x728.jpg 520w,
                                                    ../assets/images/pulover-dlhy-rukav_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/pulover-dlhy-rukav_640x896.jpg"
                                            alt="Úpletový sveter">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Úpletový sveter</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/kosela-s-dlhym-rukavom_300x420.jpg 300w,
                                                    ../assets/images/kosela-s-dlhym-rukavom_520x728.jpg 520w,
                                                    ../assets/images/kosela-s-dlhym-rukavom.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/kosela-s-dlhym-rukavom.jpg"
                                            alt="Károvaná košeľa">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Károvaná košeľa</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/pulover-dlhy-rukav_300x420.jpg 300w,
                                                    ../assets/images/pulover-dlhy-rukav_520x728.jpg 520w,
                                                    ../assets/images/pulover-dlhy-rukav_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/pulover-dlhy-rukav_640x896.jpg"
                                            alt="Úpletový sveter">
                                        <div class="carousel-caption ">
                                            <h4 class="carousel-product-name white-image-caption">Úpletový sveter
                                            </h4>
                                            <p></p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/kosela-s-dlhym-rukavom_300x420.jpg 300w,
                                                    ../assets/images/kosela-s-dlhym-rukavom_520x728.jpg 520w,
                                                    ../assets/images/kosela-s-dlhym-rukavom.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/kosela-s-dlhym-rukavom.jpg"
                                            alt="Károvaná košeľa">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Károvaná košeľa
                                        </h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive"
                                            srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_300x420.jpg 300w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_520x728.jpg 520w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px"
                                            src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg"
                                            alt="Tričko s dlhým rukávom">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tričko s dlhým rukávom
                                        </h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/tielko_300x420.jpg 300w,
                                                    ../assets/images/tielko_520x728.jpg 520w,
                                                    ../assets/images/tielko_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/tielko_640x896.jpg" alt="Tielko">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tielko</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/strecova-bluzka_300x420.jpg 300w,
                                                    ../assets/images/strecova-bluzka_520x728.jpg 520w,
                                                    ../assets/images/strecova-bluzka_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/strecova-bluzka_640x896.jpg"
                                            alt="Strečová blúzka">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Strečová blúzka</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/pulover-dlhy-rukav_300x420.jpg 300w,
                                                    ../assets/images/pulover-dlhy-rukav_520x728.jpg 520w,
                                                    ../assets/images/pulover-dlhy-rukav_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/pulover-dlhy-rukav_640x896.jpg"
                                            alt="Úpletový sveter">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Úpletový sveter</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/kosela-s-dlhym-rukavom_300x420.jpg 300w,
                                                    ../assets/images/kosela-s-dlhym-rukavom_520x728.jpg 520w,
                                                    ../assets/images/kosela-s-dlhym-rukavom.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/kosela-s-dlhym-rukavom.jpg"
                                            alt="Károvaná košeľa">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Károvaná košeľa</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive"
                                            srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_300x420.jpg 300w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_520x728.jpg 520w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px"
                                            src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg"
                                            alt="Tričko s dlhým rukávom">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tričko s dlhým rukávom
                                        </h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/tielko_300x420.jpg 300w,
                                                    ../assets/images/tielko_520x728.jpg 520w,
                                                    ../assets/images/tielko_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/tielko_640x896.jpg" alt="Tielko">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tielko</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/pulover-dlhy-rukav_300x420.jpg 300w,
                                                    ../assets/images/pulover-dlhy-rukav_520x728.jpg 520w,
                                                    ../assets/images/pulover-dlhy-rukav_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/pulover-dlhy-rukav_640x896.jpg"
                                            alt="Úpletový sveter">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Úpletový sveter</h4>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/kosela-s-dlhym-rukavom_300x420.jpg 300w,
                                                    ../assets/images/kosela-s-dlhym-rukavom_520x728.jpg 520w,
                                                    ../assets/images/kosela-s-dlhym-rukavom.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/kosela-s-dlhym-rukavom.jpg"
                                            alt="Károvaná košeľa">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Károvaná košeľa</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive"
                                            srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_300x420.jpg 300w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_520x728.jpg 520w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px"
                                            src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg"
                                            alt="Tričko s dlhým rukávom">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tričko s dlhým rukávom
                                        </h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/tielko_300x420.jpg 300w,
                                                    ../assets/images/tielko_520x728.jpg 520w,
                                                    ../assets/images/tielko_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/tielko_640x896.jpg" alt="Tielko">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tielko</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/strecova-bluzka_300x420.jpg 300w,
                                                    ../assets/images/strecova-bluzka_520x728.jpg 520w,
                                                    ../assets/images/strecova-bluzka_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/strecova-bluzka_640x896.jpg"
                                            alt="Strečová blúzka">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Strečová blúzka</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/pulover-dlhy-rukav_300x420.jpg 300w,
                                                    ../assets/images/pulover-dlhy-rukav_520x728.jpg 520w,
                                                    ../assets/images/pulover-dlhy-rukav_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/pulover-dlhy-rukav_640x896.jpg"
                                            alt="Úpletový sveter">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Úpletový sveter</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/kosela-s-dlhym-rukavom_300x420.jpg 300w,
                                                    ../assets/images/kosela-s-dlhym-rukavom_520x728.jpg 520w,
                                                    ../assets/images/kosela-s-dlhym-rukavom.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/kosela-s-dlhym-rukavom.jpg"
                                            alt="Károvaná košeľa">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Károvaná košeľa</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive"
                                            srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_300x420.jpg 300w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_520x728.jpg 520w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px"
                                            src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg"
                                            alt="Tričko s dlhým rukávom">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tričko s dlhým rukávom
                                        </h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/tielko_300x420.jpg 300w,
                                                    ../assets/images/tielko_520x728.jpg 520w,
                                                    ../assets/images/tielko_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/tielko_640x896.jpg" alt="Tielko">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Tielko</h4>
                                        <p></p>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <a href="product-detail.html">
                                        <img class="d-block w-100 img-responsive" srcset="../assets/images/strecova-bluzka_300x420.jpg 300w,
                                                    ../assets/images/strecova-bluzka_520x728.jpg 520w,
                                                    ../assets/images/strecova-bluzka_640x896.jpg 640w" sizes="(max-width: 768px) 300px,
                                                    (max-width: 1200px) 520px,
                                                    640px" src="../assets/images/strecova-bluzka_640x896.jpg"
                                            alt="Strečová blúzka">
                                    </a>
                                    <div class="carousel-caption ">
                                        <h4 class="carousel-product-name white-image-caption">Strečová blúzka</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
