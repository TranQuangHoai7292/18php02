@extends('admin.layout-admin')
@section('title')
    Thêm Banner Của Bạn
@stop
@section('content')
<div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Banner Của Bạn</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Nhập Banner Của Bạn</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form action="{{route('signup-banner')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                                                        <label class="col-2 col-form-label">Hình Ảnh Banner Trang Chủ</label>
                                                        <div class="col-10">
                                                            <input type="file" class="form-control" name="file_slide">
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