@extends('admin.layout-admin')
@section('title')
    Banner Trang Chủ Của Bạn
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
                                            <th>Hình Ảnh Banner Trang Chủ</th>
                                            <th>Edit</th>
                                            <th>Delete</th>                                                                          
                                        </tr>
                                        </thead>
                                        @foreach($banner as $dt)
                                        <tbody>
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>
                                                <img src='styleAdmin/images/{{$dt->image}}' style="width: 800px;height: 300px;">
                                            </td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/banner/edit/id={{$dt->id}}">Sửa</a></td>
                                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/banner/delete/id={{$dt->id}}" onclick="if (!confirm('Bạn Có Chắc Chắn Muốn Xóa Sản Phẩm Này')) return false;">Xóa</a></td>
                                        </tr>                                      
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->

                    </div> <!-- container -->

                </div>
@stop