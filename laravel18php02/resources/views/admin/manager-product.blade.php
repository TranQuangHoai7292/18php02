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
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr> 
                                            <th>STT</th>
                                            <th>Hình Ảnh Sản Phẩm</th>
                                            <th>ID</th>               
                                            <th>Tên Sản Phẩm</th>
                                            <th>Loại</th>
                                            <th>Màu Sắc</th>
                                            <th>Size</th>
                                            <th>Đơn Giá</th>
                                            <th>Giá Khuyến Mãi</th>                                                                           
                                        </tr>
                                        </thead>
                                        @foreach($data as $dt)
                                        <tbody>
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>
                                                <img src='styleAdmin/images/{{$dt->image}}' style="width: 100px;height: 100px;">
                                            </td>                  
                                            <td>{{$dt->id}}</td>
                                            <td>{{$dt->name}}</td>
                                            <td>
                                                @if ($dt->id_type == 1)
                                                    {{"Nu"}}
                                                @elseif ($dt->id_type == 2)
                                                    {{"Nam"}}
                                                @elseif ($dt->id_type == 3)
                                                    {{"Tre Em"}}
                                                @else 
                                                    {{"Big Size"}}
                                                @endif
                                            </td>
                                            <td>{{$dt->color}}</td>
                                            <td>{{$dt->size}}</td>
                                            <td>{{$dt->unit_price}}</td>
                                            <td>{{$dt->promotion_price}}</td>
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