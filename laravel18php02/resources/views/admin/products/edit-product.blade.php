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
                                                <form action="admin/manager-product/edit/id={{$data->id}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                     @if(count($errors)>0)
                                                            <div class="alert alert-danger">
                                                                @foreach($errors->all() as $err)
                                                                    {{$err}}
                                                                @endforeach
                                                            </div>
                                                        @endif                                                       
                                                    <div class="form-group row">            
                                                        <label class="col-2 col-form-label">Tên Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="name" value="{{$data->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Danh Mục Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <select class="selectpicker" data-style="btn-custom btn-block" name="id_category">
                                                                @foreach ($category as $cate)
                                                                <option value="{{$cate->id}}">{{$cate->category}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Loại Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <select class="selectpicker" data-style="btn-custom btn-block" name="product_type">
                                                                @foreach ($type as $tp)
                                                                <option value="{{$tp->id}}">{{$tp->type_products}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Màu Sắc</label>
                                                        <div class="col-10">
                                                            <input type="text" id="example-email" name="color" class="form-control" value="{{$data->color}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Size</label>
                                                        <div class="col-10">
                                                            <select class="selectpicker" data-style="btn-custom btn-block" name="size">
                                                                <option value="XXS">XXS</option>
                                                                <option value="XS">XS</option>
                                                                <option value="S">S</option>
                                                                <option value="M">M</option>
                                                                <option value="L">L</option>
                                                                <option value="XL">XL</option>
                                                                <option value="XXL">XXL</option>
                                                            </select>
                                                        </div>
                                                    </div>                                
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Đơn Giá</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="unit_price" value="{{$data->unit_price}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Giá Khuyến Mãi</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="promotion_price" value="{{$data->promotion_price}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Tình Trạng</label>
                                                        <div class="col-10">
                                                            <select class="selectpicker" data-style="btn-custom btn-block" name="status">
                                                                <option value="1">Đang Bán</option>
                                                                <option value="2">Ngưng Bán</option>       
                                                            </select>
                                                        </div>
                                                    </div>                                
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Hình Ảnh Sản Phẩm</label>
                                                        <td>
                                                		<img src='styleAdmin/images/{{$data->image}}' style="width: 100px;height: 100px;">
                                            			</td>
                                            		</div>
                                            		<div class="form-group row">
                                            			<label class="col-2 col-form-label">Hình Ảnh Thay Đổi</label>
                                                        <div class="col-10">
                                                            <input type="file" class="form-control" name="file">
                                                    	</div>
                                                    </div>
                                                    <div class="form-group row">            
                                                        <label class="col-2 col-form-label">Giới Thiệu Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <textarea name="textarea" id="taid" cols="60" rows="10" wrap="soft" value="{{$data->area}}"></textarea>
                                                        </div>
                                                    </div> 
                                                    <button type="submit" class="btn btn-default" name="add_user">Sửa Sản Phẩm</button>
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