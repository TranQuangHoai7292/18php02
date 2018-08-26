<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Đăng Ký Thành Viên</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="styleAdmin/images/favicon.ico">

        <!-- App css -->
        <link href="styleAdmin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="styleAdmin/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="styleAdmin/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="styleAdmin/css/style.css" rel="stylesheet" type="text/css" />

        <script src="styleAdmin/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">                                        
                                        <h6 class="text-uppercase text-center font-bold mt-4">Đăng Ký Thành Viên</h6>
                                    </div>
                                    <div class="account-content">
                                    	@if(count($errors)>0)
                                    		<div class="alert alert-danger">
                                    		@foreach($errors->all() as $err)
                                    			{{$err}}
                                    		@endforeach
                                    	@endif
                                    	@if (Session::has('success'))
                                    		<div class="alert alert-success">{{Session::get('success')}}</div>
                                    	@endif

                                        <form class="form-horizontal" action="{{route('register')}}" method="post">
                                        	<input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="username">Tên Đăng Nhập*</label>
                                                    <input class="form-control" type="text" id="username" name="username" placeholder="Nhập Tên Đăng Nhập">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="emailaddress">Email*</label>
                                                    <input class="form-control" type="email" id="emailaddress" name="email" placeholder="john@gmail.com">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="password">Mật Khẩu</label>
                                                    <input class="form-control" type="password" required="" id="password" placeholder="Nhập Mật Khẩu Của Bạn" name="password">
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="password">Nhập Lại Mật Khẩu</label>
                                                    <input class="form-control" type="password" required="" id="password" placeholder="Nhập Lại Mât Khẩu" name="re_password">
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="username">Họ Và Tên</label>
                                                    <input class="form-control" type="text" name="name" placeholder="Nhập Tên Đầy Đủ">
                                                </div>
                                            </div> 
                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="username">Số Điện Thoại</label>
                                                    <input class="form-control" type="number" name="phone" placeholder="Nhập Số Điện Thoại Của Bạn">
                                                </div>
                                            </div> 
                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="username">Địa Chỉ</label>
                                                    <input class="form-control" type="text" name="address" placeholder="Địa Chỉ Thường Trú">
                                                </div>
                                            </div>                                         
                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-block btn-gradient waves-effect waves-light" type="submit">Đăng Ký</button>
                                                </div>
                                            </div>

                                        </form>

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Bạn Đã Có Tài Khoản?  <a href="{{route('login')}}" class="text-dark m-l-5"><b>Đăng Nhập</b></a></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->


        <!-- jQuery  -->
        <script src="styleAdmin/js/jquery.min.js"></script>
        <script src="styleAdmin/js/popper.min.js"></script>
        <script src="styleAdmin/js/bootstrap.min.js"></script>
        <script src="styleAdmin/js/metisMenu.min.js"></script>
        <script src="styleAdmin/js/waves.js"></script>
        <script src="styleAdmin/js/jquery.slimscroll.js"></script>
        <!-- App js -->
        <script src="styleAdmin/js/jquery.core.js"></script>
        <script src="styleAdmin/js/jquery.app.js"></script>

    </body>
</html>