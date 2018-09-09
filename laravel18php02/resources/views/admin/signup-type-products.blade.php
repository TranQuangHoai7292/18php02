@extends('admin.layout-admin')
@section('title')
    Mục Sản Phẩm Của Bạn
@stop
@section('content')
<div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Mục Sản Phẩm Của Bản</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Nhập Thông Tin Mục Sản Phẩm</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form action="{{route('signup-type-products')}}" method="post" class="form-horizontal" role="form">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                     @if(count($errors)>0)
                                                            <div class="alert alert-danger">
                                                                @foreach($errors->all() as $err)
                                                                    {{$err}}
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        @if(Session::has('success'))
                                                            <div class="alert alert-success">{{Session::get('success')}}</div>
                                                        @endif
                                                    <div class="form-group row">            
                                                        <label class="col-2 col-form-label">Danh Mục Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="items" placeholder="Thời Trang Nam, Thời Trang Nữ, Phụ Kiện Thời Trang,.....">
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Loại Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <input type="text" name="typeproducts" class="form-control" placeholder="Trang Phục Nữ, Trang Phục Nam, Phụ Kiện, Đồ Nội Y,....">
                                                        </div>
                                                    </div>                                                    
                                                    <button type="submit" class="btn btn-default" name="add_user">Thêm Mục Sản Phẩm Mới</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
</div> <!-- content -->
<footer class="footer text-right">
    2017 - 2018 © Abstack. - Coderthemes.com
</footer>
@stop