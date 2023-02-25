@extends('layouts.nav',['title' => 'تفاصيل المنتج '])
<title> - {{$cats->name}} </title>
@section('content')




<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../web-site/img/hero/s3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$cats->name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">الرئسية</a>
                        <a href="">المنتجات</a>
                        <span>{{$cats->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">

            @if($cats->products ->count() > 0)
            @foreach($cats->products as $product)
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="../uploads/{{$product->img1}}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel" dir="ltr">
                        <img data-imgbigurl="../uploads/{{$product->img1}}" src="../uploads/{{$product->img2}}" alt="">
                        <img data-imgbigurl="../uploads/{{$product->img1}}" src="../uploads/{{$product->img2}}" alt="">
                        <img data-imgbigurl="../uploads/{{$product->img1}}" src="../uploads/{{$product->img2}}" alt="">
                        <img data-imgbigurl="../uploads/{{$product->img1}}" src="../uploads/{{$product->img2}}" alt="">
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h4>{{$product->name}}</h4>

                    <div class="product__details__price">${{$product->price}}</div>
                    <p>{{$product->description}}</p>

                    <a href="https://api.whatsapp.com/send?phone=249125993977&amp;text= اطلب هذا المنتج : {{$product->name}} "> <button type="button" class="btn block" style="
                      background: #9d8b66;
                      border: #9d8b66;
                      color: #fff;
                      width: 100%;
                    ">
                            شراء المنتج
                        </button></a>
                </div>
                <hr>
            </div>

            @endforeach
            @else
            <center>
                <h3> لاتوجد منتجات بهذا الصنف</h3>
            </center>

            @endif

        </div>


    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<hr>
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>منتجات مشابهة</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($product_list as $pro)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="../uploads/{{$pro->img1}}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="../products/{{$pro->id}}">{{$pro->name}}</a></h6>
                        <h5>${{$pro->price}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection