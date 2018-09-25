 @extends('admin.layout-admin')
@section('title')
    Thay Đổi Banner Của Bạn
@stop
@section('content')
<div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Banner Bạn Cần Thay Đổi</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Nhập Lại Banner Cần Chỉnh Sửa</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form action="admin/banner/edit/id={{$banner->id}}" method="post" class="form-horizontal" role="form">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                     @if(count($errors)>0)
                                                            <div class="alert alert-danger">
                                                                @foreach($errors->all() as $err)
                                                                    {{$err}}
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Hình Ảnh Sản Phẩm</label>
                                                        <td>
                                                		<img src='styleAdmin/images/{{$banner->image}}' style="width: 800px;height: 300px;">
                                            			</td>
                                            		</div>
                                            		<div class="form-group row">
                                            			<label class="col-2 col-form-label">Hình Ảnh Thay Đổi</label>
                                                        <div class="col-10">
                                                            <input type="file" class="form-control" name="file_banner">
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