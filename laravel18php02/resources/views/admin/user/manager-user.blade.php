@extends('admin.layout-admin')
@section('title')
    Thêm Thành Viên
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
                                <div class="card-box table-responsive">
                                    <h4 class="text-muted font-14 m-b-30">Số Thành Viên: {{$count}} Thành Viên</h4>
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                    @endif
                                    @if(Session::has('delete'))
                                        <div class="alert alert-success">{{Session::get('delete')}}</div>
                                    @endif
                                    <table  class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr align="center"> 
                                            <th>STT</th>
                                            <th>ID</th>               
                                            <th>UserName</th>
                                            <th>Level</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>FullName</th>
                                            <th>Address</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        @foreach($data as $dt)
                                        <tbody>
                                        <tr class="old gradex" align="center">
                                            <td>{{$stt++}}</td>
                                            <td>{{$dt->id}}</td>                  
                                            <td>{{$dt->username}}</td>
                                            <td>@if($dt->role == 1)
                                                {{"Admin"}}
                                                @else
                                                {{"Member"}}
                                                @endif
                                            </td>
                                            <td>{{$dt->email}}</td>
                                            <td>{{$dt->phone}}</td>
                                            <td>{{$dt->name}}</td>
                                            <td>{{$dt->address}}</td>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/manager-user/edit/id={{$dt->id}}">Sửa</a></td>
                                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/manager-user/delete/id={{$dt->id}}" onclick="if (!window.confirm('Bạn Có Chắc Chắn Muốn Xóa Thành Viên Này')) return false;">Xóa</a></td>                              
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