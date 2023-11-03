<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="./{{ asset('front') }}/assets/images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/vendors/all.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/vendors/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/vendors/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/vendors/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/main.min.css">
</head>

<body>
    <div>
        <div class="header-container fixed-top border-bottom">
            <header>
                <div class="section-container d-flex justify-content-between">
                    <div class="header__email d-flex gap-2 align-items-center">
                        <i class="fa-regular fa-envelope"></i>
                        coding.arabic@gmail.com
                    </div>
                    <div class="header__info d-none d-lg-block">
                        شحن مجاني للطلبات 💥 عند الشراء ب 699ج او اكثر
                    </div>
                    <div class="header__branches d-flex gap-2 align-items-center">
                        <a class="text-white text-decoration-none" href="{{ route('branches') }}">
                            <i class="fa-solid fa-location-dot"></i>
                            فروعنا
                        </a>
                    </div>
                </div>
            </header>
            <!--    -->
            <nav class="nav">
                <div class="section-container w-100 d-flex align-items-center gap-4 h-100">
                    <div
                        class="nav__categories-btn align-items-center justify-content-center rounded-1 d-none d-lg-flex">
                        <button class="border-0 bg-transparent" data-bs-toggle="offcanvas"
                            data-bs-target="#nav__categories">
                            <i class="fa-solid fa-align-center fa-rotate-180"></i>
                        </button>
                    </div>
                    <div class="nav__logo">
                        <a href="{{ route('home') }}">
                            <img class="h-100" src="{{ asset('front') }}/assets/images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="nav__search w-100">
                        <form action="{{ route('search') }}">

                            <input class="nav__search-input w-100" name="search" type="search" placeholder="أبحث هنا عن اي شئ تريده..." >
                            <span class="nav__search-icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </form>
                    </div>
                    <ul class="nav__links gap-3 list-unstyled d-none d-lg-flex m-0">
                        @if (!auth()->user())
                            <li class="nav__link">
                                <a class="d-flex align-items-center gap-2" href="{{ route('login') }}">
                                    تسجيل الدخول
                                    <i class="fa-regular fa-user"></i>
                                </a>
                            </li>
                        @endif

                        @auth
                            @if (Auth::user()->isAdmin())
                                <li class="nav__link">
                                    <a class="d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
                                        لوحة التحكم

                                    </a>
                                </li>
                            @endif
                        @endauth


                        @auth
                            <form action="{{ route('logout') }}" method="post" class="nav__link">
                                @csrf <!-- Add CSRF token for security -->
                                <button type="submit" class="d-flex align-items-center gap-2"
                                    style="border: none; background: none; cursor: pointer;">
                                    تسجيل الخروج
                                    <i class="fa-regular fa-user"></i>
                                </button>
                            </form>
                            <li class="nav__link">
                                <a class="d-flex align-items-center gap-2" href="{{ route('favourites') }}">
                                    المفضلة
                                    <div class="position-relative">
                                        <i class="fa-regular fa-heart"></i>
                                        <div class="nav__link-floating-icon">
                                            {{ $fav_count }}
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav__link">
                                <a class="d-flex align-items-center gap-2" data-bs-toggle="offcanvas"
                                    data-bs-target="#nav__cart">
                                    عربة التسوق
                                    <div class="position-relative">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <div class="nav__link-floating-icon">

                                            {{ $n_products }}

                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <div class="nav-mobile fixed-bottom d-block d-lg-none">
                    <ul class="nav-mobile__list d-flex justify-content-around gap-2 list-unstyled  m-0 border-top">
                        <li class="nav-mobile__link">
                            <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                                href="{{ route('home') }}">
                                <i class="fa-solid fa-house"></i>
                                الرئيسية
                            </a>
                        </li>
                        <li class="nav-mobile__link d-flex align-items-center flex-column gap-1"
                            data-bs-toggle="offcanvas" data-bs-target="#nav__categories">
                            <i class="fa-solid fa-align-center fa-rotate-180"></i>
                            الاقسام
                        </li>
                        <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
                            <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                                href="{{ route('profile') }}">
                                <i class="fa-regular fa-user"></i>
                                حسابي
                            </a>
                        </li>
                        <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
                            <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                                href="{{ route('favourites') }}">
                                <i class="fa-regular fa-heart"></i>
                                المفضلة
                            </a>
                        </li>
                        <li class="nav-mobile__link d-flex align-items-center flex-column gap-1"
                            data-bs-toggle="offcanvas" data-bs-target="#nav__cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            السلة
                        </li>
                    </ul>
                    <!--  -->
                </div>
            </nav>

            <div class="nav__categories offcanvas offcanvas-start px-4 py-2" tabindex="-1" id="nav__categories"
                aria-labelledby="nav__categories">
                <div class="nav__categories-header offcanvas-header justify-content-end">
                    <button type="button" class="border-0 bg-transparent text-danger nav__close"
                        data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-x fa-1x fw-light"></i>
                    </button>
                </div>
                <div class="nav__categories-body offcanvas-body pt-0">
                    <div class="nav__side-logo mb-2">
                        <img class="w-100" src="{{ asset('front') }}/assets/images/logo.png" alt="">
                    </div>
                    <ul class="nav__list list-unstyled">
                        {{-- for --}}
                        @php
                            $all ='all';
                        @endphp
                        <li class="nav__link nav__side-link"><a href="{{ route('shop',$all) }}" class="py-3">جميع
                            المنتجات</a></li>
                        @foreach ($categories as $category )

                            <li class="nav__link nav__side-link"><a href="{{ route('shop',$category->id) }}" class="py-3">{{$category->name}}</a></li>

                                    {{-- end --}}
                                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="nav__cart offcanvas offcanvas-end px-3 py-2" tabindex="-1" id="nav__cart"
                aria-labelledby="nav__cart">
                <div class="nav__categories-header offcanvas-header align-items-center">

                    @auth
                        <h5>سلة التسوق</h5>
                        <button type="button" class="border-0 bg-transparent text-danger nav__close"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fa-solid fa-x fa-1x fw-light"></i>
                        </button>
                    </div>
                    <div class="nav__categories-body offcanvas-body pt-4">
                        @if(!$check)
                        <p>لا توجد منتجات في سلة المشتريات.</p>
                        @endif
                        @if($check)
                        <div class="cart-products">
                            <ul class="nav__list list-unstyled">
                                @foreach ($books as $key=>$book)
                                <li class="cart-products__item d-flex justify-content-between gap-2">
                                    <div class="d-flex gap-2">
                                        <div>
                                            <form action="{{ route('delete.cart',['book_id'=>$book->id,'cart_id'=>$book->cart_id,'price'=>$book->price]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="cart-products__remove" type="submit">x</button>
                                            </form>
                                        </div>
                                        <div>
                                            <p class="cart-products__name m-0 fw-bolder">{{ $book->name }}</p>
                                            <p class="cart-products__price m-0"> x {{ $book->quantity }}</p>
                                            <p class="cart-products__price m-0"> جنية {{ $book->price }} </p>
                                        </div>
                                    </div>
                                    <div class="cart-products__img">
                                        <img class="w-100" src="{{ asset($book->image) }}"
                                        alt="">
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                            {{-- @if --}}
                            <div class="d-flex justify-content-between">
                                <p class="fw-bolder">المجموع:</p>
                                <p>{{ $total }} جنيه</p>
                            </div>
                        </div>
                        @endif
                        {{--  --}}
                        @if($check)
                        <a href="{{ route('checkout') }}">
                            <button
                                class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3 bg-success">اتمام
                                الطلب</button>
                        </a>
                        @php
                            $all='all';
                        @endphp
                        <a href="{{ route('shop',$all) }}">
                            <button class="nav__cart-btn text-center w-100 py-2 px-3 bg-transparent">تابع التسوق</button>
                        </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>


        <!-- News Content Start -->
        <section class="sales text-center p-2 d-block d-lg-none">
            شحن مجاني للطلبات 💥 عند الشراء ب 699ج او اكثر
        </section>
        <!-- News Content End -->
    </div>
