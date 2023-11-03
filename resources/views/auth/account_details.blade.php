@extends('layout.app')
@section('title','account-details')
@section('content')
<main>

    <section
    class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
    <div class="page-top__overlay"></div>
    <div class="position-relative">
        <div class="page-top__title mb-3">
            <h2>حسابي</h2>
        </div>
        <div class="page-top__breadcrumb">
            <a class="text-gray" href="{{route('home')}}">الرئيسية</a> /
            <span class="text-gray">حسابي</span>
        </div>
    </div>
</section>

<section
      class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5"
      >
      <div class="profile__right">
          <div class="profile__user mb-3 d-flex gap-3 align-items-center">
              <div class="profile__user-img rounded-circle overflow-hidden">
                  <img class="w-100" src="{{ asset('front')}}/assets/images/user.png" alt="" />
                </div>
                <div class="profile__user-name">{{ auth()->user()->username }}</div>
                {{-- @dd(auth()) --}}
            </div>
            <ul class="profile__tabs list-unstyled ps-3">
                <li class="profile__tab">
                    <a
                    class="py-2 px-3 text-black text-decoration-none"
                    href="{{ route('profile') }}"
                    >لوحة التحكم</a
                    >
                </li>
                <li class="profile__tab">
                    <a
                    class="py-2 px-3 text-black text-decoration-none"
                    href="{{ route('orders') }}"
                    >الطلبات</a
                    >
                </li>

                <li class="profile__tab active">
                    <a
                    class="py-2 px-3 text-black text-decoration-none"
                    href="{{ route('account_details') }}"
                    >تفاصيل الحساب</a
            >
          </li>
          <li class="profile__tab">
            <a
            class="py-2 px-3 text-black text-decoration-none"
            href="{{ route('favourites') }}"
            >المفضلة</a
            >
        </li>
          <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="{{ route('logout') }}"
              >تسجيل الخروج</a
              >
            </li>
        </ul>
    </div>
      <div class="profile__left mt-4 mt-md-0 w-100">
          <div class="profile__tab-content active">

                <form class="profile__form border p-3" action="{{ route('edit_user') }}" method="POST">
                    @csrf
            @method('put')
            <div class="d-flex gap-3 mb-3">
                <div class="w-100">
                <label class="fw-bold mb-2" for="first-name">
                  الاسم الاول <span class="required">*</span>
                </label>
                <input type="text" class="form__input" name="fname" value="{{ auth()->user()->fname }}" id="first-name" />

            </div>
            <div class="w-100">
                <label class="fw-bold mb-2" for="last-name">
                    الاسم الأخير <span class="required">*</span>
                </label>
                <input type="text" class="form__input" name="lname" value="{{ auth()->user()->lname }}" id="last-name" />

            </div>
            </div>
            <div class="w-100">
                <label class="fw-bold mb-2" for="displayed-name">
                    أسم العرض<span class="required">*</span>
                </label>
                <input type="text" class="form__input" name="username" value="{{ auth()->user()->username }}" id="displayed-name" />

            </div>
            <div class="w-100 mb-3">
                <label class="fw-bold mb-2" for="email">
                    البريد الالكتروني<span class="required">*</span>
                </label>
                <input type="email" class="form__input" name="email" value="{{ auth()->user()->email }}" id="email" />

            </div>
            <button class="primary-button" type="submit">تعديل</button>
        </form>

        <form action="{{ route('password.update') }}" method="POST">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif
              @if($errors->updatePassword->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->updatePassword->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
                @csrf
                @method('put')

                <fieldset>
                    <legend class="fw-bolder">تغيير كلمة المرور</legend>

                    <div class="w-100 mb-3">
                  <label class="fw-bold mb-2" for="curr-password">
                      كلمة المرور الحالية (اترك الحقل فارغاً إذا كنت لا تودّ تغييرها)
                  </label>
                  <input type="password" class="form__input" id="curr-password" name="current_password" />
                </div>
                <div class="w-100 mb-3">
                    <label class="fw-bold mb-2" for="new-password">
                        كلمة المرور الجديدة (اترك الحقل فارغاً إذا كنت لا تودّ تغييرها)
                    </label>
                    <input type="password" class="form__input" id="new-password" name="password" />
                </div>

              <div class="w-100 mb-3">
                  <label class="fw-bold mb-2" for="password-confirmation">
                      تأكيد كلمة المرور الجديدة
                    </label>
                    <input type="password" class="form__input" id="password-confirmation" name="password_confirmation" />
                    @error('updatePassword.password_confirmation')
                    <div class="alert alert-danger">{{ $message[0] }}</div>
                    @enderror
                </div>

                <button class="primary-button" type="submit">تغيير كلمة المرور</button>

            </fieldset>
      </form>

    </div>
      </div>
    </section>
</main>

{{-- @dd(session('errors','password','current_password')); --}}
@endsection
