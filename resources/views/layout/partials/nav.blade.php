<!--Main menu-->
<div class="container center-col mt-2">
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
                                        <a href="/categories/{{ $childCategory->id }}">{{ $childCategory->name }}</a>
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
                        @foreach($parentCategories as $parentCategory)
                        <tr>
                            <td class="left-td">
                                <button class="btn btn-link left-menu-btn" onclick="showLeftSubmenu('{{ $parentCategory->id }}-left')">
                                    {{ $parentCategory->name }}
                                </button>
                            </td>
                            <td class="arrow-td">
                                <i class="fa fa-long-arrow-right" onclick="showLeftSubmenu('{{ $parentCategory->id }}-left')"></i>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </nav>

                @foreach($parentCategories as $parentCategory)
                <!--Left menu - second level-->
                <nav id="{{ $parentCategory->id }}-left" class="left-menu left-submenu pop-up d-none d-lg-none">
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
                            <td class="left-td arrow-td" onclick="closeLeftSubmenu('{{ $parentCategory->id }}-left')">
                                <i class="fa fa-long-arrow-left"></i>
                            </td>
                            <td onclick="closeLeftSubmenu('{{ $parentCategory->id }}-left')">
                                {{ $parentCategory->name }}
                            </td>
                        </tr>
                    </table>
                    <ul>
                        @foreach($parentCategory->childCategories as $childCategory)
                        <li>
                            <a href="/categories/{{ $childCategory->id }}">{{ $childCategory->name }}</a>
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
                @endforeach
            </nav>
        </div>
    </div>
</div>