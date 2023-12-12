@extends('layout.app')
@section('title', 'Reset Password')
@section('content')
    <main>
        <div class="page-top d-flex justify-content-center align-items-center flex-column text-center">
            <div class="page-top__overlay"></div>
            <div class="position-relative">
                <div class="page-top__title mb-3">
                    <h2>إعادة تعيين كلمة المرور</h2>
                </div>
                <div class="page-top__breadcrumb">
                    <a class="text-gray" href="{{ route('home') }}">الرئيسية</a> /
                    <span class="text-gray">إعادة تعيين كلمة المرور</span>
                </div>
            </div>
        </div>
        <div class="page-full pb-5">
            <div class="account account--reset-password mt-5 pt-5">
                <div class="account__reset-password w-100">
                    <form class="mb-5" method="post" action="{{ route('password.update') }}">
                        @csrf
                        {{-- @method('put') --}}
                        <input type="hidden" name="token" value="{{ request()->token }}">

                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                        <div class="input-group rounded-1 mb-3">
                            <input type="text" name="email" class="form-control p-3" placeholder="البريد الالكتروني"
                                aria-label="Email" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                        </div>
                        <div class="input-group rounded-1 mb-3">
                            <input type="password" name="password" class="form-control p-3" placeholder="كلمة المرور الجديدة"
                                aria-label="Password" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-key"></i>
                            </span>
                        </div>

                        <div class="input-group rounded-1 mb-3">
                            <input type="password" name="password_confirmation" class="form-control p-3" placeholder="تأكيد كلمة المرور"
                                aria-label="Confirm Password" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-key"></i>
                            </span>
                        </div>

                        <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1" type="submit">
                            إعادة تعيين كلمة المرور
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
