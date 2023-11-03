@extends('layout.app')
@section('title','about')
@section('content')


<main>
      <section
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
        >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>من نحن</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="{{route('home')}}">الرئيسية</a> /
            <span class="text-gray">من نحن</span>
          </div>
        </div>
      </section>

      <section class="section-container d-flex align-items-center py-4">
        <div class="about__img text-center w-50">
          <img class="w-100" src="{{ asset('front')}}/assets/images/logo.png" alt="" />
        </div>
        <div class="w-50">
            <h4 class="fw-bolder mb-4">من هي شركة Coding arabic</h4>
            <p class="m-0">
                شركتنا هي أكبر شركة متخصصة لبيع الاحذية أونلاين و توصيلها حتي
            المنزل… ونوفر للعميل تجربة المنتج قبل الاستلام وبدايتنا كانت بصفحة
            علي الفيسبوك عليها أكثر من مليون مشترك..
          </p>
          <p>وهدفنا هو الوصول لكل بيت في مصر و توفير الخدمات له.</p>
        </div>
      </section>

      <section class="text-white bg-black">
          <div class="section-container py-5">
              <h4 class="fw-bolder mb-4">ما هي رؤية شركة Coding arabic</h4>
          <p class="m-0">
            رؤيتنا هي أن نكون الشركة الرائدة في مجال بيع الأحذية في مصر، وأن
            نوفر لعملائنا أفضل الأحذية ذات الجودة العالية والأسعار المعقولة.
        </p>
        <p class="m-0">
            لدينا تشكيلة واسعة من الأحذية، بما في ذلك الأحذية الرياضية، والأحذية
            الرسمية، والأحذية الكاجوال، والأحذية الطبية، وأكثر من ذلك. نحرص على
            أن تكون جميع أحذيتنا مصنوعة من مواد عالية الجودة، وأن تكون مريحة
            وأنيقة في نفس الوقت.
        </p>
    </div>
      </section>

      <section class="section-container d-flex align-items-center py-5">
        <div class="w-50">
          <h4 class="fw-bolder mb-4">هدف شركة Coding arabic</h4>
          <p class="m-0">
            نحن نؤمن بأن الأحذية هي جزء مهم من شخصية الفرد، لذلك هدفنا هو أن
            نوفر لعملائنا أفضل تجربة تسوق ممكنة، وأن نجعل من عملية شراء الأحذية
            تجربة ممتعة وسهلة.
        </p>
        <p>
            ونسعى جاهدين لتحقيق رؤيتنا وهدفنا من خلال تقديم مجموعة واسعة من
            الأحذية ذات الجودة العالية والأسعار المعقولة، وتوفير خدمة عملاء
            ممتازة.
        </p>
        </div>
        <div class="about__img text-end w-50">
          <img class="w-100" src="{{ asset('front')}}/assets/images/about-2.png" alt="" />
        </div>
      </section>

      <section class="section-container py-5">
          <h4 class="text-center fw-bolder mb-4">
          مميزات الشراء من Coding arabic
        </h4>
        <div class="row">
          <div class="col-md-6 col-lg-3">
              <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="{{ asset('front')}}/assets/images/feature-1.png" alt="" />
            </div>
              <div>
                <h6 class="features__item-title m-0">شحن سريع</h6>
                <p class="features__item-text m-0">
                  سعر شحن موحد لجميع المحافظات ويصلك في أقل من 72 ساعة
                </p>
            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="{{ asset('front')}}/assets/images/feature-2.png" alt="" />
            </div>
              <div>
                  <h6 class="features__item-title m-0">ضمان الجودة</h6>
                  <p class="features__item-text m-0">
                      خامات عالية الجودة ومرونه فى طلبات الاستبدال والاسترجاع
                    </p>
                </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="features__item d-flex align-items-center gap-2">
                <div class="features__img">
                    <img class="w-100" src="{{ asset('front')}}/assets/images/feature-3.png" alt="" />
                </div>
                <div>
                    <h6 class="features__item-title m-0">دعم فني</h6>
                    <p class="features__item-text m-0">
                        دعم فني على مدار اليوم للإجابة على اي استفسار لديك
                    </p>
                </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="features__item d-flex align-items-center gap-2">
                <div class="features__img">
                    <img class="w-100" src="{{ asset('front')}}/assets/images/feature-4.png" alt="" />
                </div>
                <div>
                    <h6 class="features__item-title m-0">استبدال سهل</h6>
                    <p class="features__item-text m-0">
                        يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.
                    </p>
                </div>
            </div>
        </div>
        </div>
    </section>
    </main>


    @endsection
