@extends('common.index.index')
@section('title')
	{{$data->name}}-{{$data->color}}
@stop
@section('content')
<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="styleAdmin/images/{{$data->image}}" alt="" >	
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">

								<b class="single-item-title">{{$data->name}}-{{$data->color}}</b>
								<div class="space50">&nbsp;</div>
								<p class="single-item-price">
									@if ($data->promotion_price == 0)
									<span>{{number_format($data->unit_price,0,",",".")}} VND</span>
									@else
									<span class="flash-del">{{number_format($data->unit_price,0,",",".")}} VND</span>
									<span class="flash-sale">{{number_format($data->promotion_price,0,",",".")}} VND</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$data->area}}</p>
								<div class="space20">&nbsp;</div>
								<p><b>Màu Sắc Sản Phẩm:</b> {{$data->color}}</p>
							</div>
							<div class="space20">&nbsp;</div>
							<div class="single-item-options">
								<a class="add-to-cart" href="buy/{{$data->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>					
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản Phẩm Tương Tự</h4>

						<div class="row">
							@foreach ($match as $dt)
								@if ($dt->id == $data->id)
									@elseif ($dt->status == 2)
										@elseif ($dt->promotion_price == 0)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="chi-tiet-san-pham/id={{$dt->id}}"><img src="styleAdmin/images/{{$dt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$dt->name}}-{{$dt->color}}</p>
										<p class="single-item-price">
											<span>{{number_format($dt->unit_price,0,",",".")}} VND</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chi-tiet-san-pham/id={{$dt->id}}">Chi Tiết Sản Phẩm<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@else
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<div class="single-item-header">
										<a href="product.html"><img src="styleAdmin/images/{{$dt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$dt->name}}-{{$dt->color}}</p>
										<p class="single-item-price">
											<span class="flash-del">{{number_format($dt->unit_price,0,",",".")}}VND</span>
											<span class="flash-sale">{{number_format($dt->promotion_price,0,",",".")}}VND</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chi-tiet-san-pham/id={{$dt->id}}">Chi Tiết Sản Phẩm <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
								@endif
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<a href="index/{{$category->alias}}" style=":hover { color: blue;}"><h3 class="widget-title">{{$category->category}} Mới Nhất</h3></a>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach ($type_product as $type)
									@if ($type->status == 2)
										@elseif ($type->promotion_price == 0)
								<div class="media beta-sales-item">
									<a class="pull-left" href="chi-tiet-san-pham/id={{$type->id}}"><img src="styleAdmin/images/{{$type->image}}" alt=""></a>
									<div class="media-body">
										{{$type->name}}-{{$type->color}}
									</div>
									<span class="beta-sales-price">{{number_format($type->unit_price,0,",",".")}}</span>
								</div>
								@else
								<div class="media beta-sales-item">
									<a class="pull-left" href="chi-tiet-san-pham/id={{$type->id}}"><img src="styleAdmin/images/{{$type->image}}" alt=""></a>
									<div class="media-body">
										{{$type->name}}-{{$type->color}}
									</div>
									<span class="flash-del">{{number_format($type->unit_price,0,",",".")}}</span>
									<span class="beta-sales-price">{{number_format($type->promotion_price,0,",",".")}}</span>
								</div>
									@endif
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<!--<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@stop