@extends('common.index.index')
@section('title')
	{{$category->category}}
@stop
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach ($type as $ty)
							<li><a href="index/{{$category->alias}}/{{$ty->alias}}">{{$ty->type_products}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$category->category}} // {{$type_product->type_products}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Hiện có {{$cate->count()}} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($cate  as $product)
										@if ($product->promotion_price == 0)			
								<div class="col-sm-4" style="margin-top: 20px;">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/id={{$product->id}}"><img src="styleAdmin/images/{{$product->image}}" alt="" style="width: 270px;height: 320px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product->name}}</p>
											<p class="single-item-price">
												<span>{{number_format($product->unit_price,0,",",".")}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="buy/{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/id={{$product->id}}">Chi Tiết Sản Phẩm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@else
								<div class="col-sm-4" style="margin-top: 20px;">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/id={{$product->id}}"><img src="styleAdmin/images/{{$product->image}}" alt="" style="width: 270px;height: 320px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($product->unit_price,0,",",".")}} VND</span>
												<span class="flash-sale">{{number_format($product->promotion_price,0,",",".")}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="buy/{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/id={{$product->id}}">Chi Tiết Sản Phẩm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
									@endif
								@endforeach								
							</div>
						<div class="row">{{$cate->links()}}</div>
						</div> <!-- .beta-products-list -->


						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@stop