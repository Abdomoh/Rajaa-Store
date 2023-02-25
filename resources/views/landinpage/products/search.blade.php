@extends('layouts.nav')
<title>الصفحة - الرئسية </title>


@section('content')



<!-- Categories Section Begin -->
<section class="categories" dir="ltr" style="background:#F3F6FA;">

    <div class="container">
    @if($productsearch->count() > 0)
        <div class="row">
            <div class="categories__slider owl-carousel">
          
                @foreach($productsearch as $category)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="../uploads/{{$category->image}}" dir="ltr">
                        <h5><a href="../categoryies/{{$category->id}}">{{$category->name}}</a></h5>
                    </div>
                </div>
             
                @endforeach
    
               

            </div>
        </div>
        @else
    <center>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__checkout">
                    <h5>لاتوجد منتجات</h5>
                </div>
            </div>
        </div>
    </center>
    @endif
    </div>

</section>
<!-- Categories Section End -->




@endsection