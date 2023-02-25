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
            <h4 class="content-title mb-0 my-auto">الاصناف </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ااضافة
                صنف</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')

@include('errors._message')
@include('errors.deletedone')
<!-- row -->
<div class="row">

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>&nbsp;اضافة صنف </button><br><br>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='5'>
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">الاسم</th>

                                <th class="border-bottom-0">الوصورة</th>

                                <th class="border-bottom-0"></th>
                                <th class="border-bottom-0"></th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categoryies as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>

                                <td data-toggle="modal" data-target="#img_show{{$category->id}}"><img src="../uploads/{{$category->image}}" width="40px" class="rounded-circle">
                                </td>

                                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$category->id}}" title="">
                                        <i class="fa fa-edit"></i></button></td>

                                <td>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$category->id}}" title="">
                                        <i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!--  edit model -->
                            <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                تعديل البيانات
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <form action="{{route('categories.update',$category->id)}}" class="p-5 bg-white" method="POST" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}

                                                <div class="form-group">
                                                    <label class="control-label">الاسم </label>
                                                    <input type="text" name="name" value="{{$category->name}}" class="form-control" />
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{$category->id}}">

                                                </div>




                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">صورة</label>
                                                    <input type="file" name="image" value="{{$category->image}}" class="form-control" />
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{$category->id}}">
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success btn-sm">حفظ</button>
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">اغلاق</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- end edit model -->

                            <!--  img- show -->
                            <div class="modal fade" id="img_show{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-body">


                                            <center><img src="../uploads/{{$category->image}}" width="400px" class="rounded-circle"></center>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- img show -->



                            <!-- Deleted -->
                            <div class="modal fade" id="delete{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                حذف بيانات الصنف
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                هل تريد حذف بيانات الصنف ؟!
                                                <input id="id" type="hidden" name="id" class="form-control" value="{{$category->id}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-danger">حذف
                                                        البيانات</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- add -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة صنف جديد </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data" autocomplete="">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label">الاسم </label>
                                <input type="text" name="name" value="" class="form-control" value="{{old('name')}}" />

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">صورة</label>
                                <input type="file" name="image" value="" class="form-control" />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm">حفظ</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
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