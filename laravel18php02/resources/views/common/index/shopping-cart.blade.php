@extends('common.index.index')
@section('title')
	Giỏ Hàng Của Bạn
@stop
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giỏ Hàng Của Bạn</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="/index">Trang Chủ</a> / <span>Shopping Cart</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Sản Phẩm</th>
							<th class="product-price">Đơn Giá</th>
							<th class="product-status">Giá Khuyến Mãi</th>
							<th class="product-quantity">Số Lượng</th>
							<th class="product-subtotal">Thành Tiền</th>
							<th class="product-remove">Sửa</th>
							<th class="product-remove">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<form method="get" action="{{route('shopping-cart')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
					@foreach ($content as $items)					
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="styleAdmin/images/{{$items['options']['img']}}" alt="" height="100px">
									<div class="media-body">
										<p class="font-large table-title"><b>{!! $items["name"] !!}</b></p>
									</br>
										<p class="table-option"><b>Màu Sắc:</b> {{$items['options']['color']}}</p>
									</br>
										<p class="table-option"><b>Size:</b> {{$items['options']['size']}}</p>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">{{number_format($items['price'],0,",",".")}} VND</span>
							</td>

							<td class="product-price">
								<span class="amount">{{$items['options']['promotion_price']}} VND</span>
							</td>

							<td class="product-quantity">
								<input type="text" name="quantity" size="1" value="{{$items['qty']}}">
							</td>

							<td class="product-subtotal">
								@if ($items['options']['promotion_price'] == 0)
								<span class="amount">{{number_format($items['price']*$items['qty'],0,",",".")}} VND</span>
								@else
								<span class="amount">{{number_format($items['options']['promotion_price']*$items['qty'],0,",",".")}} VND</span>
								@endif
							</td>
							<td class="product-remove">
								<a href="edit-shopping/{{$items['rowId']}}"class="table-edit" title="Chỉnh Sửa Sản Phẩm">Sửa</a>
							</td>
							<td class="product-remove">
								<a href="delete-shopping/{{$items['rowId']}}" class="table-edit" title="Xóa Sản Phẩm Khỏi Giỏ hàng">Xóa</a>
							</td>
							
						</tr>
					@endforeach
						</form>
					</tbody>
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">
				<div class="cart-totals pull-right">
					<div class="cart-totals-row"><h5 class="cart-total-title"><a href="{{route('checkout')}}" class="table-edit">Đặt Hàng</a></h5></div>
					<div class="cart-totals-row"><span>Tổng Tiền: </span> <span>{{$total}}</span></div>
				</div>

				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->
@stop