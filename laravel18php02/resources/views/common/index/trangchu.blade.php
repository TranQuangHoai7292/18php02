@extends('common.index.index')
@section('title')
	Shop Trang Sniper
@stop
@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									<!-- THE FIRST SLIDE -->
									@foreach ($banner as $banners)
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            	<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="styleAdmin/images/{{$banners->image}}" data-src="styleAdmin/images/{{$banners->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('styleAdmin/images/{{$banners->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
										</div>
						        	</li>
						        	@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới Nhất</h4>					
							<div class="row">
								@foreach ($datanew as $dt)
									@if ($dt->status == 2)
										@elseif ($dt->promotion_price == 0)								
								<div class="col-sm-3" style="margin-top: 20px;">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/id={{$dt->id}}"><img src="styleAdmin/images/{{$dt->image}}" alt="" style="height: 250px;"></a>
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
											<a href="chi-tiet-san-pham/id={{$dt->id}}"><img src="styleAdmin/images/{{$dt->image}}" alt="" style="height: 250px;"></a>
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
							</div>
							<div class="row">{{$datanew->links()}}</div>
						</div>
						<div class="space50">&nbsp;</div>
						<div class="beta-products-list">
							<h4>Tât Cả Sản Phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có tất cả {{$data->count()}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($data as $dt)
									@if ($dt->status == 2)
										@elseif ($dt->promotion_price == 0)
								<div class="col-sm-3" style="margin-top: 20px;">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/id={{$dt->id}}"><img src="styleAdmin/images/{{$dt->image}}" alt="" style="height: 200px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$dt->name}}-{{$dt->color}}</p>
											<p class="single-item-price">
												<span>{{number_format($dt->unit_price,0,",",".")}}</span>
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
											<a href="chi-tiet-san-pham/id={{$dt->id}}"><img src="styleAdmin/images/{{$dt->image}}" alt="" style="height: 200px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$dt->name}}-{{$dt->color}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($dt->unit_price,0,",",".")}}</span>
												<span class="flash-sale">{{number_format($dt->promotion_price,0,",",".")}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="buy/{{$dt->id}}}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/id={{$dt->id}}">Chi Tiết Sản Phẩm<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
									@endif
								@endforeach
							</div>
							<div class="row">{{$data->links()}}</div>							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
@stop