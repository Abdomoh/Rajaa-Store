@extends('layouts.master2')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('admin/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('admin/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h5 class="main-content-title tx-12 mg-b-1 mg-b-lg-1">مرحبا بك</h5>
            <p class="mg-b-0 tx-14">في موقعنا الالكتروني </p>
        </div>
    </div>
    <div class="main-dashboard-header-right">
        <div>
            <label class="tx-13">تقيم المستخدمين</label>
            <div class="main-star">
                <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i>
                <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i>
                <i class="typcn typcn-star"></i> <span>(0)</span>
            </div>
        </div>
        <div>
            <label class="tx-13">الزوار</label>
            <h5>0</h5>
        </div>
        <div>
            <label class="tx-13">المستخدمين</label>

            <h5>@Auth{{Auth::user()->count()}}@endAuth </h5>


        </div>
    </div>
</div>
<!-- /breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h4 class="mb-3 tx-15 text-white">عدد المنتجات</h4>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$products}}</h4>

                        </div>

                    </div>
                </div>
            </div>
            <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-danger-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h4 class="mb-3 tx-16 text-white"> الاصناف </h4>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$categoryies}}</h4>

                        </div>

                    </div>
                </div>
            </div>
            <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-warning-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-16 text-white"> الطلبات</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$orders}}</h4>

                        </div>

                    </div>
                </div>
            </div>
            <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-success-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">عدد الطلبات  المكتملة</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$approved_order}}</h4>

                        </div>

                    </div>
                </div>
            </div>
            <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-warning-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">عدد الطلبات غير المكتملة</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$wetting_order}}</h4>

                        </div>

                    </div>
                </div>
            </div>
           
        </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-success-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">عدد الطلبات  كاش</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$cash_order}}</h4>

                        </div>

                    </div>
                </div>
            </div>
           
        </div>
    </div>

    
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">اجمالي اليوم   </h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$total_order_daily}}ج</h4>

                        </div>

                    </div>
                </div>
            </div>
           
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-danger-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">اجمالي الشهر   </h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$total_order_monthly}}ج</h4>

                        </div>

                    </div>
                </div>
            </div>
           
        </div>
    </div>

</div>
<!-- row closed -->

<!-- row opened -->
<!-- <div class="row row-sm">
                    <div class="col-md-12 col-lg-12 col-xl-7">
                        <div class="card">
                            <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mb-0">المستشفيات</h4>/
                                    <h4 class="card-title mb-0">عيادات </h4>/
                                    <h4 class="card-title mb-0"> حجوزات  </h4>
                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                </div>
                                <p class="tx-12 text-muted mb-0">احصائيات </p>
                            </div>
                            <div class="card-body">
                                <div class="total-revenue">
                                    <div>
                                      <h4>1</h4>
                                      <label><span class="bg-primary"></span>مستشفيات عظام</label>
                                    </div>
                                    <div>
                                      <h4>6</h4>
                                      <label><span class="bg-danger"></span>مراكز قلب</label>
                                    </div>
                                    <div>
                                      <h4>5</h4>
                                      <label><span class="bg-warning"></span>عيادت</label>
                                    </div>


                                       <div>
                                      <h4>5</h4>
                                      <label><span class="bg-success"></span>الحجوزات المؤكدة </label>
                                    </div>
                                      <div>
                                      <h4>4</h4>
                                      <label><span class="bg-warning"></span>الحجوزات الغير مؤكدة </label>
                                    </div>
                                      <div>
                                      <h4>7</h4>
                                      <label><span class="bg-danger"></span>  الحجوزات اليومية </label>
                                    </div>



                                  </div>
                                <div id="bar" class="sales-bar mt-4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-5">
                        <div class="card card-dashboard-map-one">
                            <label class="main-content-label">المدن والمناطق علي الخريطة</label>
                            <span class="d-block mg-b-20 text-muted tx-12">!!!!</span>
                            <div class="">

                            </div>
                        </div>
                    </div>
            </div>  -->
<!-- row closed -->

<!-- row opened -->

</div>
<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('admin/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('admin/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('admin/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('admin/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('admin/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('admin/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('admin/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('admin/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('admin/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('admin/js/index.js')}}"></script>
<script src="{{URL::asset('admin/js/jquery.vmap.sampledata.js')}}"></script>
@endsection