@extends('layout.app')
@section('title', 'home')
@section('content')
    <main class="pt-4">
        <!-- Hero Section Start -->
        {{-- @dd(auth()->user()); --}}
        <section class="section-container hero">
            <div class="owl-carousel hero__carousel owl-theme">

                <div class="hero__item">
                    @foreach ( $banners as $banner )
                    @if(file_exists(public_path('storage/'.$banner->image)))
                    <img class="hero__img" src="{{ asset('storage/'.$banner->image)}}" alt="" style="width: 100%; height: auto; max-width: 100vw; max-height: 50vh;">
                    @else
                    <img class="hero__img" src="{{ asset($banner->image)}}" alt="" style="width: 100%; height: auto; max-width: 100vw; max-height: 50vh;">
                    @endif
                </div>
                @endforeach
            </div>
        </section>

        <section class="section-container mb-5 mt-3">
            <div class="offer d-flex align-items-center justify-content-between rounded-3 p-3 text-white">
                <div class="offer__title fw-bolder">
                    عروض اليوم
                </div>
                <div class="offer__time d-flex gap-2 fs-6">
                    <div class="d-flex flex-column align-items-center">
                        <span class="fw-bolder">06</span>
                        <div>ساعات</div>
                    </div>:
                    <div class="d-flex flex-column align-items-center">
                        <span class="fw-bolder">10</span>
                        <div>دقائق</div>
                    </div>:
                    <div class="d-flex flex-column align-items-center">
                        <span class="fw-bolder">13</span>
                        <div>ثواني</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Offer Section End -->

        <!-- Products Section Start -->
        <section class="section-container mb-4">
            <div class="owl-carousel products__slider owl-theme">
                @foreach ($books as $book)
                    <div class="products__item">
                        <div class="product__header mb-3">
                            <a href="{{ route('single_product', $book->id) }}">
                                <div class="product__img-cont">
                                    @if(file_exists(public_path('storage/'.$book->image)))
                                    <img class="product__img w-100 h-100 object-fit-cover" src="{{ asset('storage/'.$book->image) }} "
                                        data-id="white">
                                        @else
                                    <img class="product__img w-100 h-100 object-fit-cover" src="{{ asset($book->image) }}"
                                        data-id="white">
                                        @endif
                                </div>
                            </a>
                            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                                وفر {{ $book->discount }}%
                            </div>
                            <div
                                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                                <form id="favoriteForm" action="{{ route('add.favorite', $book->id) }}" method="post">
                                    @csrf
                                    <button type="submit" style="border: none; padding: 0; background: none;">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="product__title text-center">
                            <a class="text-black text-decoration-none" href="{{ route('single_product', $book->id) }}">
                                {{ $book->name }}
                            </a>
                        </div>
                        <div class="product__author text-center">
                            {{ $book->author }}
                        </div>
                        <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                            <span class="product__price product__price--old">
                                {{ $book->price }} جنيه
                            </span>
                            <span class="product__price">
                                {{ $book->price_after_discount }} جنيه
                            </span>
                        </div>
                    </div>
                @endforeach
                {{-- end --}}
        </section>
        <!-- Products Section End -->

        <!-- Categories Section Start -->
        <section class="section-container mb-5">
            <div class="categories row gx-4">
                @foreach ($banners as $banner )

                <div class="col-md-6 p-2">
                    <div class="p-4 border rounded-3">
                        @if(file_exists(public_path('storage/'.$banner->image)))
                        <img src="{{ asset('storage/'.$banner->image)}}  " alt="Photo" width="100" height="100" style="width: 100%; height: auto; max-width: 100vw; max-height: 50vh;">
                        @else
                        <img src="{{ asset($banner->image)}}" alt="Photo" width="100" height="100" style="width: 100%; height: auto; max-width: 100vw; max-height: 50vh;">
                        @endif
                    </div>
                </div>
                @endforeach
                {{--  --}}
            </div>
        </section>
        <!-- Categories Section End -->
        <!-- Best Sales Section Start -->
        <section class="section-container mb-5">
            <div class="products__header mb-4 d-flex align-items-center justify-content-between">
                <h4 class="m-0">الاكثر مبيعا</h4>
                <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
            </div>
            <div class="owl-carousel products__slider owl-theme">
                @foreach ($topbooks as $book)
                    <div class="products__item">
                        <div class="product__header mb-3">
                            <a href="{{ route('single_product', $book->id) }}">
                                <div class="product__img-cont">
                                    @if(file_exists(public_path('storage/'.$book->image)))
                                    <img class="product__img w-100 h-100 object-fit-cover" src="{{ asset('storage/'.$book->image) }}"
                                        data-id="white">
                                        @else
                                    <img class="product__img w-100 h-100 object-fit-cover" src="{{ asset($book->image) }}"
                                        data-id="white">
                                        @endif
                                </div>
                            </a>
                            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                                وفر {{ $book->discount }}%
                            </div>
                            <div
                                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                                <form id="favoriteForm" action="{{ route('add.favorite', $book->id) }}" method="post">
                                    @csrf
                                    <button type="submit" style="border: none; padding: 0; background: none;">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="product__title text-center">
                            <a class="text-black text-decoration-none" href="{{ route('single_product', $book->id) }}">
                                {{ $book->name }}
                            </a>
                        </div>
                        <div class="product__author text-center">
                            {{ $book->author }}
                        </div>
                        <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                            <span class="product__price product__price--old">
                                {{ $book->price }} جنيه
                            </span>
                            <span class="product__price">
                                {{ $book->price_after_discount }} جنيه
                            </span>
                        </div>
                    </div>
                @endforeach
        </section>
        <!-- Best Sales Section End -->

        <!-- Newest Section Start -->
        <section class="section-container mb-5">
            <div class="products__header mb-4 d-flex align-items-center justify-content-between">
                <h4 class="m-0">وصل حديثا</h4>
                <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
            </div>
            <div class="owl-carousel products__slider owl-theme">
                @foreach ($newbooks as $book)
                    <div class="products__item">
                        <div class="product__header mb-3">
                            <a href="{{ route('single_product', $book->id) }}">
                                <div class="product__img-cont">
                                    @if(file_exists(public_path('storage/'.$book->image)))
                                    <img class="product__img w-100 h-100 object-fit-cover" src="{{ asset('storage/'.$book->image) }}"
                                        data-id="white">
                                        @else
                                    <img class="product__img w-100 h-100 object-fit-cover" src="{{ asset($book->image) }}"
                                        data-id="white">
                                        @endif
                                </div>
                            </a>
                            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                                وفر {{ $book->discount }}%
                            </div>
                            <div
                                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                                <form id="favoriteForm" action="{{ route('add.favorite', $book->id) }}" method="post">
                                    @csrf
                                    <button type="submit" style="border: none; padding: 0; background: none;">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="product__title text-center">
                            <a class="text-black text-decoration-none" href="{{ route('single_product', $book->id) }}">
                                {{ $book->name }}
                            </a>
                        </div>
                        <div class="product__author text-center">
                            {{ $book->author }}
                        </div>
                        <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                            <span class="product__price product__price--old">
                                {{ $book->price }} جنيه
                            </span>
                            <span class="product__price">
                                {{ $book->price_after_discount }} جنيه
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Newest Section End -->
    </main>
@endsection
