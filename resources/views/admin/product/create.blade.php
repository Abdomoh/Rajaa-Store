@extends('layouts.master2')
@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/prism/prism.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
<br>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المنتجات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ااضافة
                منتج</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')


@include('errors._message')
@include('errors.deletedone')
<div class="row">

    <div class="col-xl-12">
        <div class="card mg-b-20">
        
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h5 class="card-title">بيانات المنتج </h5>
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" autocomplete="">
                            {{ csrf_field() }}
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label class="control-label">الاسم </label>
                                    <input type="text" name="name" value="" class="form-control" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label"> الصنف </label>
                                    <select class="form-control" name="category_id">
                                    <option value="" selected disabled>كل الاقسام</option>
                                        @foreach ($categoryies as $category)
                                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ?'selected':'' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">الكمية </label>
                                    <input type="number" name="quantity" value="" class="form-control" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">السعر </label>
                                    <input type="number" name="price" value="" class="form-control" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">الوصف </label>
                                    <input type="text" name="description" value="" class="form-control" />

                                </div>


                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">صورة</label>
                                    <input type="file" name="img1" value="" class="form-control" />
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1"> صورة الفرعية</label>
                                    <input type="file" name="img2" value="" class="form-control" />
                                </div>

                            </div>
                            <div class="modal-footer" style="float: right;">
                                <button type="submit" class="btn btn-success btn-lg float-right">حفظ</button>
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                    </div>
                </div>
            </div>





            @endsection
            @section('js')
            <!-- Internal Select2 js-->
            <script src="{{ URL::asset('admin/plugins/notify/js/notifIt.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/notify/js/notifit-custom.js') }}"></script>

            <script src="{{ URL::asset('admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/jquery.dataTables.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/jszip.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/pdfmake.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/vfs_fonts.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/buttons.html5.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/buttons.print.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ URL::asset('admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
            <!--Internal  Datatable js -->
            <script src="{{ URL::asset('admin/js/table-data.js') }}"></script>
            @endsection