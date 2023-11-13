@extends('layout.app')
@section('title','order-details')
@section('content')
<main>
    <div
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>تتبع طلبك</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="{{route('home')}}">الرئيسية</a> /
          <span class="text-gray">تتبع طلبك</span>
        </div>
      </div>
    </div>

    <section class="section-container my-5 py-5">
      <p>
        تم تقديم الطلب #79917 في يوليو 26, 2023 وهو الآن بحالة قيد التنفيذ.
      </p>

      <section>
        <h2>تفاصيل الطلب</h2>
        <table class="success__table w-100 mb-5">
          <thead>
            <tr class="border-0 bg-danger text-white">
              <th>المنتج</th>
              <th class="d-none d-md-table-cell">الإجمالي</th>
            </tr>
          </thead>
          <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ( $books as $book)

            <tr>
                <td>
                    <div>
                        <a href="{{ route('single_product',$book->id) }}">{{ $book->name }}</a> x {{ $book->quantity }}
                    </div>

                </td>
                <td>{{ $book->price }} جنيه</td>
                @php

                    # code...
                    $total = $total + $book->price;

                @endphp
            </tr>
            @endforeach
            {{--  --}}
              <th>المجموع:</th>
              <td class="fw-bolder">{{ $total }} جنيه</td>
            </tr>
            <tr>
              <th>الإجمالي:</th>
              <td class="fw-bold">{{ $total }} جنيه</td>
            </tr>
          </tbody>
        </table>
      </section>
      <section class="mb-5">
        <h2>عنوان الفاتورة</h2>
        <div class="border p-3 rounded-3">
          <p class="mb-1">{{ $invoice[0]->fname }} {{ $invoice[0]->lname }}</p>
          <p class="mb-1">{{ $invoice[0]->address }}</p>
          <p class="mb-1">{{ $invoice[0]->city }}</p>
          <p class="mb-1">{{ $invoice[0]->phone }}</p>
          <p class="mb-1">{{ $invoice[0]->email }}</p>
        </div>
      </section>
    </section>
  </main>
@endsection
