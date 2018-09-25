@extends('admin.layout-admin')
@section('title')
    Danh Sách Danh Mục Và Loại Sản Phẩm
@stop
@section('content')
	<div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Loại Sản Phẩm</h4>
                            <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">                            
                 <div class="col-12">
                                <div class="card-box table-responsive ">
                                    @if(Session::has('fail-type'))
                                        <div class="alert alert-danger">{{Session::get('fail-type')}}</div>
                                    @endif
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr> 
                                            <th>STT</th>
                                            <th>Loại Sản Phẩm</th>
                                            <th>Edit</th>
                                            <th>Delete</th>           
                                       	</tr>
                                        </thead>
                                        @foreach ($typeproduct as $type)
                                        <tbody>
                                        <tr>
                                            <td>{{$stttype++}}</td>
                                            <td>{{$type->type_products}}</td>                                               
											<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/manager-type-products/type/edit/id={{$type->id}}">Sửa</a></td>
                                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/manager-type-products/type/delete/id={{$type->id}}" onclick="if (!confirm('Bạn Có Chắc Chắn Muốn Xóa Loại Sản Phẩm Này')) return false;">Xóa</a></td>
                                        </tr>                                      
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <div class="row">{{$typeproduct->links()}}</div>
                                </div>
                 </div>
            </div> <!-- end row -->                 
        </div>
    </div>
@stop