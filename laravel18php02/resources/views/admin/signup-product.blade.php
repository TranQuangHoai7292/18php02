@extends('admin.layout-admin')
@section('title')
    Sản Phẩm Của Bạn
@stop
@section('content')
<div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Sản Phẩm Của Bản</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Nhập Thông Tin Sản Phẩm</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form action="{{route('signup-product')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                                                        <label class="col-2 col-form-label">Tên Sản Phẩm *</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Danh Mục Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <select class="selectpicker" data-style="btn-custom btn-block" name="product_type">
                                                                <option value="1">Thời Trang Nữ</option>
                                                                <option value="2">Thời Trang Nam</option>
                                                                <option value="3">Big Size</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Loại Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <select class="selectpicker" data-style="btn-custom btn-block" name="product_type">
                                                                <option value="1">Áo</option>
                                                                <option value="2">Quần</option>
                                                                <option value="3">Váy</option>
                                                                <option value="4">Phụ Kiện Thời Trang</option>
                                                                <option value="5">Giày</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Màu Sắc</label>
                                                        <div class="col-10">
                                                            <input type="text" id="example-email" name="color" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Size</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="size">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Đơn Giá</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="unit_price">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Giá Khuyến Mãi</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="promotion_price" placeholder="Nhập 0 nếu không có giá khuyến mãi">
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Hình Ảnh</label>
                                                        <div class="col-10">
                                                            <input type="file" class="form-control" name="file">
                                                        </div>
                                                    </div> 
                                                    <button type="submit" class="btn btn-default" name="add_user">Thêm Sản Phẩm</button>
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