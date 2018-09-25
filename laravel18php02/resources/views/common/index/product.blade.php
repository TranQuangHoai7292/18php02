@extends('common.index.index')
@section('title')
	Sản Phẩm Shop Trang Sniper
@stop
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tất cả có: {{$product->count()}} Sản Phẩm</h4>					
							<div class="row">
								@foreach ($product as $dt)
									@if ($dt->status == 2)
										@elseif ($dt->promotion_price == 0)					
								<div class="col-sm-3" style="margin-top: 20px;">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/id={{$dt->id}}"><img src="styleAdmin/images/{{$dt->image}}" alt="" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$dt->name}}-{{$dt->color}}</p>
											<p class="single-item-price">
												<span>{{number_format($dt->unit_price,0,",",".")}}VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="buy/{{$dt->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/id={{$dt->id}}">Chi Tiết Sản Phẩm<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@else
								<div class="col-sm-3" style="margin-top: 20px;">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="chi-tiet-san-pham/id={{$dt->id}}"><img src="styleAdmin/images/{{$dt->image}}" alt="" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$dt->name}}-{{$dt->color}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($dt->unit_price,0,",",".")}}VND</span>
												<span class="flash-sale">{{number_format($dt->promotion_price,0,",",".")}}VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="buy/{{$dt->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/id={{$dt->id}}">Chi Tiết Sản Phẩm<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
									@endif
								@endforeach
							<div class="row">{{$product->links()}}</div>		
							</div>
						</div>
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
@stop