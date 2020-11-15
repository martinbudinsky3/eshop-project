@extends('layout.app')

@section('custom-css')
<link rel="stylesheet" href="../styles/product-detail.css">
@endsection

@section('title')
<title>Product detail</title>
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
                <a href="cart.html" class="btn btn-primary">Prejsť do košíka</a>
                <a href="product-category.html" class="btn btn-secondary">Späť k nákupu</a>
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
                    <li class="breadcrumb-item"><a href="#">Hlavná stránka</a></li>
                    <li class="breadcrumb-item"><a href="#">Ženy</a></li>
                    <li class="breadcrumb-item"><a href="#">Blúzky</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tričko s dlhým rukávom s potlačou</li>
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
                        <li data-target="#carousel-product-images" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-product-images" data-slide-to="1"></li>
                        <li data-target="#carousel-product-images" data-slide-to="2"></li>
                        <li data-target="#carousel-product-images" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="">
                                <img class="d-block w-100 img-responsive"
                                    srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_520x728.jpg 520w,
                                                    ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg 640w" sizes="(max-width: 576px) 520px,
                                                    640px"
                                    src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy_640x896.jpg"
                                    alt="Tričko s dlhým rukávom">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="">
                                <img class="d-block w-100 img-responsive"
                                    srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-1_520x728.jpg 520w,
                                            ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-1_640x896.jpg 640w" sizes="(max-width: 576px) 520px,
                                            640px"
                                    src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-1_640x896.jpg"
                                    alt="Tričko s dlhým rukávom">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="">
                                <img class="d-block w-100 img-responsive" srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-2_520x728.jpg 520w,
                                        ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-2_640x896.jpg 640w"
                                    sizes="(max-width: 576px) 520px,
                                        640px"
                                    src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-2_640x896.jpg"
                                    alt="Tričko s dlhým rukávom">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="">
                                <img class="d-block w-100 img-responsive"
                                    srcset="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-3_520x728.jpg 520w,
                                            ../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-3_640x896.jpg 640w" sizes="(max-width: 576px) 520px,
                                            640px"
                                    src="../assets/images/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-3_640x896.jpg"
                                    alt="Tričko s dlhým rukávom">
                            </a>
                        </div>
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
                        <h1>Tričko s dlhým rukávom a potlačou</h1>
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
                        <strong class="price-off">12.99</strong>
                        <del>17.99</del>
                    </span>

                    <!--Product form-->
                    <form action="" id="product-input" onsubmit="formSubmitPrevent(event)">
                        <div id="color-input-box">
                            <label for="color-selector">Farba:</label>
                            <select name="color-selector" id="color-selector">
                                <option value="black">Čierna</option>
                                <option value="blue">Modrá</option>
                                <option value="white">Biela</option>
                            </select>
                        </div>

                        <div id="size-input-box">
                            <label for="size-selector">Veľkosť:</label>
                            <select name="size-selector" id="size-selector">
                                <option value="xxs">XXS</option>
                                <option value="xs">XS</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                            </select>
                            <a href="">Veľkostná tabuľka</a>
                        </div>

                        <div id="quantity-input-box">
                            <label for="quantity-input">Množstvo:</label>
                            <div>
                                <button type="button" class="btn input-btn d-inline-block d-md-none"
                                    onclick="decrementNumberValue(this)">-</button>
                                <input type="number" name="quantity-input" id="quantity-input" value="1" min="1">
                                <button type="button" class="btn input-btn d-inline-block d-md-none"
                                    onclick="incrementNumberValue(this)">+</button>
                            </div>

                        </div>

                        <input type="submit" value="Pridať do košíka" id="add-to-cart" data-toggle="modal"
                            data-target="#add-to-cart-modal">
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

                    <p>Skvelá priľnavá blúzka s čipkovaným lemovaním, mäkká bavlna je veľmi príjemná pri nosení
                        a dobre drží tvar.
                        Pohodlná blúzka sa skvelo hodí k elegantným čiernym nohaviciam či sukni.
                    </p>

                    <table id="product-attributes">
                        <tr>
                            <th>Materiál:</th>
                            <td>95 % bavlna, 5 % elastán</td>
                        </tr>
                        <tr>
                            <th>Značka:</th>
                            <td>RAINBOW</td>
                        </tr>
                        <tr>
                            <th>Farba:</th>
                            <td>biela</td>
                        </tr>
                        <tr>
                            <th>Priehľadnosť:</th>
                            <td>nepriesvitný</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <hr class="section-separator">

        <!--Reviews-->
        <section class="row">
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
        </section>

        <hr class="section-separator">

        <!--Similar products-->
        <section class="row row-m-b">
            <div class="col-12 center-box">
                <h2 class="section-heading">Podobné produkty</h2>
                <div id="carousel-similars" class="carousel slide d-none d-lg-block" data-ride="carousel">
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
                    <a class="carousel-control-prev" data-target="#carousel-similars-md" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-similars-md" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div id="carousel-similars-xs" class="carousel slide d-block d-md-none " data-ride="carousel">
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
                    <a class="carousel-control-prev" data-target="#carousel-similars-xs" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel-similars-xs" role="button"
                        data-slide="next">
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
@endsection
