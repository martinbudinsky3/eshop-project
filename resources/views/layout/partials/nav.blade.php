<!--Main menu-->
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 menu-col">
                <nav id="main-menu">
                    <!--Navigation - >= 992px-->
                    <ul id="first-level" class="d-none d-lg-block">
                        @foreach($parentCategories as $parentCategory)
                        <li>
                            <div class="nav-item-dropdown" onmouseover="showSubmenu({{ $parentCategory->id }})" onmouseout="hideSubmenu({{ $parentCategory->id }})">
                                <a href="" class="navigation-link">
                                    {{ $parentCategory->name }}
                                </a>
                                <nav id="{{ $parentCategory->id }}" class="sub-menu dropdown-content d-none">
                                    <ul>
                                        @foreach($parentCategory->childCategories as $childCategory)
                                        <li>
                                            <a href="/category/{{ $childCategory->id }}">{{ $childCategory->name }}</a>
                                        </li>
                                        @endforeach

                                        <li>
                                            <a href="">Novinky</a>
                                        </li>

                                        <li>
                                            <a href="">Akcie</a>
                                        </li>

                                        <li>
                                            <a href="">Najlepšie hodnotené</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <!--Navigation - < 992px-->
                    <!--Menu hamburger icon-->
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
                                <a href="templates/product-category.html">všetky produkty</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Tričká</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Košeľe</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Nohavice</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Obleky</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Novinky</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Akcie</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Najlepšie hodnotené</a>
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
                                <a href="templates/product-category.html">všetky produkty</a>
                            </li>
                            <li>
                                <a href="templates/product-category.html">Tričká</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Blúzky</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Šaty</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Nohavice</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Svetre</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Novinky</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Akcie</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Najlepšie hodnotené</a>
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
                                <a href="templates/product-category.html">všetky produkty</a>
                            </li>
                            <li>
                                <a href="templates/product-category.html">Tričká</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Kombinézy</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Svetre</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Mikiny</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Novinky</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Akcie</a>
                            </li>

                            <li>
                                <a href="templates/product-category.html">Najlepšie hodnotené</a>
                            </li>
                        </ul>
                    </nav>
                </nav>
            </div>
        </div>
    </div>
</div>
