<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Information</h4>
						<div>
							<ul>
								<li><a href="{{route('index')}}"><i class="fa fa-chevron-right"></i>Trang Chủ</a></li>
								@foreach ($category as $cate)
								<li><a href="index/{{$cate->alias}}"><i class="fa fa-chevron-right"></i>{{$cate->category}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
				 <div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">Contact Us</h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								<p>81 Trần Hưng Đạo,T.T Vĩnh Trụ,Huyện Lý Nhân,Hà Nam Phone: 0919.47.17.88</p>
								<p>Hoặc bạn rất tường tận về thời trang hoặc bạn chẳng hiểu gì về nó cả</p>
							</div>
						</div>
					</div>
				  </div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #footer -->
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2014</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->


	<!-- include js files -->
	<script src="source/style/styleIndex/js/jquery.js"></script>
	<script src="source/style/styleIndex/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/style/styleIndex/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/style/styleIndex/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/style/styleIndex/vendors/animo/Animo.js"></script>
	<script src="source/style/styleIndex/vendors/dug/dug.js"></script>
	<script src="source/style/styleIndex/js/scripts.min.js"></script>
	<script src="source/style/styleIndex/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/style/styleIndex/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/style/styleIndex/js/waypoints.min.js"></script>
	<script src="source/style/styleIndex/js/wow.min.js"></script>
	<!--customjs-->
	<script src="source/style/styleIndex/js/custom2.js"></script>
</body>
</html>