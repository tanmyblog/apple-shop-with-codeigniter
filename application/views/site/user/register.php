<html>
<head>
    <title>Apple Shop - Đăng ký tài khoản thành viên</title>
    <?php
        $e = array(
            'general' => true, //description
            'og' => true,
            'twitter' => true,
            'robot' => true,
        );
        meta_tags($e, $title = 'Trang đăng ký thành viên', $desc = 'Đăng ký tài khoản thành viên để đặt hàng và thanh toán trực tuyến nhanh hơn, thành viên sẽ được ưu đãi tốt nhất', $imgurl = '', $url = '');
    ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="<?php echo public_url(); ?>site/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo public_url(); ?>site/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo public_url(); ?>site/css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->
    <link href="<?php echo public_url(); ?>site/css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider -->
    <link href="<?php echo public_url(); ?>site/css/animate.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo public_url(); ?>site/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>site/css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo public_url(); ?>site/css/custom.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo public_url(); ?>site/css/nganluong.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo public_url(); ?>site/css/contact.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo public_url(); ?>js/jquery-ui/jquery-ui.min.css" type="text/css" media="screen" />

    <!-- font-awesome icons -->
    <link href="<?php echo public_url(); ?>site/css/font-awesome.css" rel="stylesheet">

    <!-- js -->
    <script src="<?php echo public_url(); ?>site/js/jquery-2.2.3.min.js"></script>

    <!-- web-fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
    <!-- web-fonts -->
    <script src="<?php echo public_url(); ?>site/js/owl.carousel.js"></script>
    <!--flex slider-->
    <script defer src="<?php echo public_url(); ?>site/js/jquery.flexslider.js"></script>

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
        });
    </script>
    <!--flex slider-->
    <script src="<?php echo public_url(); ?>site/js/imagezoom.js"></script>
    <script>
    $(document).ready(function() {
        $(".owl-product-marquee").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        items :4,
        itemsDesktop : [640,5],
        itemsDesktopSmall : [480,2],
        navigation : true

        });
    });
    </script>
    <script src="<?php echo public_url(); ?>site/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {

            // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.
            $('.header-two').scrollToFixed();
            // previous summary up the page.

            var summaries = $('.summary');
            summaries.each(function(i) {
                var summary = $(summaries[i]);
                var next = summaries[i + 1];

                summary.scrollToFixed({
                    marginTop: $('.header-two').outerHeight(true) + 10,
                    zIndex: 999
                });
            });
        });
    </script>
    <!-- start-smooth-scrolling -->
    <script type="text/javascript" src="<?php echo public_url(); ?>site/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo public_url(); ?>site/js/easing.js"></script>
    <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script type="text/javascript">
        $(document).ready(function() {

            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- the jScrollPane script -->
    <script type="text/javascript" src="<?php echo public_url(); ?>site/js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" id="sourcecode">
        $(function()
        {
            $('.scroll-pane').jScrollPane();
        });
    </script>
    <!-- //the jScrollPane script -->
    <script type="text/javascript" src="<?php echo public_url(); ?>site/js/jquery.mousewheel.js"></script>
    <!-- the mousewheel plugin -->
    <script src="<?php echo public_url(); ?>site/js/bootstrap.js"></script>
    <script type="text/javascript">
    $(function() {
        $.fn.raty.defaults.path = "<?php echo public_url('js/raty/img'); ?>";
        $('.raty').raty({
            score: function() {
            return $(this).attr('data-score');
            },
            readOnly  : true,
        });
    });
    </script>
    <style>.raty img{width:16px !important;height:16px; !important;}</style>

</head>
<body>
    <!-- header -->
    <div class="header">  
        <?php $this->load->view('site/header.php', $this->data);?>
    </div>
    <!-- //header -->

    <!-- content -->
    <div class="products">  

        <div class="container">

            <!-- main content -->
            <div class="col-md-9 product-w3ls-right">
                <!-- breadcrumbs --> 
        <ol class="breadcrumb breadcrumb1">
            <li><a href="/">Trang chủ</a></li>
            <li class="active">Tài khoản</li>
            <li>Đăng ký tài khoản</li>
        </ol> 
        <div class="clearfix"> </div>
        <!-- //breadcrumbs -->
    
        <div class="products-row">
        <div class="row">
            <div class="error_message"><h4 style="color: red; font-weight: 650"><?php echo $message; ?></h4></div>
            <div class="col-sm-8">
                <form class="content" method="post" action="" id="edit-account">
                    <div class="form-group">
                        <label class="control-label" for="email"><span style="color: red;">*</span> Email</label>
                        <div class="input-wrap">
                            <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="email" placeholder="Email">
                            <div class="error_message"><?php echo form_error('email'); ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="name"><span style="color: red;">*</span> Họ tên</label>
                        <div class="input-wrap">
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo set_value('name'); ?>" placeholder="Họ tên">
                            <div class="error_message"><?php echo form_error('name'); ?></div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label" for="phone"><span style="color: red;">*</span> Số điện thoại</label>
                        <div class="input-wrap update-phone">
                            <input type="number" placeholder="Hãy nhập SĐT để trải nghiệm tốt hơn" value="<?php echo set_value('phone'); ?>" class="form-control" name="phone" id="phone">
                            <div class="error_message"><?php echo form_error('phone'); ?></div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label" for="address"><span style="color: red;">*</span> Địa chỉ</label>
                        <div class="input-wrap update-phone">
                            <textarea name="address" class="form-control" rows="2" placeholder="Nhập địa chỉ để thanh toán nhanh hơn"><?php echo set_value('phone'); ?></textarea>
                            <div class="error_message"><?php echo form_error('address'); ?></div>
                        </div>
                    </div>
                    <div class="password-group">
                        <div class="form-group">
                            <label class="control-label" for="password"><span style="color: red;">*</span> Mật khẩu</label>
                            <div class="input-wrap">
                                <input type="password" name="password" class="form-control" id="password" value="" autocomplete="off" placeholder="Mật khẩu từ 6 đến 32 ký tự">
                                <div class="error_message"><?php echo form_error('password'); ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="re_password"><span style="color: red;">*</span> Nhập lại</label>
                            <div class="input-wrap">
                                <input type="password" name="re_password" class="form-control" id="re_password" value="" autocomplete="off" placeholder="Nhập lại mật khẩu mới">
                                <div class="error_message"><?php echo form_error('re_password'); ?></div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-wrap">
                            <input type="submit" class="btn btn-info" name="register" value="Đăng ký">
                        </div>
                    </div>
                    <h5>Bạn đã có tài khoản? <a href="<?php echo base_url('user/login');?>">Đăng nhập ngay »</a> </h5>  
                </form>
            </div>
        </div>
        </div>
            </div>
            <!-- end main content -->
            
            <!-- sidebar -->
            <div class="col-md-3 rsidebar">
                <?php $this->load->view('site/sidebar.php', $this->data); ?>
            </div>
            <!-- end sidebar -->

            <div class="clearfix"> </div>
            
        </div>
    </div>
    <!--//products-->
    
    <div class="clearfix"> </div>

    <?php $this->load->view('site/footer.php', $this->data); ?>

</body>
</html>