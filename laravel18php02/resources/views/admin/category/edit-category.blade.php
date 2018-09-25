@extends('admin.layout-admin')
@section('title')
    Thay Đổi Danh Mục Sản Phẩm
@stop
@section('content')
<div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Danh Mục Bạn Cần Thay Đổi</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Nhập Lại Thông Tin Danh Mục Cần Chỉnh Sửa</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form action="admin/manager-type-products/category/edit/id={{$data->id}}" method="post" class="form-horizontal" role="form">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                     @if(count($errors)>0)
                                                            <div class="alert alert-danger">
                                                                @foreach($errors->all() as $err)
                                                                    {{$err}}
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    <div class="form-group row">            
                                                        <label class="col-2 col-form-label">Danh Mục Sản Phẩm</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="category" value="{{$data->category}}">
                                                        </div>
                                                    </div>                                                   
                                                    <button type="submit" class="btn btn-default" name="add_user">Sửa Thông Tin</button>
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