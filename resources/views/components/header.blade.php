@php
    $cartItems = Cart::getContent();
@endphp
<!-- Begin Hiraola's Header Main Area Three -->
<header class="header-main_area header-main_area-3">
    <div class="header-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ht-left_area">
                        <div class="welcome_text" style="padding-bottom: 0px;">
                            {{-- <p>Free shipping on all domestic orders with coupon code
                                <span>"Earrings0920"</span>
                            </p> --}}
                            <marquee behavior="scroll" direction="left">
                                <b><i>{{ SettingsHelper::info()->advertising }}</i></b>
                            </marquee>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                <li><a href="{{ route('website.my-account.index') }}">My Account<i class="fa fa-chevron-down"></i></a>
                                    <ul class="ht-dropdown ht-my_account">
                                        @if (Auth::check())
                                        <li><a href="{{ route('website.my-account.index') }}">My Account</a></li>
                                        <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                        @else
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                        <li class="active"><a href="{{ route('login') }}">Login</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="header-middle_area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-middle_wrap">
                        <div class="header-logo">
                            <a href="{{ route('website.home') }}">
                                {{-- <img src="{{URL::asset('website/assets/images/menu/logo/4.png')}}" alt="Header Logo"> --}}
                                <img src="{{ URL::asset(SettingsHelper::info()->header_logo) }}" width="100px"
                                    alt="Header Logo">
                            </a>
                        </div>
                        <div class="header-contact_area">
                            <div class="contact-box">
                                <span>PhoneNo</span>
                                <p>{{ SettingsHelper::info()->phone1 }}</p>
                            </div>
                            <div class="contact-box">
                                <span>Location</span>
                                <p>{{ SettingsHelper::info()->address1 }}</p>
                            </div>
                        </div>
                        <div class="header-right_area">
                            <ul>
                                <li>
                                    <a href="{{ route('website.wishlist') }}" class="wishlist-btn">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#searchBar" class="search-btn toolbar-btn">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </li> --}}
                                <li>
                                    <a href="#mobileMenu"
                                        class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                        <i class="ion-navicon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                        <i class="ion-bag"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom_area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 d-lg-none d-block">
                    <div class="header-logo">
                        <a href="{{ route('website.home') }}">
                            {{-- <img src="{{ URL::asset('website/assets/images/menu/logo/2.png') }}"
                                alt="Hiraola's Header Logo"> --}}
                            <img src="{{ URL::asset(SettingsHelper::info()->header_logo) }}" width="100px"
                                alt="Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12 d-none d-lg-flex justify-content-center position-static">
                    <div class="main-menu_area">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="{{ route('website.home') }}">Home</a></li>
                                <li><a href="{{ route('website.shop') }}">Shop</a></li>
                                <li><a href="{{ route('website.track-order') }}">Track Order</a></li>
                                <li><a href="{{ route('website.about') }}">About Us</a></li>
                                <li><a href="{{ route('website.contact') }}">Contact</a></li>
                                <li><a href="javascript:void(0)">Account</a>
                                    <ul class="hm-dropdown">
                                        @if (Auth::check())
                                            @if (Auth::user()->role == 'admin')
                                                <li class="active"><a href="{{ route('admin.dashboard') }}">Switch To
                                                        Portal</a></li>
                                            @else
                                                <li class="active"><a href="{{ route('website.my-account.index') }}">My
                                                        Account
                                                    </a>
                                                </li>
                                            @endif
                                            <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                        @else
                                            <li class="active"><a href="{{ route('register') }}">Register</a></li>
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom_area header-bottom_area-2 header-sticky stick white--color">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="header-logo">
                        <a href="{{ route('website.home') }}">
                            <img src="{{ URL::asset(SettingsHelper::info()->header_logo) }}" width="70px"
                                alt="Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block position-static">
                    <div class="main-menu_area">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="{{ route('website.home') }}">Home</a></li>
                                <li><a href="{{ route('website.shop') }}">Shop</a></li>
                                <li><a href="{{ route('website.track-order') }}">Track Order</a></li>
                                <li><a href="{{ route('website.about') }}">About Us</a></li>
                                <li><a href="{{ route('website.contact') }}">Contact</a></li>
                                <li><a href="javascript:void(0)">Account</a>
                                    <ul class="hm-dropdown">
                                        @if (Auth::check())
                                            @if (Auth::user()->role == 'admin')
                                                <li class="active"><a href="{{ route('admin.dashboard') }}">Switch To
                                                        Portal</a></li>
                                            @else
                                                <li class="active"><a href="{{ route('website.my-account.index') }}">My
                                                        Account
                                                    </a>
                                                </li>
                                            @endif
                                            <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                        @else
                                            <li class="active"><a href="{{ route('register') }}">Register</a></li>
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-8">
                    <div class="header-right_area">
                        <ul>
                            <li>
                                <a href="{{ route('website.wishlist') }}" class="wishlist-btn">
                                    <i class="ion-android-favorite-outline"></i>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="#searchBar" class="search-btn toolbar-btn">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </li> --}}
                            <li>
                                <a href="#mobileMenu"
                                    class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <i class="ion-bag"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Shopping Cart</h4>
                </div>
                <ul class="minicart-list">
                    @php $i=0; @endphp
                    @foreach ($cartItems as $value)
                        @if ($i < 3)
                            <li class="minicart-product">
                                <a class="product-item_remove"
                                    href="{{ route('website.remove-cart', $value->attributes['slug']) }}"><i
                                        class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="{{ URL::asset($value->attributes['image']) }}"
                                        alt="Hiraola's Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title"
                                        href="{{ route('website.product.details', $value->attributes['slug']) }}">{{ $value->name }}</a>
                                    <span class="product-item_quantity">{{ $value->quantity }} x
                                        {{ SettingsHelper::info()->currency . number_format($value->price) }}</span>
                                </div>
                            </li>
                        @endif
                        @php $i++; @endphp
                    @endforeach
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Subtotal</span>
                <span class="ammount">{{ SettingsHelper::info()->currency . Cart::getSubTotal() }}</span>
            </div>
            <div class="minicart-btn_area">
                <a href="{{ route('website.cart') }}"
                    class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Minicart</a>
            </div>
            <div class="minicart-btn_area">
                <a href="{{ route('website.checkout') }}"
                    class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Checkout</a>
            </div>
        </div>
    </div>
    <div class="offcanvas-search_wrapper" id="searchBar">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <!-- Begin Offcanvas Search Area -->
                <div class="offcanvas-search">
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Search for item...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- Offcanvas Search Area End Here -->
            </div>
        </div>
    </div>
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                {{-- <div class="offcanvas-inner_search">
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Search for item...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div> --}}
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="{{ route('website.home') }}"><span
                                    class="mm-text">Home</span></a>
                        </li>
                        <li class="menu-item-has-children"><a href="{{ route('website.shop') }}">Shop</a></li>
                        <li class="menu-item-has-children"><a href="{{ route('website.track-order') }}">Track Order</a></li>
                        <li class="menu-item-has-children"><a href="{{ route('website.about') }}">About Us</a></li>
                        <li class="menu-item-has-children"><a href="{{ route('website.contact') }}">Contact</a></li>
                        <li class="menu-item-has-children"><a href="javascript:void(0)">Account</a>
                            <ul class="hm-dropdown">
                                @if (Auth::check())
                                    @if (Auth::user()->role == 'admin')
                                        <li class="active"><a href="{{ route('admin.dashboard') }}">Switch To
                                                Portal</a></li>
                                    @else
                                        <li class="active"><a href="{{ route('website.my-account.index') }}">My
                                                Account
                                            </a>
                                        </li>
                                    @endif
                                    <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                @else
                                    <li class="active"><a href="{{ route('register') }}">Register</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </nav>
                {{-- <nav class="offcanvas-navigation user-setting_area">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active">
                            <a href="#">
                                <span class="mm-text">User
                                    Setting
                                </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="my-account.html">
                                        <span class="mm-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="login-register.html">
                                        <span class="mm-text">Login | Register</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><span
                                    class="mm-text">Currency</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">EUR €</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">USD $</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><span
                                    class="mm-text">Language</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Romanian</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Japanese</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>
</header>
<!-- Hiraola's Header Main Area Three End Here -->
