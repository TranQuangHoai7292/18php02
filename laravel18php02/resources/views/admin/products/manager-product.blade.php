@extends('admin.layout-admin')
@section('title')
    Danh Sách Sản Phẩm
@stop
@section('content')
	<div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Sản Phẩm Của Tôi</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    @if(Session::has('edit'))
                                        <div class="alert alert-success">{{Session::get('edit')}}</div>
                                    @endif
                                    @if(Session::has('delete'))
                                        <div class="alert alert-success">{{Session::get('delete')}}</div>
                                    @endif
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr> 
                                            <th>STT</th>
                                            <th>Hình Ảnh Sản Phẩm</th>
                                            <th>Mục Sản Phẩm</th>               
                                            <th>Tên Sản Phẩm</th>
                                            <th>Loại Sản Phẩm</th>
                                            <th>Màu Sắc</th>
                                            <th>Size</th>
                                            <th>Đơn Giá</th>
                                            <th>Giá Khuyến Mãi</th>
                                            <th>Trạng Thái</th>
                                            <th>Edit</th>
                                            <th>Delete</th>                                                                          
                                        </tr>
                                        </thead>
                                        @foreach($data as $dt)
                                            @foreach ($dt->type_products as $type)
                                        <tbody>
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>
                                                <img src='styleAdmin/images/{{$type->pivot->image}}' style="width: 100px;height: 100px;">
                                            </td>                  
                                            <td>{{$dt->category}}</td>
                                            <td>{{$type->pivot->name}}</td>
                                            <td>{{$type->type_products}}</td>
                                            <td>{{$type->pivot->color}}</td>
                                            <td>{{$type->pivot->size}}</td>
                                            <td>{{$type->pivot->unit_price}}</td>
                                            <td>{{$type->pivot->promotion_price}}</td>
                                            <td>{{$type->pivot->status}}</td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/manager-product/edit/id={{$type->pivot->id}}">Sửa</a></td>
                                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/manager-product/delete/id={{$type->pivot->id}}" onclick="if (!confirm('Bạn Có Chắc Chắn Muốn Xóa Sản Phẩm Này')) return false;">Xóa</a></td>
                                        </tr>                                      
                                        </tbody>
                                            @endforeach
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->

                    </div> <!-- container -->

                </div>
@stop