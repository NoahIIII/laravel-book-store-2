@extends('layout.app')
@section('title','privacy-policy')
@section('content')
<main>
    <section
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>سياسة الخصوصية</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="{{route('home')}}">الرئيسية</a> /
          <span class="text-gray">سياسة الخصوصية</span>
        </div>
      </div>
    </section>

    <section class="section-container page-full py-5"></section>
  </main>
@endsection
