@extends('layout.app')
@section('title', 'branches')
@section('content')
    <main>
        <section class="page-top d-flex justify-content-center align-items-center flex-column text-center">
            <div class="page-top__overlay"></div>
            <div class="position-relative">
                <div class="page-top__title mb-3">
                    <h2>فروعنا</h2>
                </div>
                <div class="page-top__breadcrumb">
                    <a class="text-gray" href="{{ route('home') }}">الرئيسية</a> /
                    <span class="text-gray">فروعنا</span>
                </div>
            </div>
        </section>

        <section class="branches section-container my-5 py-5">
            <div class="row">
                @foreach ( $branches as $branch )
                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="branches__item h-100">
                        <h3>فرع: {{ $branch->name }}</h3>
                        <p>
                            {{$branch->full_address}}
                        </p>
                        <div class="branches__contact d-flex align-items-center gap-2 mb-3">
                            <div class="branches__icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-bolder">اتصل بنا</p>
                                <p class="mb-0">{{ $branch->phone }}</p>
                            </div>
                        </div>
                        <div class="branches__location d-flex align-items-center gap-2">
                            <div class="branches__icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-bolder">زورنا في الفرع</p>
                                <p class="mb-0">{{ $branch->short_address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                     {{--  --}}

            </div>
        </section>
    </main>

@endsection
