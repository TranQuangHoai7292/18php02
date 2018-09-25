@extends('admin.layout-admin')
@section('title')
    Thay Đổi Thông Tin
@stop
@section('content')
<div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Thông Tin Của </h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Nhập Lại Thông Tin Cần Chỉnh Sửa</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form action="admin/manager-user/edit/{{$user->id}}" method="post" class="form-horizontal" role="form">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                     @if(count($errors)>0)
                                                            <div class="alert alert-danger">
                                                                @foreach($errors->all() as $err)
                                                                    {{$err}}
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    <div class="form-group row">            
                                                        <label class="col-2 col-form-label">Tên Đăng Nhập *</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="User Name" name="username" value="{{$user->username}}" disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Email *</label>
                                                        <div class="col-10">
                                                            <input type="email" id="example-email" name="email" class="form-control" placeholder="example@gmail.com" value="{{$user->email}}">
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
                                                        <label class="col-2 col-form-label">Level</label>
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
                                                            <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{$user->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Số Điện Thoại</label>
                                                        <div class="col-10">
                                                            <input type="number" class="form-control" placeholder="Number Phone" name="phone" value="{{$user->phone}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Địa Chỉ</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="Address" name="address" value="{{$user->address}}">
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