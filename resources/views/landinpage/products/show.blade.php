@extends('layouts.nav',['title' => 'تفاصيل المنتج '])
<title> - {{$product->name}} </title>
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../uploads/{{$product->img1}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$product->name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('welcome')}}">الرئسية</a>
                        <a href="{{url('products')}}">المنتجات</a>
                        <span>{{$product->name}}</span>
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
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$product->name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">${{$product->price}}</div>
                    <p>{{$product->description}}</p>

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
                    <ul>
                        <li><b>الاتاحية</b>
                            @if($product->quantity == 0) <span>غير متاح</span></li>
                        @else
                        <span> متاح</span></li>
                        @endif
                        <li><b>التسوق</b> <span>كل الاسبوع <samp>كل يوم</samp></span></li>

                        <li><b>مشاركة عبر </b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
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
                        <h6><a href="../products/{{$product->id}}">{{$pro->name}}</a></h6>
                        <h5>${{$pro->price}}</h5>
                        <a href="#" class="primary-btn">اطلب المنتج</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection