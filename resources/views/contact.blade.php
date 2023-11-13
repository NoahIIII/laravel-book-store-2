@extends('layout.app')
@section('title', 'contact')
@section('content')
    <main>
        <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
            <div class="page-top__overlay"></div>
            <div class="position-relative">
                <div class="page-top__title mb-3">
                    <h2>تواصل معنا</h2>
                </div>
                <div class="page-top__breadcrumb">
                    <a class="text-gray" href="{{ route('home') }}">الرئيسية</a> /
                    <span class="text-gray">تواصل معنا</span>
                </div>
            </div>
        </section>

        <section class="section-container py-5">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">اتصل بنا</h6>
                            <p class="contact__item-text m-0">01063888667</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">راسلنا علي الايميل</h6>
                            <p class="contact__item-text m-0">eraasoft@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">العنوان</h6>
                            <p class="contact__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">دعم متواصل</h6>
                            <p class="contact__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-container contact d-md-flex align-items-center mb-3">
            <div class="contact__side w-50">
                <h4 class="mb-3">يسعدنا تواصلك معنا في أى وقت</h4>
                <p>إذا كنت تواجه أي مشكلة أو ترغب في إسترجاع أو إستبدال المنتج لا تتردد أبدأ بالتواصل معنا في أي وقت. كل
                    ماعليك هو ملئ النموذج التالي ببيانات صحيحة وسنقوم بمراجعة طلبك في أسرع وقت.
                    @if(session('suc'))
                    <div class="alert alert-success">
                        {{ session('suc') }}
                        @endif
                </p>
                </div>
                             <form class="contact__form" action="{{ route('contact-send') }}" method="post">
                    @csrf
                    <div class="d-flex gap-3 mb-3">
                        <div class="w-50">
                            <label for="name">الاسم<span class="required">*</span></label>
                            @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                            <input class="contact__input" id="name" name="name" @auth value="{{ auth()->user()->fname }}" @endauth type="text">
                        </div>
                        <div class="w-50">
                            <label for="phone">رقم الهاتف<span class="required">*</span></label>
                            @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                            <input class="contact__input" id="phone" name="phone" type="text" >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">البريد الالكتروني<span class="required">*</span></label>
                        @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                        <input class="contact__input" id="email" name="email" type="text" @auth value="{{ auth()->user()->email }}" @endauth>
                    </div>
                    <div class="mb-3">
                        <label for="reason">سبب التواصل<span class="required">*</span></label>
                        @error('subject')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <select class="contact__input" id="reason" name="subject">
                            <option value="">- اضغط هنا لاختيرا السبب -</option>
                            <option value="استفسار">استفسار</option>
                            <option value="استبدال">استبدال</option>
                            <option value="استرجاع">استرجاع</option>
                            <option value="استعجال اوردر">استعجال اوردر</option>
                            <option value="اخرى">اخري</option>
                        </select>
                    </div>
                    <div>
                        <label for="reason">نص الرسالة<span class="required">*</span></label>
                        @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                        <textarea class="contact__input" name="message" id=""></textarea>
                    </div>
                    <button class="primary-button w-100 rounded-2" type="submit">ارسال الطلب</button>
                </form>
            </div>
            <div class="contact__side w-50 text-center">
                <img class="w-100" src="{{ asset('front') }}/assets/images/contact-1.png" alt="image">
            </div>
        </section>

        <div class="section-container my-5 px-4">
            <div class="contact__map"></div>
        </div>
    </main>
@endsection
