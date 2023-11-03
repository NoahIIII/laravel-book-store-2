@extends('layout.app')
@section('title','favourites')
@section('content')
<main>
    {{-- @dd($books) --}}
    <div
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>المفضلة</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="{{route('home')}}">الرئيسية</a> /
          <span class="text-gray">المفضلة</span>
        </div>
      </div>
    </div>

    <div class="my-5 py-5">
      <section class="section-container favourites">
        @if($books)
        <table class="w-100">
          <thead>
            <th class="d-none d-md-table-cell"></th>
            <th class="d-none d-md-table-cell"></th>
            <th class="d-none d-md-table-cell">الاسم</th>
            <th class="d-none d-md-table-cell">السعر</th>
            <th class="d-none d-md-table-cell">تاريخ الاضافه</th>
            <th class="d-none d-md-table-cell">المخزون</th>
            <th class="d-table-cell d-md-none">product</th>
          </thead>
          <tbody class="text-center">
            @foreach ($books as $key =>$book)
            <tr>
                <td class="d-block d-md-table-cell">
                    <span class="favourites__remove m-auto">
                        <form action="{{ route('delete.favorite',$book[0]->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" style="border: none; padding: 0; background: none;">
                            <i class="fa-solid fa-xmark"></i>
                            </button>
                        </form>
                    </span>
                </td>
                <td class="d-block d-md-table-cell favourites__img">
                    @if(file_exists(public_path('storage/'.$book[0]->image)))
                    <img src="{{ asset('storage/'.$book[0]->image) }}" alt="" />
                    @else
                    <img src="{{ asset($book[0]->image) }}" alt="" />
                    @endif
                </td>
                <td class="d-block d-md-table-cell">
                    <a href="{{ route('single_product',$book[0]->id) }}"> {{ $book[0]->name}} </a>
                </td>
              <td class="d-block d-md-table-cell">
                  <span class="product__price product__price--old"
                  >{{ $book[0]->price }} جنية</span
                  >
                  <span class="product__price">{{ $book[0]->price_after_discount }} جنية</span>
                </td>
                <td class="d-block d-md-table-cell">{{ $book[0]->created_at }}</td>
                @if($book[0]->status)
                <td class="d-block d-md-table-cell">
                    <span class="me-2"><i class="fa-solid fa-check"></i></span>
                    <span class="d-inline-block d-md-none d-lg-inline-block"
                    >متوفر بالمخزون</span
                >
              </td>
              @else
              <td class="d-block d-md-table-cell">
                {{-- <span class="me-2"><i class="fa-solid fa-check"></i></span> --}}
                <span class="d-inline-block d-md-none d-lg-inline-block"
                >غير متوفر بالمخزون</span
            >
          </td>
              @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2 class="d-inline-block d-md-none d-lg-inline-block"> لا توجد كتب في المفضلة.</h2>
    @endif
      </section>
    </div>
  </main>
@endsection
