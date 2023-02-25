@extends('layouts.nav')
<title>الصفحة - الرئسية </title>


@section('content')
@if($products->count() > 0)
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{url('welcome')}}" dir="rtl" method="GET">
                            <input type="text"  name="search" value="" required="يجب ملئ الحقل" placeholder=" ابحث باسم المنتج  ...  " />
                            <button type="submit" class="site-btn">بحث</button>
                        </form>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="web-site/img/hero/s3.jpg">
                    <div class="hero__text">
                        <span style="background: #fff;">رجو كولكشن</span>
                        <h2 style="color: #fff;">توصيل اسرع <br />وجهتك للتسوق من المنزل</h2>
                        <p style="color: #fff;">لأننا نعتني بجودة الحياة .. نضع بين يديك في رجاء مجموعة من الابتكارات التي تسهّل عليك الحياة اليومية بجودة أكبر ومال أقلّ!</p>
                        <a href="{{url('shopping')}}" class="primary-btn">اتسوق الان</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->

<section class="categories" dir="ltr">

    <div class="container">

        <div class="row">

            <div class="categories__slider owl-carousel">
                @foreach($categoryies as $category)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="../uploads/{{$category->image}}" dir="ltr">
                        <h5><a href="../categoryies/{{$category->id}}">{{$category->name}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>

</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>جميع منتجاتنا</h2>
                </div>

            </div>
        </div>
        <div class="row featured__filter">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="uploads/{{$product->img1}}"></div>
                    <div class="featured__item__text">
                        <h6><a href="../products/{{$product->id}}">{{$product->name}}</a></h6>
                        
                        <h5>{{number_format($product->price,2)}}</h5>
                        <div class="">
                        <a href="https://api.whatsapp.com/send?phone=249125993977&amp;text= اطلب هذا المنتج : {{$product->name}} "> <button type="button" class="btn block" style="
                      background: #9d8b66;
                      border: #9d8b66;
                      color: #fff;
                      width: 100%;
                    ">
                            شراء المنتج
                        </button></a>
                        </div>
                    </div>


                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="web-site/img/banner/Sales consulting-amico.svg" alt="" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="web-site/img/banner/Shopping bag-pana.svg" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
<section class="from-blog spad" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>من نحن</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="web-site/img/hero/s2.jpg" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__text">
                      
                        <h5><a href="#">لأننا نعتني بجودة الحياة .. نضع بين يديك في ريبال مجموعة من الابتكارات التي تسهّل عليك الحياة اليومية بجودة أكبر ومال أقلّ!</a></h5>
                        <p>
                        American shop موقع تسوق لكافة منتجات العنايه بالبشرة والشعر American shop موقع تسوق لكافة منتجات العنايه بالبشرة والشعر American shop موقع تسوق لكافة منتجات العنايه بالبشرة والشعر American shop موقع تسوق لكافة منتجات العنايه بالبشرة والشعر
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@else

<div class="row">
    <div class="col-lg-12">
        <div>
       <img src="web-site/img/search/Shopping bag-amico.svg" alt=""  style="  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 30%;">
            <h3 class="text-center" style="font-weight: bold;">لاتوجد بيانات متطابقة </h3><br><br>
        </div>
    </div>
</div>

@endif
@stop