@extends('common.index.index')
@section('title')
	Shop Trang Sniper
@stop
@section('content'))
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('index')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			
			<form action="{{route('checkout')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@if(count($errors)>0)
                    <div class="alert alert-danger">
					@foreach($errors->all() as $err)
                        {{$err}}
                     @endforeach
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
				<div class="row">
					<div class="col-sm-6">
						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" placeholder="Họ tên" required name="name" value="{{old('name')}}">
						</div>
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" required name="email" placeholder="expample@gmail.com" value="{{old('email')}}">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" placeholder="Street Address" required name="address" value="{{old('address')}}">
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" required name="phone" value="{{old('phone')}}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										@foreach ($content as $items)
										<div class="media">
											<img width="35%" src="styleAdmin/images/{{$items['options']['img']}}" alt="" class="pull-left" height="120px" >
											<div class="media-body">
												<p class="font-large"><h5>{{$items['name']}}</h5></p>
											</br>
												<span class="color-gray your-order-info"><b>Color:</b> {{$items['options']['color']}}</span>
											</br>
												<span class="color-gray your-order-info"><b>Size:</b> {{$items['options']['size']}}</span>
											</br>
												<span class="color-gray your-order-info"><b>Số Lượng:</b> {{$items['qty']}}</span>
											</br>
												@if ($items['options']['promotion_price'] == 0)
												<span class="color-gray your-order-info"><b>Đơn Giá:</b> {{number_format($items['price'],0,",",".")}} VND</span>
												@else
												<span class="color-gray your-order-info"><b>Đơn Giá:</b> {{number_format($items['options']['promotion_price'],0,",",".")}} VND</span>
												@endif
											</div>
										</div>
									@endforeach
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									@if (Auth::check())
									<div class="pull-left"><p class="your-order-f18" style="color: red;">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{$total}} VND</h5></div>
									<div class="clearfix"></div>
									@else
									<div class="pull-left"><p class="your-order-f18" style="color: red;">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{$total}} VND</h5></div>
									<div class="clearfix"></div>
									@endif
								</div>
							</div>

							<div class="text-center"><button type="submit" name="add_user" class="btn btn-default">Đặt Hàng</div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@stop