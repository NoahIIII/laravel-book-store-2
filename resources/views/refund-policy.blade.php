@extends('layout.app')
@section('title','refund-pilicy')
@section('content')
<main>
    <section
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>سياسة الاستبدال والاسترجاع</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="{{route('home')}}">الرئيسية</a> /
          <span class="text-gray">سياسة الاستبدال والاسترجاع</span>
        </div>
      </div>
    </section>

    <section class="section-container my-5">
      <p class="mb-4">الاستبدال والاسترجاع خلال 30 يوم من تاريخ استلام الطلب على ان يكون المنتج بحالته الاصليه والعبوه الاصليه
        ولاكمال عمليه الاسترجاع او الاستبدال لابد من وجود الفاتوره </p>

      <p class="m-0">عند ارجاع المنتج يتم ارجاع جميع متعلقاته سواء هدايا او خصومات منحت بمناسبه شراء هذا المنتج </p>
      <p>يسمح للعميل بفتح الشحه وتجربتها امام المندوب وفى حاله عدم اعجاب العميل بالطلب يتم رفض الاستلام ودفع الشحن فقط</p>

      <p class="my-4">عند استلام العميل للطلب  فى حاله رغبته فى ارجاع المنتج او استبداله لا يتكلف الا مصاريف الشحن فقط.</p>

      <h6>حالات لا يتكفل فيها العميل مصاريف الشحن:</h6>
      <p class="m-0">- فى حاله وجود عيوب صناعه واضحه فى المنتج</p>
      <p class="m-0">- فى حاله  استبدال المنتج او استرجاعه عند  وجود عيب صناعه واضح ظهر  بعد الاستخدام قبل مرور شهر من تاريخ الاستلام.</p>
    </section>
  </main>

@endsection
