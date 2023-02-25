@extends('layouts.nav',['title' => 'تفاصيل المقال '])
<title> - {{$post->title}} </title>
@section('content')
<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">

        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->


    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="../web-site/img/intro-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text" >
                        <h2 style="color:#f7b160;">{{$post->title}}</h2>
                        <ul>
                            <li>{{$post->user->name}}</li>
                            <li>{{$post->created_at}}</li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                       
                        <div class="blog__sidebar__item">
                            <h4>اخر الاخبار</h4>
                            <div class="blog__sidebar__recent">
                             
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="../web-site/img/intro-bg.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Tips You To Balance<br /> Nutrition Meal Day</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                </a>
                              
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="../uploads/{{$post->url}}" alt="">
                        <p>{{$post->post}}.</p>
                     
                        
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="../uploads/{{$post->user->url}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>{{$post->user->name}}</h6>
                                        <span>jhh</span>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->






@endsection