<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Đăng Nhập Thành Viên Shop</title>
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
                                        <h6 class="text-uppercase text-center font-bold mt-4">Đăng Nhập</h6>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" action="#">

                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="login">Tên Đăng Nhập</label>
                                                    <input class="form-control" type="text" id="emailaddress" name="username" placeholder="Nhập Tên Đăng Nhập">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">                                   
                                                    <label for="password">Mật Khẩu</label>
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="NHập Mật Khẩu">
                                                </div>
                                            </div>
                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-block btn-gradient waves-effect waves-light" type="submit">Đăng Nhập</button>
                                                </div>
                                            </div>

                                        </form>

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Bạn Chưa Có Tài Khoản?/<a href="{{route('register')}}" class="text-dark m-l-5"><b>Đăng Ký</b></a></p>
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