<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/product-detail.css">
    <title>Product detail</title>
</head>

<body>
    <!--640x896-->
    <!--200x280-->
    <!--Opaque layers-->
    <div id="opaque-layer-sm" class="opaque-layer pop-up d-none d-sm-none"></div>
    <div id="opaque-layer-lg" class="opaque-layer pop-up d-none d-lg-none"></div>

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

    <!--Page header-->
    <div class="wrapper">
        <header class="container">
            <div class="row page-header">
                <!--Logo-->
                <div id="logo-box" class="col-2 col-4-sm d-md-block">
                    <a href="../index.html">
                        <picture>
                            <source media="(min-width: 576px)" srcset="../assets/images/logo.png">
                            <img src="../assets/images/logo-cropped.png" alt="Logo">
                        </picture>
                    </a>
                </div>
                <!--Icon nav + Search-->
                <div id="icons-box" class="col-10 col-8-sm d-md-flex vertical-reverse ">
                    <div class="header-icons">
                        <a href="cart.html" class="cart-link">
                            <i class="fa fa-shopping-cart icon" aria-hidden="true"></i>
                        </a>

                        <!--Profile button-->
                        <div id="profile-dropdown">
                            <button class="icon-btn" onclick="handleProfileButtonClick()">
                                <i class="fa fa-user icon" aria-hidden="true"></i>
                            </button>

                            <!--Profile menu-->
                            <nav id="profile-menu" class="pop-up d-none">
                                <!--Close menu button-->
                                <button class="left-menu-close icon-btn d-inline-block d-sm-none" onclick="closeMenu()">
                                    <i class="fa fa-times-circle icon" aria-hidden="true"></i>
                                </button>


                                <ul>
                                    <li>
                                        <a href="login.html">Prihlásenie</a>
                                    </li>
                                    <li>
                                        <a href="register.html">Registrácia</a>
                                    </li>

                                    <!--Logged in user-->
                                    <!--li>
                                        <a href="">Profil</a>
                                    </li>
                                    <li>
                                        <a href="">Odhlásenie</a>
                                    </li-->
                                </ul>
                            </nav>
                        </div>

                        <!--Search button - < 768px-->
                        <button class="icon-btn d-inline-block d-md-none" id="search-icon"
                            onclick="handleSearchButtonClick()">
                            <i class="fa fa-search icon"></i>
                        </button>

                        <!--Search bar - >= 768px-->
                        <div class="d-none d-md-block">
                            <form action="">
                                <input type="text" name="search-full-text" class="search-full-text"
                                    placeholder="Zadajte hľadaný výraz">
                                <button type="submit" class="icon-btn">
                                    <i class="fa fa-search icon"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Search bar - < 768px-->
                <div id="search-bar" class="col-12 d-none d-md-none">
                    <button class="icon-btn">
                        <i class="fa fa-times-circle icon" aria-hidden="true" onclick="handleSearchButtonClick()"></i>
                    </button>
                    <form action="" id="search-form-xs">
                        <input type="text" name="search-full-text" class="search-full-text"
                            placeholder="Zadajte hľadaný výraz" id="search-input-xs">
                        <button type="submit" id="search-submit-xs" class="icon-btn">
                            <i class="fa fa-search icon"></i>
                        </button>
                    </form>
                </div>
            </div>
        </header>
    </div>

    <!--Main menu-->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-col">
                    <nav id="main-menu">
                        <!--Navigation - >= 992px-->
                        <ul id="first-level" class="d-none d-lg-block">
                            <li>
                                <div class="nav-item-dropdown" onmouseover="showMenSubmenu()"
                                    onmouseout="hideMenSubmenu()">
                                    <a href="product-category.html" class="navigation-link">
                                        Muži
                                    </a>
                                    <nav id="men-submenu" class="sub-menu dropdown-content d-none">
                                        <ul>
                                            <li>
                                                <a href="product-category.html">Tričká</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Košeľe</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Nohavice</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Obleky</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Novinky</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Akcie</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Najlepšie hodnotené</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </li>
                            <li>
                                <div class="nav-item-dropdown" onmouseover="showWomenSubmenu()"
                                    onmouseout="hideWomenSubmenu()">
                                    <a href="product-category.html" class="navigation-link">
                                        Ženy
                                    </a>
                                    <nav id="women-submenu" class="sub-menu dropdown-content d-none">
                                        <ul>
                                            <li>
                                                <a href="product-category.html">Tričká</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Blúzky</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Šaty</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Nohavice</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Svetre</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Novinky</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Akcie</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Najlepšie hodnotené</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </li>
                            <li>
                                <div class="nav-item-dropdown" onmouseover="showKidsSubmenu()"
                                    onmouseout="hideKidsSubmenu()">
                                    <a href="product-category.html" class="navigation-link">
                                        Deti
                                    </a>
                                    <nav id="kids-submenu" class="sub-menu dropdown-content d-none">
                                        <ul>
                                            <li>
                                                <a href="product-category.html">Tričká</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Kombinézy</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Svetre</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Mikiny</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Novinky</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Akcie</a>
                                            </li>

                                            <li>
                                                <a href="product-category.html">Najlepšie hodnotené</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </li>
                        </ul>

                        <!--Navigation - < 992px-->
                        <button id="menu-bars" class="icon-btn d-block d-lg-none" onclick="showLeftMenu()">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!--Left menu - first level-->
                        <nav id="left-menu" class="left-menu pop-up d-none d-lg-none">
                            <!--Close menu button-->
                            <button class="left-menu-close icon-btn d-inline-block" onclick="closeMenu()">
                                <i class="fa fa-times-circle icon" aria-hidden="true"></i>
                            </button>
                            <table class="left-menu-table">
                                <colgroup>
                                    <col span="1" class="col-80">
                                    <col span="1" class="col-20">
                                </colgroup>

                                <tr>
                                    <td class="left-td">
                                        <button class="btn btn-link left-menu-btn" onclick="showLeftMenSubmenu()">
                                            Muži

                                        </button>
                                    </td>
                                    <td class="arrow-td">
                                        <i class="fa fa-long-arrow-right" onclick="showLeftMenSubmenu()"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left-td">
                                        <button class="btn btn-link left-menu-btn"
                                            onclick="showLeftWomenSubmenu()">Ženy</button>
                                    </td>
                                    <td class="arrow-td">
                                        <i class="fa fa-long-arrow-right" onclick="showLeftWomenSubmenu()"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left-td">
                                        <button class="btn btn-link left-menu-btn"
                                            onclick="showLeftKidsSubmenu()">Deti</button>
                                    </td>
                                    <td class="arrow-td">
                                        <i class="fa fa-long-arrow-right" onclick="showLeftWomenSubmenu()"></i>
                                    </td>
                                </tr>
                            </table>
                        </nav>

                        <!--Left menu - second level-->
                        <nav id="left-men-submenu" class="left-menu left-submenu pop-up d-none d-lg-none">
                            <!--Close menu button-->
                            <button class="left-menu-close icon-btn d-inline-block d-lg-none" onclick="closeMenu()">
                                <i class="fa fa-times-circle icon" aria-hidden="true"></i>
                            </button>

                            <!--Back to first level-->
                            <table class="left-menu-table left-submenu-table">
                                <colgroup>
                                    <col span="1" class="col-70">
                                    <col span="1" class="col-30">
                                </colgroup>
                                <tr>
                                    <td class="left-td arrow-td" onclick="closeLeftSubmenu('left-men-submenu')">
                                        <i class="fa fa-long-arrow-left"></i>
                                    </td>
                                    <td onclick="closeLeftSubmenu('left-men-submenu')">
                                        Muži
                                    </td>
                                </tr>
                            </table>
                            <ul>
                                <li>
                                    <a href="product-category.html">všetky produkty</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Tričká</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Košeľe</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Nohavice</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Obleky</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Novinky</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Akcie</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Najlepšie hodnotené</a>
                                </li>
                            </ul>
                        </nav>

                        <!--Left menu - second level-->
                        <nav id="left-women-submenu" class="left-menu left-submenu pop-up d-none d-lg-none">
                            <!--Close menu button-->
                            <button class="left-menu-close icon-btn d-inline-block d-lg-none" onclick="closeMenu()">
                                <i class="fa fa-times-circle icon" aria-hidden="true"></i>
                            </button>

                            <!--Back to first level-->
                            <table class="left-menu-table left-submenu-table">
                                <colgroup>
                                    <col span="1" class="col-70">
                                    <col span="1" class="col-30">
                                </colgroup>
                                <tr>
                                    <td class="left-td arrow-td" onclick="closeLeftSubmenu('left-women-submenu')">
                                        <i class="fa fa-long-arrow-left"></i>
                                    </td>
                                    <td onclick="closeLeftSubmenu('left-women-submenu')">
                                        Ženy
                                    </td>
                                </tr>
                            </table>
                            <ul>
                                <li>
                                    <a href="product-category.html">všetky produkty</a>
                                </li>
                                <li>
                                    <a href="product-category.html">Tričká</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Blúzky</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Šaty</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Nohavice</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Svetre</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Novinky</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Akcie</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Najlepšie hodnotené</a>
                                </li>
                            </ul>
                        </nav>

                        <!--Left menu - second level-->
                        <nav id="left-kids-submenu" class="left-menu left-submenu pop-up d-none">
                            <!--Close menu button-->
                            <button class="left-menu-close icon-btn d-inline-block d-lg-none" onclick="closeMenu()">
                                <i class="fa fa-times-circle icon" aria-hidden="true"></i>
                            </button>

                            <!--Back to first level-->
                            <table class="left-menu-table left-submenu-table">
                                <colgroup>
                                    <col span="1" class="col-70">
                                    <col span="1" class="col-30">
                                </colgroup>
                                <tr>
                                    <td class="left-td arrow-td" onclick="closeLeftSubmenu('left-kids-submenu')">
                                        <i class="fa fa-long-arrow-left"></i>
                                    </td>
                                    <td onclick="closeLeftSubmenu('left-kids-submenu')">
                                        Deti
                                    </td>
                                </tr>
                            </table>

                            <ul>
                                <li>
                                    <a href="product-category.html">všetky produkty</a>
                                </li>
                                <li>
                                    <a href="product-category.html">Tričká</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Kombinézy</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Svetre</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Mikiny</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Novinky</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Akcie</a>
                                </li>

                                <li>
                                    <a href="product-category.html">Najlepšie hodnotené</a>
                                </li>
                            </ul>
                        </nav>
                    </nav>
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
                                        <div class="progress-bar" role="progressbar" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                        </div>
                                    </div>
                                </td>
                                <td>(30)</td>
                            </tr>
                            <tr>
                                <th><a href="">2 <span class="fa fa-star checked"></span></a> </th>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                        </div>
                                    </div>
                                </td>
                                <td>(30)</td>
                            </tr>
                            <tr>
                                <th><a href="">3 <span class="fa fa-star checked"></span></a> </th>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                        </div>
                                    </div>
                                </td>
                                <td>(30)</td>
                            </tr>
                            <tr>
                                <th><a href="">4 <span class="fa fa-star checked"></span></a> </th>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                        </div>
                                    </div>
                                </td>
                                <td>(30)</td>
                            </tr>
                            <tr>
                                <th><a href="">5 <span class="fa fa-star checked"></span></a> </th>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100" style="width:20%">
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

                        <a class="carousel-control-prev" data-target="#carousel-similars" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" data-target="#carousel-similars" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div id="carousel-similars-md" class="carousel slide d-none d-md-block d-lg-none"
                        data-ride="carousel">
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

    <!--Footer-->
    <div class="wrapper">
        <footer class="container">
            <hr>
            <nav class="row row-m-b">
                <div class="col-12 col-md-3 footer-link">
                    <a href="" class="footer-link">Obchodné podmienky</a>
                </div>
                <div class="col-12 col-md-3 footer-link">
                    <a href="" class="footer-link">Kontakt</a>
                </div>
                <div class="col-12 col-md-3 footer-link">
                    <a href="" class="footer-link">Doprava</a>
                </div>
                <div class="col-12 col-md-3 footer-link">
                    <a href="" class="footer-link">Reklamácia</a>
                </div>
            </nav>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
    <script src="../js/product-detail.js"></script>
    <script>
        $('.carousel').carousel({ interval: false, });
    </script>
</body>

</html>