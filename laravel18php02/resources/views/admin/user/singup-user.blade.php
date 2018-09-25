@extends('admin.layout-admin')
@section('title')
    Dữ Liệu Của Tôi
@stop
@section('content')
<div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Dữ Liệu Của Tôi</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Nhập Thông Tin Thành Viên</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form action="{{route('signin')}}" method="post" class="form-horizontal" role="form">
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
                                                        <label class="col-2 col-form-label">Tên Đăng Nhập *</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="User Name" name="username" value="{{old('username')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Email *</label>
                                                        <div class="col-10">
                                                            <input type="email" id="example-email" name="email" class="form-control" placeholder="example@gmail.com" value="{{old('email')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Mật Khẩu *</label>
                                                        <div class="col-10">
                                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Nhập Lại Mật Khẩu *</label>
                                                        <div class="col-10">
                                                            <input type="password" class="form-control" placeholder="Re_Password" name="re_password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Cấp Độ</label>
                                                        <div class="col-10">
                                                            <select class="selectpicker" data-style="btn-custom btn-block" name="role">
                                                                <option value="1">Admin</option>
                                                                <option value="2">Member</option>                                      
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Họ Và Tên</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{old('name')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Số Điện Thoại</label>
                                                        <div class="col-10">
                                                            <input type="number" class="form-control" placeholder="Number Phone" name="phone" value="{{old('phone')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Địa Chỉ</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address')}}">
                                                        </div>
                                                    </div>                                                 
                                                    <button type="submit" class="btn btn-default" name="add_user">Thêm Thành Viên</button>
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