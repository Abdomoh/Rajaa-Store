@extends('layouts.nav',['title' => 'تفاصيل المنتج '])
<title> -التسوق </title>
@section('content')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="web-site/img/hero/s3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>التسوق</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('welcome')}}">الرئسية</a>
                        <a href="{{url('shoping')}}">التسوق</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>الاقسام</h4>
                        <ul dir="">
                            @foreach($categoryies as $category)
                            <li><a href="../categoryies/{{$category->id}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7" dir="ltr">

                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">

                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{$product_count}}</span> منتج</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach($product_list as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="uploads/{{$product->img1}}"></div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$product->name}}</a></h6>
                        <h5>$30.00</h5>
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

                {{ $product_list->render('pagination::bootstrap-4')}}

            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection