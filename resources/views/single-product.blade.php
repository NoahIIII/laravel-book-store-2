@extends('layout.app')
@section('title' . 'single-product')
@section('content')
    <main>
        <script>
            function changeQuantity(amount) {
                var quantityInput = document.getElementById('quantity');
                var currentQuantity = parseInt(quantityInput.value, 10);
                var newQuantity = currentQuantity + amount;

                // Ensure the new quantity is not less than 1
                newQuantity = Math.max(1, newQuantity);

                quantityInput.value = newQuantity;
            }
        </script>
        {{-- @dd() --}}
        <!-- Product details Start -->
        <section class="section-container my-5 pt-5 d-md-flex gap-5">
            <div class="single-product__img w-100" id="main-img">
                @if(file_exists(public_path('storage/'.$book->image)))
                <img src="{{ asset('storage/'.$book->image) }}" alt="image">
                @else
                <img src="{{ asset($book->image) }}" alt="image">
                @endif
            </div>
            <div class="single-product__details w-100 d-flex flex-column justify-content-between">
                <div>
                    <h4>{{ $book->name }}</h4>
                    <div class="product__author">{{ $book->author }}</div>
                    <div class="product__author">{{ $book->number_of_pages }} صفحة</div>
                    <div class="product__price mb-3 text-center d-flex gap-2">
                        <span class="product__price product__price--old fs-6 ">
                            {{ $book->price }}.00 جنيه
                        </span>
                        <span class="product__price fs-5">
                            {{ $book->price_after_discount }}.00 جنيه
                        </span>
                    </div>
                    <div class="d-flex w-100 gap-2 mb-3">

                        <form action="{{ route('add.cart',$book->id) }}" method="post">
                            @csrf
                            <div class="single-product__quanitity position-relative">
                                <input class="single-product__input text-center px-3" type="number" id="quantity" name="quantity" value="1" min="1">
                                <button type="button" onclick="changeQuantity(-1)"
                                    class="single-product__increase border-0 bg-transparent position-absolute end-0 h-100 px-3">-</button>
                                <button type="button" onclick="changeQuantity(1)"
                                    class="single-product__decrease border-0 bg-transparent position-absolute start-0 h-100 px-3">+</button>
                            </div>
                            <button type="sybmit" class="single-product__add-to-cart primary-button w-100">اضافه الي السلة</button>
                        </form>
                    </div>
                    <div class="single-product__favourite d-flex align-items-center gap-2 mb-4">
                        <form id="favoriteForm" action="{{ route('add.favorite', $book->id) }}" method="post">
                            @csrf
                            <button type="submit" style="border: none; padding: 0; background: none;">
                                <i class="fa-regular fa-heart"></i>
                                اضافة للمفضلة
                            </button>
                        </form>
                    </div>
                </div>
                <div class="single-product__categories">
                    <p class="mb-0">رمز المنتج: {{ $book->code }}</p>
                    <div>
                        @php
                            foreach($categories as $category){
                                if($category->id == $book->category_id){
                                    $cat_name=$category->name;
                                }
                            }
                        @endphp
                        <span>التصنيفات: </span> <a
                            href="{{ route('shop',$book->category_id) }}">{{ $cat_name }}</a>
                    </div>

                </div>
            </div>
        </section>
        <!-- Product details End -->

        <!-- Description and questions Start -->
        <section class="section-container">
            <nav class="mb-0 ">
                <div class="nav nav-tabs single-product__nav pb-0 gap-2" id="nav-tab" role="tablist">
                    <button class="single-product__tab nav-link active" id="single-product__describtion-tab"
                        data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab"
                        aria-controls="nav-home" aria-selected="true">
                        الوصف
                    </button>
                    <button class="single-product__tab nav-link" id="single-product__questions-tab" data-bs-toggle="tab"
                        data-bs-target="#single-product__questions" type="button" role="tab"
                        aria-controls="nav-profile" aria-selected="false">
                        الاسئلة الشائعة
                    </button>
                </div>
            </nav>
            <div class="tab-content pt-4" id="nav-tabContent">
                <div class="tab-pane show active" id="nav-description" role="tabpanel"
                    aria-labelledby="single-product__describtion-tab" tabindex="0">
                    {{ $book->description }}
                </div>
                <div class="questions tab-pane" id="single-product__questions" role="tabpanel"
                    aria-labelledby="single-product__questions-tab" tabindex="0">
                    <div class="questions__list accordion" id="question__list">
                        <div class="questions__item accordion-item">
                            <h2 class="questions__header accordion-header" id="question1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    الشحن بيوصل خلال قد ايه؟
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="question1"
                                data-bs-parent="#question__list">
                                <div class="accordion-body">
                                    خلال 3 ايام داخل القاهرة والجيزة و7 ايام خارج القاهرة والجيزة.
                                </div>
                            </div>
                        </div>
                        <div class="questions__item accordion-item">
                            <h2 class="questions__header accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    خامات التصنيع؟
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#question__list">
                                <div class="accordion-body">
                                    خامات مصرية عالية الجودة.
                                </div>
                            </div>
                        </div>
                        <div class="questions__item accordion-item">
                            <h2 class="questions__header accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    متاح استبدال او استرجاع المنتج
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#question__list">
                                <div class="accordion-body">
                                    نعم، متاح الاستبدال والاسترجاع خلال 7 ايام، برجاء مراجعة <a class="text-danger"
                                        href="{{ route('refund-policy') }}">سياسة الاسترجاع والاستبدال</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Description and questions End -->

        <!-- Features Start -->
        <section class="section-container py-5">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="features__item d-flex align-items-center gap-2">
                        <div class="features__img">
                            <img class="w-100" src="{{ asset('front') }}/assets/images/feature-1.png" alt="image">
                        </div>
                        <div>
                            <h6 class="features__item-title m-0">شحن سريع</h6>
                            <p class="features__item-text m-0">سعر شحن موحد لجميع المحافظات ويصلك في أقل من 72 ساعة</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="features__item d-flex align-items-center gap-2">
                        <div class="features__img">
                            <img class="w-100" src="{{ asset('front') }}/assets/images/feature-2.png" alt="image">
                        </div>
                        <div>
                            <h6 class="features__item-title m-0">ضمان الجودة</h6>
                            <p class="features__item-text m-0">خامات عالية الجودة ومرونه فى طلبات الاستبدال والاسترجاع</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="features__item d-flex align-items-center gap-2">
                        <div class="features__img">
                            <img class="w-100" src="{{ asset('front') }}/assets/images/feature-3.png" alt="image">
                        </div>
                        <div>
                            <h6 class="features__item-title m-0">دعم فني</h6>
                            <p class="features__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="features__item d-flex align-items-center gap-2">
                        <div class="features__img">
                            <img class="w-100" src="{{ asset('front') }}/assets/images/feature-4.png" alt="image">
                        </div>
                        <div>
                            <h6 class="features__item-title m-0">استبدال سهل</h6>
                            <p class="features__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features End -->

        <!-- May love Start -->
        <section class="section-container">
            <div class="d-flex gap-4 align-items-center w-100 mb-4">
                <h5 class="m-0">قد يعجبك ايضا...</h5>
                <hr class="flex-grow-1">
            </div>
            <div class="row">
                <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
                    <div class="product__header mb-3">
                        <a href="{{ route('single_product', $may_book[0]['id']) }}">
                            <div class="product__img-cont">
                                @if(file_exists(public_path('storage/'.$may_book[0]['image'])))
                                <img class="product__img w-100 h-100 object-fit-cover"
                                    src="{{ asset('storage/'.$may_book[0]['image']) }}" data-id="white" alt="image">
                                    @else
                                    <img class="product__img w-100 h-100 object-fit-cover"
                                    src="{{ asset($may_book[0]['image']) }}" data-id="white" alt="
                                    image">
                                    @endif

                            </div>
                        </a>
                        <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                            وفر {{ $may_book[0]['discount'] }}%
                        </div>
                        <div
                            class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                    <div class="product__title text-center">
                        <a class="text-black text-decoration-none" href="{{ route('single_product', $may_book[0]['id']) }}">
                            {{ $may_book[0]['name'] }}
                        </a>
                    </div>
                    <div class="product__author text-center">
                        {{ $may_book[0]['auther' ]}}
                    </div>
                    <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                        <span class="product__price product__price--old">
                            {{ $may_book[0]['price'] }}.00 جنيه
                        </span>
                        <span class="product__price">
                            {{ $may_book[0]['price_after_discount'] }}.00 جنيه
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <!-- May love End -->

        <!-- Related products Start -->
        <section class="section-container">
            <div class="d-flex gap-4 align-items-center w-100 mb-4">
                <h5 class="m-0">منتجات ذات صلة</h5>
                <hr class="flex-grow-1">
            </div>
            <div class="row">
                @foreach ($rel_books as $book )
                    <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
                        <div class="product__header mb-3">
                            <a href="{{ route('single_product',$book->id) }}">
                                <div class="product__img-cont">
                                    @if(file_exists(public_path('storage/'.$book->image)))
                                    <img class="product__img w-100 h-100 object-fit-cover" src="{{ asset('storage/'.$book->image) }}"
                                        data-id="white" alt="image">
                                        @else
                                    <img class="product__img w-100 h-100 object-fit-cover" src="{{ asset($book->image) }}"
                                        data-id="white" alt="image">
                                        @endif
                                </div>
                            </a>
                            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                                وفر {{ $book->discount }}%
                            </div>
                            <div
                                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="product__title text-center">
                            <a class="text-black text-decoration-none" href="{{ route('single_product',$book->id) }}">
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
        <!-- Related products End -->

        <!-- Users comments Start -->
        <section class="section-container comments mb-5">
            <div class="d-flex gap-4 align-items-center w-100 mb-4">
                <h5 class="m-0">أعرف اراء عملاؤنا</h5>
                <hr class="flex-grow-1">
            </div>
            <div class="comments__slider owl-carousel owl-theme">
                <div class="comments__item">
                    <div class="comments__icon">
                        <img class="w-100" src="{{ asset('front') }}/assets/images/quote.png" alt="image">
                    </div>
                    <div class="comments__text mb-3">
                        الكتاب جميل جدا
                    </div>
                    <div class="comments__author d-flex align-items-center gap-2">
                        <div class="comments__author-dash"></div>
                        <div class="comments__author-name fw-bolder">
                            Moamen Sherif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Users comments End -->
    </main>
@endsection
