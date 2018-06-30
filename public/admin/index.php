<!DOCTYPE html>
<html>
<head>
    <title>Admin - cPanel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Trang quản trị, Trang Admin" />
    <meta name="description" content="Trang quản trị website bán hàng được thiết lế bởi Hồ Tấn Mỹ" />

    <!-- bootstrap-css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/custom-css.css" />
    <link href="css/style-responsive.css" rel="stylesheet"/>
    
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" /> 
</head>
<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!-- logo -->
            <div class="brand">
                <a href="index.html" class="logo">cPanel</a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!-- End logo -->

            <!-- Top navigation -->
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="images/2.png">
                            <span class="username">Mỹ Hồ</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                   
                </ul>
                <!--search & user info end-->
            </div>
            <!-- End top navigation -->
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="index.html">
                                <i class="fa fa-dashboard"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Quản lý bán hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="#">Quản lý iao dịch</a></li>
                                <li><a href="#">Đơn hàng</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Quản lý sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="#">Danh mục sản phẩm</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Phản hồi</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Hỗ trợ & Liên hệ</span>
                            </a>
                            <ul class="sub">
                                <li><a href="#">Hỗ trợ</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope"></i>
                                <span>Nội dung</span>
                            </a>
                            <ul class="sub">
                                <li><a href="#">Slide</a></li>
                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Trang thông tin</a></li>
                                <li><a href="#">Video</a></li>
                            </ul>
                        </li>
                    </ul>            
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

         <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">
                <p>© 2018 All rights reserved | Design by <a href="https://hotanmy.blogspot.com">Hồ Tấn Mỹ</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->

    <!-- add compoment script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- script navagation left -->
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/scripts.js"></script>

</body>
</html>
