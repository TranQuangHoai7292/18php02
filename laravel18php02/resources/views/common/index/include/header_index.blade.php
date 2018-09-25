<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('source/style/styleIndex/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('source/style/styleIndex/vendors/colorbox/example3/colorbox.css')}}">
	<link rel="stylesheet" href="{{url('source/style/styleIndex/rs-plugin/css/settings.css')}}">
	<link rel="stylesheet" href="{{url('source/style/styleIndex/rs-plugin/css/responsive.css')}}">
	<link rel="stylesheet" title="style" href="{{url('source/style/styleIndex/css/style.css')}}">
	<link rel="stylesheet" href="{{url('source/style/styleIndex/css/animate.css')}}">
	<link rel="stylesheet" title="style" href="source/style/styleIndex/css/huong-style.css">
	<link rel="stylesheet" type="text/css" href="{{url('source/style/styleIndex/css/mystyle.css')}}">
	<link rel="shortcut icon" href="{{url('styleAdmin/images/ao.png')}}">
</head>
<body>	
	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 81 Trần Hưng Đạo,T.T Vĩnh Trụ,Huyện Lý Nhân,Hà Nam</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0919.47.17.88</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if (Auth::check())
						<li><a href="#"><i class="fa fa-user"></i>{{Auth::user()->username}}</a></li>
						<li><a href="{{route('logout')}}">Logout</a></li>
						@else
						<li><a href="{{route('register')}}"><i class="fa fa-user"></i>Tài khoản</a></li>
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/style/styleIndex/images/sc.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							@if (!empty($content))
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{count($content)}}) <i class="fa fa-chevron-down"></i></div>
							@else
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (Trống) <i class="fa fa-chevron-down"></i></div>
							@endif
							<div class="beta-dropdown cart-body">
								@foreach ($content as $items)
								<div class="cart-item">
									<a class="pull-left" href="delete-shopping/{{$items['rowId']}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="styleAdmin/images/{{$items['options']['img']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$items['name']}}</span>
											<span class="cart-item-options">Size: {{$items['options']['size']}}; Colar: {{$items['options']['color']}}</span>
											@if ($items['options']['promotion_price'] == 0)
											<span class="cart-item-amount">{{$items['qty']}}*<span>{{number_format($items['price'],0,",",".")}} VND</span></span>
											@else
											<span class="cart-item-amount">{{$items['qty']}}*<span>{{number_format($items['options']['promotion_price'],0,",",".")}} VND</span></span>
											@endif
										</div>
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{$total}} VND</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('shopping-cart')}}" class="beta-btn primary text-center">Chi Tiết<i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: red;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('index')}}">Trang chủ</a></li>
						<li><a href="{{route('product-index')}}">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach ($category as $cate)
								<li><a href="index/{{$cate->alias}}">{{$cate->category}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="about.html">Giới thiệu</a></li>
						<li><a href="contacts.html">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->